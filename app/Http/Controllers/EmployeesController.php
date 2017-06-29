<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use function compact;
use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = DB::table('employees')
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->select('employees.*','departments.description as department')
            ->get();

        return view("employees.index", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view("employees.create", compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->identification_card = $request->identification_card;
        $employee->department_id = $request->department_id;
        $employee->type_person = $request->type_person;
        $employee->admision_date = $request->admision_date;
        $employee->status = $request->status;
        $employee->save();

        return redirect("/empleados");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $data = [
            "employee" => $employee,
            "departments" => Department::all(),
        ];

        return view("employees.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->identification_card = $request->identification_card;
        $employee->department_id = $request->department_id;
        $employee->type_person = $request->type_person;
        $employee->admision_date = $request->admision_date;
        $employee->status = $request->status;
        $employee->update();

        return redirect("/empleados");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect("/empleados");
    }
}
