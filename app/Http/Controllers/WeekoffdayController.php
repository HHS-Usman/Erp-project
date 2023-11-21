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
        'sel_sun_01' => 'integer|in:0,1',
        '1stweek_sun_01' => 'integer|in:0,1',
        '2ndweek_sun_01' => 'integer|in:0,1',
        '3rdweek_sun_01' => 'integer|in:0,1',
        '4thweek_sun_01' => 'integer|in:0,1',
        'sel_mon_02' => 'integer|in:0,1',
        '1stweek_mon_02' => 'integer|in:0,1',
        '2ndweek_mon_02' => 'integer|in:0,1',
        '3rdweek_mon_02' => 'integer|in:0,1',
        '4thweek_mon_02' => 'integer|in:0,1',
        'sel_tue_03' => 'integer|in:0,1',
        '1stweek_tue_03' => 'integer|in:0,1',
        '2ndweek_tue_03' => 'integer|in:0,1',
        '3rdweek_tue_03' => 'integer|in:0,1',
        '4thweek_tue_03' => 'integer|in:0,1',
        'sel_wed_04' => 'integer|in:0,1',
        '1stweek_wed_04' => 'integer|in:0,1',
        '2ndweek_wed_04' => 'integer|in:0,1',
        '3rdweek_wed_04' => 'integer|in:0,1',
        '4thweek_wed_04' => 'integer|in:0,1',
        'sel_thu_05' => 'integer|in:0,1',
        '1stweek_thu_05' => 'integer|in:0,1',
        '2ndweek_thu_05' => 'integer|in:0,1',
        '3rdweek_thu_05' => 'integer|in:0,1',
        '4thweek_thu_05' => 'integer|in:0,1',
        'sel_fri_06' => 'integer|in:0,1',
        '1stweek_fri_06' => 'integer|in:0,1',
        '2ndweek_fri_06' => 'integer|in:0,1',
        '3rdweek_fri_06' => 'integer|in:0,1',
        '4thweek_fri_06' => 'integer|in:0,1',
        'sel_sat_07' => 'integer|in:0,1',
        '1stweek_sat_07' => 'integer|in:0,1',
        '2ndweek_sat_07' => 'integer|in:0,1',
        '3rdweek_sat_07' => 'integer|in:0,1',
        '4thweek_sat_07' => 'integer|in:0,1',
    ]);
    //create a new product in database
    Weekday::create([
        'sel_sun_01' => request()->get('sel_sun_01', 0),
        '1stweek_sun_01' => request()->get('1stweek_sun_01', 0),
        '2ndweek_sun_01' => request()->get('2ndweek_sun_01', 0),
        '3rdweek_sun_01' => request()->get('3rdweek_sun_01', 0),
        '4thweek_sun_01' => request()->get('4thweek_sun_01', 0),
        'sel_mon_02' => request()->get('sel_mon_02', 0),
        '1stweek_mon_02' => request()->get('1stweek_mon_02', 0),
        '2ndweek_mon_02' => request()->get('2ndweek_mon_02', 0),
        '3rdweek_mon_02' => request()->get('3rdweek_mon_02', 0),
        '4thweek_mon_02' => request()->get('4thweek_mon_02', 0),
        'sel_tue_03' => request()->get('sel_tue_03', 0),
        '1stweek_tue_03' => request()->get('1stweek_tue_03', 0),
        '2ndweek_tue_03' => request()->get('2ndweek_tue_03', 0),
        '3rdweek_tue_03' => request()->get('3rdweek_tue_03', 0),
        '4thweek_tue_03' => request()->get('4thweek_tue_03', 0),
        'sel_wed_04' => request()->get('sel_wed_04', 0),
        '1stweek_wed_04' => request()->get('1stweek_wed_04', 0),
        '2ndweek_wed_04' => request()->get('2ndweek_wed_04', 0),
        '3rdweek_wed_04' => request()->get('3rdweek_wed_04', 0),
        '4thweek_wed_04' => request()->get('4thweek_wed_04', 0),
        'sel_thu_05' => request()->get('sel_thu_05', 0),
        '1stweek_thu_05' => request()->get('1stweek_thu_05', 0),
        '2ndweek_thu_05' => request()->get('2ndweek_thu_05', 0),
        '3rdweek_thu_05' => request()->get('3rdweek_thu_05', 0),
        '4thweek_thu_05' => request()->get('4thweek_thu_05', 0),
        'sel_fri_06' => request()->get('sel_fri_06', 0),
        '1stweek_fri_06' => request()->get('1stweek_fri_06', 0),
        '2ndweek_fri_06' => request()->get('2ndweek_fri_06', 0),
        '3rdweek_fri_06' => request()->get('3rdweek_fri_06', 0),
        '4thweek_fri_06' => request()->get('4thweek_fri_06', 0),
        'sel_sat_07' => request()->get('sel_sat_07', 0),
        '1stweek_sat_07' => request()->get('1stweek_sat_07', 0),
        '2ndweek_sat_07' => request()->get('2ndweek_sat_07', 0),
        '3rdweek_sat_07' => request()->get('3rdweek_sat_07', 0),
        '4thweek_sat_07' => request()->get('4thweek_sat_07', 0),
    ]);
        return redirect()->route('weekoffday.create')->with('success','Record Inserted Successfully');
    }
}
