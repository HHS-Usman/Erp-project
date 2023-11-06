<?php

namespace App\Http\Controllers;

use App\Models\Weekday;
use Illuminate\Http\Request;

class WeekoffdayController extends Controller
{
    public function index()
    {
        $weekoffdays = Weekday::latest()->paginate();
        return view('organizationsetup.weekoffday.index',compact('weekoffdays'))->with(request()->input('page'));
    }

    public function create()
    {
        return view('organizationsetup.weekoffday.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'weekoffday' =>'required',
        'is_active' => 'integer|in:0,1'
    ]);
    //create a new product in database
    Weekday::create([
        'weekoffday' => request()->get('weekoffday'),
        'weekoffday_code' => request()->get('weekoffday_code'),
        'detail' => request()->get('detail'),
        'is_active' => request()->get('is_active', 0),
    ]);
        return redirect()->route('weekoffday.index')->with('success','Record Inserted Successfully');
    }
}
