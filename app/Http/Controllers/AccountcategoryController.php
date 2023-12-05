<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Accountcategory;
use Illuminate\Http\Request;
class AccountcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountcategory = Accountcategory::latest()->paginate();
        return view('Accounts.accountcategory.index',compact('accountcategory'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Accounts.accountcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'accountcategory'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        Accountcategory::create([
            'accountcategory'=>request()->get('accountcategory'),
            'accountcategory_code'=>request()->get('accountcategory_code'),
            'detail'=>request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        return redirect()->route('accountcategory.index')->with('success','Create successfully');
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
    public function edit(Accountcategory $accountcategory)
    {
        return view('Accounts.accountcategory.update',compact('accountcategory'));
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
        $accountcategory = Accountcategory::findorfail($id);
        $accountcategory->update([
            'accountcategory'=>$request->input('accountcategory'),
            'accountcategory_code'=>$request->input('accountcategory_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        //redirect the user and send friendly message
        return redirect()->route('accountcategory.index')->with('success','Account Category Updated successfully');
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
