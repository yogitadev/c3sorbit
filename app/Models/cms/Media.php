<?php

namespace App\Models\cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DateTime;

// Helpers
use App\Helpers\Helper;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'unique_id',
        //
        'media_type', // 'media', 'document'
        'title',
        'file_name',
        'original_file_name',
        'file_type',
        'file_extension',
        'file_size',
        'folder_name',
        //
        'height',
        'width',
    ];


    private static $searchColumns = [
        'all' => 'All',
        'media.unique_id' => 'unique_id',
        'media.media_type' => 'media_type',
        'media.title' => 'title',
        'media.file_name' => 'file_name',
        'media.original_file_name' => 'original_file_name',
        'media.file_type' => 'file_type',
        'media.file_extension' => 'file_extension',
        'media.folder_name' => 'folder_name',
    ];

    // Scopes
    public function scopeOrder($query)
    {
        return $query->orderBy($this->table . '.id', 'DESC');
    }

    public function scopeActive($query)
    {
        return $query;
    }

    // Accessors

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? Helper::date_time_format($value) : '',
        );
    }


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('MED', 2);
        });
    }


    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateAdminListQuery(self::query(), $params, $all_search_fields);
        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
        }
        if (isset($params['updated_at']) && $params['updated_at'] != null && $params['updated_at'] != '') {

            $createDate = new DateTime($params['updated_at']);

            $updated_at = $createDate->format('Y-m-d H:i');
            
            $query->where('media.updated_at','like','%'. $updated_at .'%');
        }

        $list = null;
        if (isset($params['export']) && $params['export'] == true) {
            $list = $query->get();
        } else {
            $page_num = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
            $record_per_page = isset($params['per_page']) && $params['per_page'] > 0 ? $params['per_page'] : env('APP_RECORDS_PER_PAGE', 20);
            $list = $query->paginate($record_per_page, ['*'], 'page', $page_num);
        }
        return $list;
    }

    public function getUrl()
    {
        return url('') . '/uploads/media/' . $this->file_name;
    }

    public function getWebpUrl()
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return url('') . '/uploads/webp/' . $file_name_without_extension . '.webp';
    }

    public function fitThumbUrl($h = 50, $w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('fit-media', ['h' => $h, 'w' => $w, 'file_name' => $file_name_without_extension]);
    }

    public function fitWebpThumbUrl($h = 50, $w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('fit-webp-media', ['h' => $h, 'w' => $w, 'file_name' => $file_name_without_extension]);
    }


    public function resizeUrl($w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-media-by-width', ['w' => $w, 'file_name' => $file_name_without_extension]);
    }

    public function resizeWebpUrl($w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-webp-media-by-width', ['w' => $w, 'file_name' => $file_name_without_extension]);
    }

    public function resizeHeightUrl($h = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-media-by-height', ['h' => $h, 'file_name' => $file_name_without_extension]);
    }

    public function resizeHeightWebpUrl($h = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-webp-media-by-height', ['h' => $h, 'file_name' => $file_name_without_extension]);
    }

    public function getFitThumbPicture($h = 50, $w = 50, $title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . $this->fitWebpThumbUrl($h, $w) . '" type="image/webp">
            <source srcset="' . $this->fitThumbUrl($h, $w) . '" type="image/' . $this->file_extension . '">
            <img src="' . $this->fitThumbUrl($h, $w) . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }

    public function getResizeHeightThumbPicture($h = 50, $title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . $this->resizeHeightWebpUrl($h) . '" type="image/webp">
            <source srcset="' . $this->resizeHeightUrl($h) . '" type="image/' . $this->file_extension . '">
            <img src="' . $this->resizeHeightUrl($h) . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }

    public function getPicture($title = '', $pict_class = '', $img_class = '', $resizeArr = [])
    {

        $resize = '';


        if (is_array($resizeArr) && count($resizeArr) > 0) {
            foreach ($resizeArr as $resize_width) {

                $resize .= '
                <source media="(max-width:' . $resize_width . 'px)" srcset="' . $this->resizeWebpUrl($resize_width) . '" type="image/webp">
                <source media="(max-width:' . $resize_width . 'px)" srcset="' . $this->resizeUrl($resize_width) . '" type="image/' . $this->file_extension . '">
                ';
            }
        }


        return '
        <picture class="' . $pict_class . '">
            ' . $resize . '
            <source srcset="' . $this->getWebpUrl() . '" type="image/webp">
            <source srcset="' . $this->getUrl() . '" type="image/' . $this->file_extension . '">
            <img src="' . $this->getUrl() . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }

    public function getFullPicture($title = '', $pict_class = '', $img_class = '')
    {


        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . $this->getWebpUrl() . '" type="image/webp">
            <source srcset="' . $this->getUrl() . '" type="image/' . $this->file_extension . '">
            <img src="' . $this->getUrl() . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }
    public function widthThumbUrl($w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-media-by-width', ['w' => $w, 'file_name' => $file_name_without_extension]);
    }
    public function widthWebpThumbUrl($w = 50)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        return route('resize-webp-media-by-width', ['w' => $w, 'file_name' => $file_name_without_extension]);
    }

    public function getWidthThumbPicture($w = 50, $title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . $this->widthWebpThumbUrl($w) . '" type="image/webp">
            <source srcset="' . $this->widthThumbUrl($w) . '" type="image/' . $this->file_extension . '">
            <img src="' . $this->widthThumbUrl($w) . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }
}
