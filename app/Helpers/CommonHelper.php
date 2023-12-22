<?php

namespace App\Helpers;
use DB;
use Config;
use App\Models\Branch;  // Create Branch Table For that  ok 
use App\Models\Company;  
use App\Models\Module;  


use Auth;
use Session;

	class CommonHelper{
        public static  function getBranch()
		{
			$Branch= Branch::all();
			return $Branch ? $Branch : 0;
		}
		public static  function getCompany()
		{
			$Company= Company::all();
			return $Company ? $Company : 0;
		}




		public static function get_Module_by_name($id)
		{
			// dd($id);
			$module =  Module::where('id',$id)->first();
			return $module->module_name;
		}
    }