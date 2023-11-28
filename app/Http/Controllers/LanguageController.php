<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {  
         $languages = Language::latest()->paginate();
        return view('organizationsetup.language.index',compact('languages'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.language.create');
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
            'language'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Language::create([
        'language' => request()->get('language'),
        'language_code' => request()->get('language_code'),
        'detail' => request()->get('detail'),
        'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('language.index')->with('success','Record inserted  successfully');
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
    public function edit(Language $language)
    {
        return view('organizationsetup.language.update',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->update([
            'language' => $request->input('language'),
            'language_code'      => $request->input('language_code'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        $language->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('language.index')->with('success','Record Updated  successfully');
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
