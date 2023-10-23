<?php

namespace App\Helpers;
use DB;
use Config;
use App\Models\Branch;  // Create Branch Table For that  ok 

use Auth;
use Session;

	class CommonHelper{

        public static  function getBranch()
		{

			$Branch= Branch::all();
			return $Branch ? $Branch : 0;
		}
    }