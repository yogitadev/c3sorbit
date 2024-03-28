<?php

namespace App\Models\person;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use DateTime;
use DB;

// Helper
use App\Helpers\Helper;

//Model
use App\Models\cms\Country;
use App\Models\course\Programcode;
use App\Models\iam\personnel\User;
use App\Models\cms\LectureStudentPresent;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'students';

    protected $fillable = [
        'unique_id',
        'vista_id',
        'lead_date',
        'lead_time',
        'name',
        'country_id',
        'country_code',
        'mobile_number',
        'email_id',
        'programcode_id',
        'v_reference_no',
        'status', // 'Active','Inactive', 'Deleted'
    ];

    public $columnTitles = [
        'lead_date' => 'Lead Date',
        'lead_time' => 'Lead Time',
        'country_code' => 'Country Code',
        'name' => 'Name',
        'email_id' => 'Email',
        'mobile_number' => 'Mobile Number',
        'v_reference_no' => 'Reference No',
        'status' => 'Status',
        'v_reference_no' => 'Reference No'
    ];

    private static $searchColumns = [
        'all' => 'All',
        'students.unique_id' => 'unique_id',
        'students.name' => 'name',
        'students.vista_id' => 'vista_id',
        'students.lead_date' => 'lead_date',
        'students.lead_time' => 'lead_time',
        'students.email_id' => 'email_id',
        'students.mobile_number' => 'mobile_number',
        'students.v_reference_no' => 'v_reference_no',
    ];

    // Scopes
    
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 'Active');
    }

    //Foreign Ref
   
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function programcode()
    {
        return $this->belongsTo(Programcode::class, 'programcode_id', 'id');
    }
    public function lecture_student_present()
    {
        return $this->belongsTo(LectureStudentPresent::class, 'id', 'student_id');
    }
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->unique_id = Helper::get_unique_id('STU', 3);
        });
    }

    public static function getAdminList($params)
    {
        $all_search_fields = array_keys(self::$searchColumns);
        $query = Helper::generateFrontListQuery(self::query(), $params, $all_search_fields);

        if (isset($params['search_status']) && $params['search_status'] != null && $params['search_status'] != '') {
            $query->where('status', $params['search_status']);
        }
        
        //dd($params, $query->toSql());
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

    public function studentVl($v_reference_no) {
        $student =  \DB::connection('mysql2')->table('students')->select('*')->where('v_reference_no', $v_reference_no)->first();
       
        if($student != null) {
            $studentdata = json_decode(json_encode($student), true);
            
            $vl = \DB::connection('mysql2')->table('student_vl_letters')->select('*')->where('student_id',$studentdata['id'])->latest()->first();
            $vldata = json_decode(json_encode($vl), true);

            $media = \DB::connection('mysql2')->table('media')->select('original_file_name')->where('id',$vldata['media_id'])->first();
            $mediadata = json_decode(json_encode($media), true);
            $path = env('DB_SECOND_APP_URL').'/storage/uploads/media/visa_letter/'.$mediadata['original_file_name'];
            return ($path);
        } else {
            return '#';
        }
    }
    public function studentVlArchieve($vista_id) {
         $student =  \DB::connection('mysql2')->table('students')->select('*')->where('vista_id', $vista_id)->first();
       
         if($student != null) {
            $studentdata = json_decode(json_encode($student), true);
            
            $vla = \DB::connection('mysql2')->table('student_vl_letters_archives')->select('*')->where('student_id',$studentdata['id'])->where('type1',null)->latest()->get();
            $vladata = json_decode(json_encode($vla), true);
            $str = "";
            if(count($vladata) > 0) {
                foreach ($vladata as $key => $data) {
                    $str .= "<tr><td>".date("d/m/Y", strtotime($data['created_at']))."</td>";
                    if($data['media_id'] != null) {
                        $media = \DB::connection('mysql2')->table('media')->select('original_file_name')->where('id',$data['media_id'])->first();
                        $mediadata = json_decode(json_encode($media), true);
                        $path = env('DB_SECOND_APP_URL').'/storage/uploads/media/visa_letter/'.$mediadata['original_file_name'];

                        $str .= "<td><a href='".$path."' target='_blank'><i class='fas fa-file-pdf text-primary'></i></a></td>";
                    } else {
                        $str .= '<td>-</td>';
                    }
                    $str .= "<td>".$data['type']."</td>";
                    $str.= "</tr>";
                }
            }
            
        } else {
            $str .= "No data found";
        }
        return $str;
    }

    public function studentCol($v_reference_no) {
        $student =  \DB::connection('mysql2')->table('students')->select('*')->where('v_reference_no', $v_reference_no)->first();

        if($student != null) {
            $studentdata = json_decode(json_encode($student), true);

            $vl = \DB::connection('mysql2')->table('student_col_offers')->select('*')->where('student_id',$studentdata['id'])->latest()->first();
            $vldata = json_decode(json_encode($vl), true);

            $media = \DB::connection('mysql2')->table('media')->select('original_file_name')->where('id',$vldata['media_id'])->first();
            $mediadata = json_decode(json_encode($media), true);
            $path = env('DB_SECOND_APP_URL').'/storage/uploads/media/offer_letter/'.$mediadata['original_file_name'];
            return ($path);
        } else {
            return '#';
        }
    }

    public function studentColArchieve($vista_id) {
        $student =  \DB::connection('mysql2')->table('students')->select('*')->where('vista_id', $vista_id)->first();
      
        if($student != null) {
            $studentdata = json_decode(json_encode($student), true);
            
            $cola = \DB::connection('mysql2')->table('student_col_offers_archives')->select('*')->where('student_id',$studentdata['id'])->latest()->get();
            $coladata = json_decode(json_encode($cola), true);
            $str = "";
            if(count($coladata) > 0) {
                foreach ($coladata as $key => $data) {
                    $str .= "<tr><td>".date("d/m/Y", strtotime($data['created_at']))."</td>";
                    if($data['media_id'] != null) {
                        $media = \DB::connection('mysql2')->table('media')->select('original_file_name')->where('id',$data['media_id'])->first();
                        $mediadata = json_decode(json_encode($media), true);
                        $path = env('DB_SECOND_APP_URL').'/storage/uploads/media/offer_letter/'.$mediadata['original_file_name'];

                        $str .= "<td><a href='".$path."' target='_blank'><i class='fas fa-file-pdf text-primary'></i></a></td>";
                    } else {
                        $str .= '<td>-</td>';
                    }
                    $str .= "<td>".$data['admission_year']."</td>";
                    $str .= "<td>".$data['intake']."</td>";
                    $str.= "</tr>";
                }
            }
            
        } else {
            $str .= "No data found";
        }
        return $str;
    }

    /*
    * Function Name     :   getActivityTitle
    * Use               :   Use for Activity Log
    *
    */
    public function getActivityTitle($add_link = true)
    {
        if ($add_link) {
            //return '<strong><a href="' . route('edit-student', ['unique_id' => $this->unique_id]) . '" target="_blank">' . $this->title . ' [' . $this->unique_id . ']</a></strong>';
        } else {
            return '<strong>' . $this->title . ' [' . $this->unique_id . ']</strong>';
        }
    }
}
