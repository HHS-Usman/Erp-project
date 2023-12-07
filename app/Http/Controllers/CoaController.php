<?php
namespace App\Http\Controllers;
use App\Models\Accountcategory;
use App\Models\Parentcoa;
use App\Http\Controllers\Controller;
use App\Models\Coa;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coas = Coa::latest()->paginate();
        return view('Accounts.coa.index',compact('coas'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountCategory = Accountcategory::all();
        $prentcoa =  Coa::where('operation', 0)->get();
        return view('Accounts.coa.create',compact('prentcoa','accountCategory'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $selectedParentCoa = $request->get('parentcoa');
        $coacode = Coa::where('id', $selectedParentCoa)->value('coacode');
        $request->validate([
            'operation' => 'integer|in:0,1',
        ]);
        //create a new product in database
        Coa::create([
            'operation' => request()->get('operation', 0),
            'parentcoacode' => $coacode,
            'coacategory' => request()->get('accountcategory'),
            'coaname' => request()->get('accountname'),
            'coacode' => request()->get('accountcode'),
            'refaccode' => request()->get('refaccode'),
            'accountype' => request()->get('accountype'),
            'openbalance' => request()->get('openbalance'),
            'openingdate' => request()->get('openingdate'),
            'parentid' => $selectedParentCoa
        ]);

        //redirect the user and send friendly message
        return redirect()->route('coa.index')->with('success','Manage successfully');
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
    public function edit($id)
    {
        //
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
        //
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
