<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $company_id = $request->input('company_id');

        // Fetch branches for the selected company
        $branches = Branch::where('company_id', $company_id)->get();

        return response()->json($branches);
    }
}
