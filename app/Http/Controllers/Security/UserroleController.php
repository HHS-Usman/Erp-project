<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_role;
class UserroleController extends Controller
{
    public function index()
    {
        $userroles = User_role::latest()->paginate();
        return view('security.userrole.index',compact('userroles'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('security.userrole.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'user_role'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        User_role::create([
            'user_role' => request()->get('user_role'),
            'user_role_code' => request()->get('user_role_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('userrole.index')->with('success','User_role made  successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User_role $userrole)
    {
       
        return view('security.userrole.update',compact('userrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userrole = User_role::findOrFail($id);
        $userrole->update([
            'user_role' => $request->input('user_role'),
            'user_role_code'      => $request->input('user_role_code'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        //redirect the user and send friendly message
        return redirect()->route('userrole.index')->with('success','User_role Updated Data  successfully ');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }   
}
