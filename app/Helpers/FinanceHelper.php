<?php

namespace App\Helpers;
use DB;
use Config;
use App\Models\FinanceDepartment;
use App\Models\Account;
use App\Models\Transactions;
use App\Models\Rvs;
use Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;

	class FinanceHelper{




public static function ChartOfAccountCurrentBalance($param1,$param2,$param3){
        
            $currentBalance = DB::selectOne("select coalesce(sum(`amount`),0)-(select coalesce(sum(`amount`),0) 
							from `transactions` 
							where substring_index(`acc_code`,'-',$param2) = '$param3' and `debit_credit` = 0 
							AND `status` = 1) as bal 
							from `transactions` 
							where substring_index(`acc_code`,'-',$param2) = '$param3' and `debit_credit` = 1 
							AND `status` = 1")->bal;

            return $currentBalance;
        }
}