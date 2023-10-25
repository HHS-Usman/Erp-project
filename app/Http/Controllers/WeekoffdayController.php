<?php

namespace App\Http\Controllers;

use App\Models\Weekday;
use Illuminate\Http\Request;

class WeekoffdayController extends Controller
{
    public function index()
    {
        $weekoffdays = Weekday::latest()->paginate(15);
        return view('weekoffday.index',compact('weekoffdays'))->with(request()->input('page'));
    }

    public function create()
    {
        return view('weekoffday.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ]);
        Weekday::create($request->all());
        return redirect()->route('weekoffday.index')->with('success','Record Inserted Successfully');
    }
}
