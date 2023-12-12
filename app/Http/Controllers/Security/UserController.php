<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('status',1)->where('user_type','!=',5)->orderBy('id', 'DESC')->paginate(100);
        if ($request->ajax()) :
            return  view('pages.User.indexAjax', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 100);
        endif;
        return view('security.User.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $roles = Role::pluck('name', 'name')->all();
        return view('security.User.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['username'] = $request->name;
            $input['password'] = $input['password'];
            $user = User::create($input);
            $user->assignRole($request->role);

            $user->distributors()->attach($request->distributor);
            DB::commit();
            return response()->json(['success' => 'User created successfully.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()]);
        }
        // $user->assignRole($request->input('roles'));

        // return redirect()->route('users.index')
        //                 ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = $user->roles[0]->id ?? '';
        return view('security.User.edit', compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->syncRoles($request->role);
        $input = $request->all();
        // dd($input);
        if ($input['password']!='') {

            $input['password'] =$input['password'];

        } else {
            $input = Arr::except($input, array('password'));
        }


        $user->update($input);
       // $permissions = Permission::whereIn('id',$input['permissions'])->pluck('name');


        // dd($permissions);
     //   $user->syncPermissions($permissions);
        $user->distributors()->sync($request->distributor);
        return response()->json(['success' => 'Updated successfully.']);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();

        // $user->assignRole($request->input('roles'));

        // return redirect()->route('users.index')
        //                 ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tso = User::where('id', $id)->update(['status'=> 0]);
        return response()->json(['success'=>'TSO Deleted Successfully']);

    }


    public function profile(Request $request)
    {
        return view('security.user.viewProfile');
    }


    public  function topRank(Request $request)
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
          
        $tso = DB::table('sale_orders')
        ->join('tso','tso.id','sale_orders.tso_id')
        ->join('sale_order_data', 'sale_order_data.so_id', '=', 'sale_orders.id')
        ->select(DB::raw('sum(sale_order_data.total) as amount'),'tso.name as tso_name','tso.tso_code')
        ->groupBy('sale_orders.tso_id')
        ->whereBetween('sale_orders.dc_date', [$currentMonthStart, $currentMonthEnd])
        ->where('sale_orders.status',1)
        ->where('tso.status',1)
        ->orderBy('amount', 'desc') // Sort by amount in descending order
        ->limit(4) // Limit the results to 4 rows
        ->get();
        $product = DB::table('sale_orders')
        ->join('sale_order_data', 'sale_order_data.so_id', '=', 'sale_orders.id')
        ->join('products','products.id','sale_order_data.product_id')
        ->select('sale_order_data.product_id', DB::raw('sum(sale_order_data.qty) as product_count'),'products.product_name')
        ->groupBy('sale_order_data.product_id')
        ->whereBetween('sale_orders.dc_date', [$currentMonthStart, $currentMonthEnd])
        ->where('sale_orders.status',1)
        ->where('products.status',1)
        ->orderBy('product_count', 'desc') // Sort by product_count in descending order
        ->limit(3) // Limit the results to the top 3 products
        ->get();

        $distributer = DB::table('sale_orders')
        ->join('distributors','distributors.id','sale_orders.distributor_id')
        ->join('sale_order_data', 'sale_order_data.so_id', '=', 'sale_orders.id')
        ->select(DB::raw('sum(sale_order_data.total) as amount'),'distributors.distributor_name as distributor_name','distributors.distributor_code')
        ->groupBy('sale_orders.distributor_id')
        ->whereBetween('sale_orders.dc_date', [$currentMonthStart, $currentMonthEnd])
        ->where('sale_orders.status',1)
        ->where('distributors.status',1)
        ->orderBy('amount', 'desc') // Sort by amount in descending order
        ->limit(3) // Limit the results to 4 rows
        ->get();

        $data = [
            'tso'=>$tso,
            'product'=>$product,
            'distributer'=>$distributer
        ];
        return $data;
    }

}