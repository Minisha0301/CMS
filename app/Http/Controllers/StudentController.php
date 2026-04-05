<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\StudentRequest;
use App\Jobs\ImportStudentsJob;
use App\Models\Department;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    
    public function index()
    {
        $departments  = Department::select('id', 'name')->get();
        $programmes = Programme::all();
        return view('students.view', compact('departments','programmes'));
    }


    public function getStudents(Request $request)
    {
        $students = User::with(['department', 'programme'])->students()->orderBy('id','desc');
        if ($request->department_id) {
            $students->where('department_id', $request->department_id);
        }

        return DataTables::of($students)
            ->addColumn('department', function ($row) {
                return $row->department->name ?? '';
            })
            ->addColumn('programme', function ($row) {
                return $row->programme->name ?? '';
            })
            ->make(true);
    }
   
    public function store(StudentRequest $request)
    {
       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'programme_id' => $request->programme_id,
        ]);

        return response()->json(['message' => 'Student Created Successfully']);
    }


    public function import(ImportFileRequest $request)
    {

        $file = $request->file('file');
        $path = $file->store('imports');

        ImportStudentsJob::dispatch($path);

        return response()->json([
            'message' => 'Students imported successfully'
        ]);
        
    }
}
