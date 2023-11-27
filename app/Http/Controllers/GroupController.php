<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::latest()->paginate();
        return view('organizationsetup.group.index',compact('groups'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizationsetup.group.create');
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
            'group'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Group::create([
        'group' => request()->get('group'),
        'group_code' => request()->get('group_code'),
        'detail' => request()->get('detail'),
        'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('group.index')->with('success','Group made  successfully ');
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
    public function edit(Group $group)
    {
        return view('organizationsetup.group.update',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
         // validate the input
         $request->validate([
            'group'=>'required',
            'group_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
        ]);
        $group->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('group.index')->with('success','Group Updated  successfully ');
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
