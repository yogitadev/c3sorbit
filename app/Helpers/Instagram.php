<?php

namespace App\Helpers;

// Models
use App\Models\Setting;

class Instagram
{
    private static $instance;

    private $token;

    public static function instance()
    {
        if (!self::$instance) {
            return new self();
        }

        return self::$instance;
    }

    public function __construct()
    {

        $token_setting_item = Setting::where('setting_name', 'instagram-token')->first();

        if (!is_null($token_setting_item)) {
            $this->token = $token_setting_item->setting_value;

            $token_expire_setting_item = Setting::where('setting_name', 'instagram-expires')->first();

            if (!is_null($token_expire_setting_item) && $token_expire_setting_item->setting_value > 0) {

                $expires = new \DateTime($token_expire_setting_item->setting_value);
                $now = new \DateTime();

                if (date_diff($expires, $now)->days < 10) {
                    $this->refreshToken($token_setting_item, $token_expire_setting_item);
                }
            } else {
                $this->refreshToken($token_setting_item, $token_expire_setting_item);
            }
        }




        // Refresh token if it's close to expire
        /**/
    }

    public function refreshToken($token_setting_item, $token_expire_setting_item)
    {
        try {
            $response = json_decode(file_get_contents('https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=' . $token_setting_item->setting_value));
        } catch (\Exception $exception) {
            $token_expire_setting_item->setting_value = null;
            $token_expire_setting_item->save();
            return false;
        }

        $expires = now();
        $expires->modify('+ ' . $response->expires_in . ' second');

        $token_setting_item->setting_value = $response->access_token;
        $token_setting_item->save();

        $token_expire_setting_item->setting_value = $expires;
        $token_expire_setting_item->save();
    }

    /**
     * Return Instagram Media
     * @param int $limit
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getMedia(int $limit = 24)
    {
        if (\Cache::has('instagram_media')) {
            return \Cache::get('instagram_media');
        }

        if (!$this->token) {
            return collect();
        }

        try {
            $response = json_decode(file_get_contents("https://graph.instagram.com/me/media?fields=caption,id,media_type,media_url,permalink,thumbnail_url,timestamp,username&access_token={$this->token}"));
        } catch (\Exception $exception) {
            return collect();
        }

        if (!is_array($response->data)) {
            return collect();
        }

        $media = collect();

        foreach ($response->data as $data) {
            $media->add(
                (object) [
                    'caption' => !empty($data->caption) ? $data->caption : '',
                    'permalink' => !empty($data->permalink) ? $data->permalink : '',
                    'thumbnail' => $data->thumbnail_url ?? $data->media_url
                ]
            );
        }

        $media->splice($limit);

        \Cache::put('instagram_media', $media, now()->addMinutes(30));

        return $media;
    }
}
