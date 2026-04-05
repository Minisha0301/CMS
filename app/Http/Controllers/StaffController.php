<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    
    public function index()
    {

        $departments  = Department::select('id', 'name')->get();
        return view('staffs.view', compact('departments'));
    }


    public function getStaffs(Request $request)
    {
        $staffs = User::with(['department'])->staffs()->orderBy('id','desc');
        if ($request->department_id) {
            $staffs->where('department_id', $request->department_id);
        }

        return DataTables::of($staffs)
            ->addColumn('department', function ($row) {
                return $row->department->name ?? '';
            })
            ->make(true);
    }

    public function store(StaffRequest $request)
    {
       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'user_type' => 'staff',
        ]);

        return response()->json(['message' => 'Staff Created Successfully']);
    }
}
