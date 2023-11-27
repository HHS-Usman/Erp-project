<?php

namespace App\Http\Controllers;

use App\Models\Usergroup;
use Illuminate\Http\Request;

class UsergroupController extends Controller
{
    public function index()
    {  
         $usergroups = Usergroup::latest()->paginate();
        return view('generalsetup.usergroup.index',compact('usergroups'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('generalsetup.usergroup.create');
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
            'usergroup' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Usergroup::create([
            'usergroup' => request()->get('usergroup'),
            'usergroup_code' => request()->get('usergroup_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('usergroup.index')->with('success','Manage successfully');
    }

    /**
     * Display the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Usergroup $usergroup)
    {
        return view('generalsetup.usergroup.update',compact('usergroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Usergroup $usergroup)
    {
          // validate the input
        $request->validate([
            'usergroup' =>'required',
            'usergroup_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
        ]);
        $usergroup->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('usergroup.index')->with('success','User Group Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
