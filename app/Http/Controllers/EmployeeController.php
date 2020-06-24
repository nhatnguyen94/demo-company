<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeEditRequest;
use Illuminate\Http\Request;
use App\Company;
use App\Employee;
class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $data = Employee::paginate(10);
        return view('employees.list',['data' => $data]);
    }

    public function create()
    {
        $companies = Company::paginate(10);
        return view('employees.store', ['companies' => $companies ] );
    }

    public function store(EmployeeCreateRequest $request)
    {
        $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->first_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company
                ];
        $employee = new Employee;
        $employee->fill($data);
        $employee->save();
        return redirect()->route('employee.index');

    }

    public function edit($id)
    {
        $employee = employee::findOrFail($id);
        $companies = Company::paginate(10);
        return view('employees.store',['employee' => $employee, 'companies' => $companies]);
    }

    public function update(EmployeeEditRequest $request, $id)
    {
        // dd($request->all());
        $employee = Employee::findOrFail($id);
        $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->first_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company
                ];
        $employee->fill($data);
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show',['employee' => $employee]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
