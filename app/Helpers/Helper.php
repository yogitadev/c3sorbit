<?php

namespace App\Helpers;

use Str;
use App\Helpers\Trait\Date;
use App\Helpers\Trait\Model;
use App\Helpers\Trait\File;
use App\Helpers\Trait\Custom;
use App\Helpers\Trait\ActivityLog;

class Helper
{
    use Date,  Model, File, Custom, ActivityLog;
}
