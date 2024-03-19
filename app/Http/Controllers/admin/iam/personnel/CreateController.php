<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\Role;
use App\Models\cms\Country;
use App\Models\cms\State;
use App\Models\cms\City;
use App\Models\cms\Qualification;
use App\Models\cms\JobType;
use App\Models\cms\Designation;
use App\Models\cms\Department;
use App\Models\iam\personnel\User;
use App\Models\cms\RegionManager;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $params = $request->all();

        return view('admin.iam.personnel.create', [
           
        ]);
    }
}
