<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function monthlyCalendar()
    {    
      return view('calender');
    }  
}
