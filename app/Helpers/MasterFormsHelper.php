<?php

namespace App\Helpers;

use App\Models\Distributor;
use App\Models\Product;
use App\Models\TSO;
use App\Models\User;
use App\Models\Zone;
use App\Models\ShopType;
use App\Models\Shop;
use App\Models\Type;
use App\Models\Stock;
use App\Models\Route;
use App\Models\UsersLocation;
use App\Models\SalesReturnData;
use App\Models\SaleOrder;
use App\Models\ReceiptVoucher;
use App\Models\City;
use App\Models\UsersDistributors;
use App\Models\SubRoutes;
use Spatie\Permission\Models\Role;
use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class MasterFormsHelper
{


    public function __construct()
    {
    }

    public static function userType()
    {
        return Type::where('type', '!=', 'DELIVERY')->where('type', '!=', 'TSO')->get();
    }
    public function Days()
    {
        return $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    }

    public static function get_all_distributors()
    {
        return Distributor::status()->get();
    }
    public static function get_all_designation()
    {
        return DB::table('designations')->select('id', 'name')
            ->where('status', 1)
            ->get();
    }


    public static function get_all_distributor_user_wise()
    {
        return User::find(Auth::user()->id)->distributors()->select('distributors.id', 'distributor_name', 'distributor_code', 'city', 'contact_person', 'phone', 'distributor_sub_code', 'status')->sort()->get();
    }

    public static function get_all_distributor_user_wise_pluck()
    {
        return User::find(Auth::user()->id)->distributors()->pluck('distributors.id');
    }
    public function get_all_tso()
    {
        return TSO::all();
    }

    public function get_all_tso_by_distributor_id($id)
    {

        return  TSO::status()->whereHas('UserDistributor', function ($query) use ($id) {
            $query->where('distributor_id', $id)
                ->groupBy('user_id');
        })->get();

        // return $tso = TSO::whereHas()->status()->whereIn('distributor_id',$id)->select('name','id')->get();

    }

    public static function get_all_product()
    {
        return Product::status()->get();
    }

    public static function get_all_sheme_product()
    {
        return Product::where('status', 1)->where('product_type_id', 2)->get();
    }
    public function get_all_route_by_tso($id)
    {
        $tso = [];
        if ($id != null) :
            $tso = TSO::find($id)->route()->where('status', 1)->select('day', 'id', 'route_name')->get();
        endif;
        return $tso;
    }

    public function get_all_sub_routes_by_route($id)
    {

        $sub_routes = SubRoutes::status()->where('route_id',$id)->get();
        return $sub_routes;
    }

    public function get_all_zone()
    {
        return  Zone::status()->get();
    }


    public function get_all_shop_type()
    {
        return  ShopType::status()->get();
    }

    public function getReturnQty($id)
    {
        return SalesReturnData::where('sales_order_data_id', $id)->sum('qty');
    }

    public function get_distributor_level_wise()
    {
        return Distributor::status()
            ->where('level3', 0)
            ->orderBy('level1', 'ASC')
            ->orderBy('level2', 'ASC')
            ->get();
    }

    public static function InStock($product_id, $distributor, $qty)
    {
        $data = false;
        $in =  Stock::whereIn('stock_type', [0 ,1, 2, 4])->where('status', 1)->where('product_id', $product_id)->where('distributor_id', $distributor)->sum('qty');
        $out =  Stock::whereIn('stock_type', [3,5])->where('status', 1)->where('product_id', $product_id)->where('distributor_id', $distributor)->sum('qty');
        $qty = $in - $out - $qty;

        if ($qty >= 0) :
            $data = true;
        endif;
        return $data;
    }

    public static function qtyInStock($product_id, $distributor, $qty)
    {
        $data = false;
        $in =  Stock::whereIn('stock_type', [0, 1, 2, 4])->where('status', 1)->where('product_id', $product_id)->where('distributor_id', $distributor)->sum('qty');
        $out =  Stock::whereIn('stock_type', [3,5])->where('status', 1)->where('product_id', $product_id)->where('distributor_id', $distributor)->sum('qty');
        $qty = $in - $out - $qty;

        return $qty;
    }

    public static function get_users_distributors($id)
    {
        return User::find($id)->distributors()->pluck('distributor_id');
    }
    public  function get_assign_user()
    {
        $distributors = $this->get_users_distributors(Auth::user()->id);
        return UsersDistributors::whereIn('distributor_id',$distributors)->groupBy('user_id')->pluck('user_id');
    }

    public function get_tso_distribuor_wise()
    {

        return  TSO::whereIn('user_id', $this->get_assign_user())->get();
    }
    public function get_route_distribuor_wise()
    {
        return  Route::status()->join('users_distributors as b', 'routes.distributor_id', '=', 'b.distributor_id')
            ->where('b.user_id', Auth::user()->id)
            ->select('routes.*')
            ->get();
    }
    public function get_shop_distribuor_wise()
    {
        return  Shop::status()->join('users_distributors as b', 'shops.distributor_id', '=', 'b.distributor_id')
            ->where('b.user_id', Auth::user()->id)
            ->select('shops.*')
            ->get();
    }

    public function get_sales_orders($request)
    {
        $from = $request->from;
        $to = $request->to;


        $sales = SaleOrder::join('users_distributors as b', 'b.distributor_id', '=', 'sale_orders.distributor_id')
            ->where('b.user_id', auth()->user()->id)
            ->whereBetween('dc_date', [$from, $to])
            ->when($request->execution != null, function ($query) use ($request) {
                $query->where('excecution', $request->execution);
            })
            ->when($request->distributor_id != null, function ($query) use ($request) {
                $query->where('sale_orders.distributor_id', $request->distributor_id);
            })
            ->when($request->tso_id != null, function ($query) use ($request) {
                $query->where('sale_orders.tso_id', $request->tso_id);


            })->when($request->city != null, function ($query) use ($request) {
                $query->whereHas('tso.cities',function ($quer) use ($request){
                    $quer->where('id',$request->city);
                });


            })
            ->select('sale_orders.*')
            ->get();

        return $sales;
    }

    public function get_receipt_voucher($request)
    {
        $from = $request->from;
        $to = $request->to;

        $rvs = ReceiptVoucher::join('users_distributors as b', 'b.distributor_id', '=', 'receipt_vouchers.distributor_id')
            ->where('b.user_id', auth()->user()->id)
            ->whereBetween('issue_date', [$from, $to])
            ->when($request->execution != null, function ($query) use ($request) {
                $query->where('execution', $request->execution);
            })
            ->select('receipt_vouchers.*')
            ->get();

        return $rvs;
    }

    public static function users_location_submit($obj, $lat, $lan, $table)
    {
        $user_location = new UsersLocation();
        $user_location->latitude = $lat;
        $user_location->longitude = $lan;
        $user_location->user_id = Auth::user()->id;
        $user_location->table_name = $table;
        $obj->usersLocation()->save($user_location);
    }

    public static function get_user_type($id)
    {
        return Type::where('id', $id)->value('type');
    }

    public static function get_status_value()
    {
        return ['False', 'True'];
    }

    public function cities()
    {
        return City::All();
    }

    public function PrintHead($from, $to, $report, $col)
    {
        $data = '
     <div class="row">

       <div class="col-md-4">&nbsp
       </div>
                <div class="col-md-4" style="text-align:center">
                <h3>' . $report . '</h3>
                </div>
        <div class="col-md-4" style="text-align:right">
        Print Date: ' . date('Y-m-d') . '
        </div>
    </div>
    <div class="row">

    <div class="col-md-4">&nbsp
    </div>
             <div class="col-md-4" style="text-align:center">
           From: ' . $from . ' &nbsp  To: ' . $to . '
             </div>
     <div class="col-md-4" >
     &nbsp
     </div>
 </div>
    ';

        return $data;
    }

    public static function getAllPermissionList()
    {
        $permissions = Permission::query()
            ->select('main_module')
            ->groupBy('main_module')
            ->get()
            ->map(function ($permission) {
                return [
                    'main_module' => $permission->main_module,
                    'permissions' => $permission->where('main_module', $permission->main_module)->pluck('name','id','main_module')
                ];
            });
        // dd($permissions);
        return $permissions;
        // return Permission::select('id', 'name')->get();
    }

    public static function sidebarModules()
    {
        return [
            'Organization_Setup',
            'Generalsetup',
            'Employee',
            'Salesperson',
            'Accounts',
            'Security',
            'Distributor',
            'Route',
            'Reports',
            'Setting',
            'Sub-Routes'
        ];
    }

    public function stock_unique_no($type)
    {
        $count =  Stock::where('stock_type',$type)->groupBy('stock_type')->count();
       return $number = sprintf('%03d',$count);
    }



    public function get_all_role()
    {
       return Role::all();
    }

    public static function Order_list_total_amount($type ,$id,$from=null,$to=null)
    {
        if ($type==0):
          return  DB::table('sale_order_data')->where('so_id',$id)->sum('total');
        else:
         return     DB::table('sale_orders as a')
            ->join('sale_order_data as b', 'a.id', '=', 'b.so_id')
            ->where('a.tso_id', $id)
            ->where('a.status', 1)
            ->whereBetween('a.dc_date', [$from, $to])
            ->groupBy('a.tso_id')
            ->sum('b.total');
        endif;

    }
}
