<?php

namespace App\Helpers\Trait;

use Str;
use Image;

// Models
use App\Models\cms\Media;
use App\Models\lead_management\LeadDocument;
use App\Models\lead_management\AttachmentApplication;

// Define Variable
define('SEPARATOR', '/');

trait File
{

    public static function uploadFile($file,$actionType = null,$student_details = [] )
    {
        if (!is_null($file)) {
            $file_mime_type = $file->getClientMimeType();
            $file_extension = Str::lower($file->getClientOriginalExtension());
            $file_size = $file->getSize();

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $orignal_filename = $filename.'.'.$file_extension;

            $filename = Str::random(6) . '-media-' . preg_replace("/[^a-z0-9\_\-\.]/i", '', $orignal_filename);


            $uploadPath = 'uploads' . SEPARATOR . 'media';
            $fullpath = $uploadPath . SEPARATOR . $filename;

            // File move to destination folder
            $file->move($uploadPath, $filename);

            // Generate webp file [Start]
            if (in_array($file_extension, ['png', 'jpg', 'jpeg'])) {
                self::generateWebP($fullpath, $filename);
            }
            // Generate webp file [End]
            if($actionType == "application_attachment") {
                $mediaObj = AttachmentApplication::create([
                    'title' => $student_details[1],
                    'student_application_id' => $student_details[0],
                    'file_name' => $filename,
                    'original_file_name' => $orignal_filename,
                    'file_type' => $file_mime_type,
                    'file_extension' => $file_extension,
                    'file_size' => $file_size,
                ]);
                $documentObj = LeadDocument::create([
                    'lead_id' => $student_details[2],
                    'lead_vista_id' => null,
                    'attachment_type_id' => null,
                    'file_name' => $filename,
                    'original_file_name' => $orignal_filename,
                    'file_type' => $file_mime_type,
                    'file_extension' => $file_extension,
                    'file_size' => $file_size,
                    'folder_name' => $fullpath,
                ]);
            } else {

                $mediaObj = Media::create([
                    'file_name' => $filename,
                    'original_file_name' => $orignal_filename,
                    'file_type' => $file_mime_type,
                    'file_extension' => $file_extension,
                    'file_size' => $file_size,
                ]);
            }

            if (in_array($file_extension, ['png', 'jpg', 'jpeg'])) {
                $image = Image::make($fullpath);
                $mediaObj->height = $image->height();
                $mediaObj->width = $image->width();
                $mediaObj->save();
            }

            $returnArr = [
                'original_file_name' => $orignal_filename,
                'filename' => $filename,
                'mediaObj' => $mediaObj,
                'fullpath' => $fullpath,
            ];
            return $returnArr;
        }
    }

    public static function deleteFile($media_item)
    {
        $file_path = 'uploads' . SEPARATOR . 'media' . SEPARATOR . $media_item->file_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }


        /* Webp */
        $webp_file_path = 'uploads' . SEPARATOR . 'webp' . SEPARATOR . $media_item->file_name;
        $webp_file_path = str_replace('.'.$media_item->file_extension,'',$webp_file_path);
        $webp_file_path = $webp_file_path.'.webp';

        if (file_exists($webp_file_path)) {
            unlink($webp_file_path);
        }
        $media_item->delete();
    }

    public static function generateWebP($fullpath, $filename)
    {
        $filename = pathinfo($filename, PATHINFO_FILENAME);
        $webp_path = 'uploads' . DIRECTORY_SEPARATOR . 'webp' . DIRECTORY_SEPARATOR . $filename . '.webp';
        Image::make($fullpath)->encode('webp')->save($webp_path);
    }

    public static function noImageWebpUrl()
    {
        return url('') . '/uploads/webp/no_image.webp';
    }

    public static function noImageUrl()
    {
        return url('') . '/uploads/media/no_image.png';
    }

    public static function noImageThumbUrl($h = 50, $w = 50)
    {
        return route('fit-media', ['h' => $h, 'w' => $w, 'file_name' => 'no_image']);
    }

    public static function noImageWebpThumbUrl($h = 50, $w = 50)
    {
        return route('fit-webp-media', ['h' => $h, 'w' => $w, 'file_name' => 'no_image']);
    }

    public static function noImageFitThumbPicture($h = 50, $w = 50, $title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . self::noImageWebpThumbUrl($h, $w) . '" type="image/webp">
            <source srcset="' . self::noImageThumbUrl($h, $w) . '" type="image/jpg">
            <img src="' . self::noImageThumbUrl($h, $w) . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }
    public static function noImageGetFullPicture($title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . self::noImageWebpUrl() . '" type="image/webp">
            <source srcset="' . self::noImageUrl() . '" type="image/jpg">
            <img src="' . self::noImageUrl() . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }

    public static function noTeamImageThumbUrl($h = 50, $w = 50)
    {
        return route('fit-media', ['h' => $h, 'w' => $w, 'file_name' => 'no_team']);
    }

    public static function noTeamWebpThumbUrl($h = 50, $w = 50)
    {
        return route('fit-webp-media', ['h' => $h, 'w' => $w, 'file_name' => 'no_team']);
    }

    public static function noTeamFitThumbPicture($h = 50, $w = 50, $title = '', $pict_class = '', $img_class = '')
    {
        return '
        <picture class="' . $pict_class . '">
            <source srcset="' . self::noTeamWebpThumbUrl($h, $w) . '" type="image/webp">
            <source srcset="' . self::noTeamImageThumbUrl($h, $w) . '" type="image/jpg">
            <img src="' . self::noTeamImageThumbUrl($h, $w) . '" alt="' . $title . '" title="' . $title . '" class="' . $img_class . '">
        </picture>';
    }

    public static function uploadAttachment($files,$student_id,$lead_vista_id,$attachment_type_id) {
        foreach($files as $k => $file) {
            if (!is_null($file)) {
                
                $file_mime_type = $file->getClientMimeType();
                $file_extension = Str::lower($file->getClientOriginalExtension());
                $file_size = $file->getSize();
    
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $orignal_filename = $filename.'.'.$file_extension;
    
                $filename = Str::random(6) . '-media-' . preg_replace("/[^a-z0-9\_\-\.]/i", '', $orignal_filename);
    
    
                $uploadPath = 'uploads' . SEPARATOR . 'media';
                $fullpath = $uploadPath . SEPARATOR . $filename;
    
                // File move to destination folder
                $file->move($uploadPath, $filename);
    
                // Generate webp file [Start]
                if (in_array($file_extension, ['png', 'jpg', 'jpeg'])) {
                    self::generateWebP($fullpath, $filename);
                }
                // Generate webp file [End]

                $documentObj = LeadDocument::create([
                    'lead_id' => $student_id,
                    'lead_vista_id' => $lead_vista_id,
                    'attachment_type_id' => $attachment_type_id[$k],
                    'file_name' => $filename,
                    'original_file_name' => $orignal_filename,
                    'file_type' => $file_mime_type,
                    'file_extension' => $file_extension,
                    'file_size' => $file_size,
                    'folder_name' => $fullpath,
                ]);
                
                $returnArr[] = [
                    'original_file_name' => $orignal_filename,
                    'filename' => $filename,
                    'documentObj' => $documentObj,
                    'folder_name' => $fullpath,
                ];
                // return $returnArr;
            }

        }
        return $returnArr;
    }
    
}
