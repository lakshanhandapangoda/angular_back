<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;  

class EmployeeController extends Controller
{
    public function index(){
        $employees = employees::all(); 
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $employees = new employees([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),

        ]);
        $employees->save();
        return response()->json('Employee created!');
    }

    public function destroy($id)
    {
        $employees = employees::find($id);
        $employees->delete();
        return response()->json(' deleted!');
    }

    public function update(Request $request, $id)
    {
       $employees = employees::find($id);
       $employees->update($request->all());
       return response()->json('Employee updated');
    }

}
