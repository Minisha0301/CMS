<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function getByDepartmentId(Request $request) {

        $programme = Programme::where('department_id',$request->department_id)->get();
        return response()->json($programme);
    }
}
