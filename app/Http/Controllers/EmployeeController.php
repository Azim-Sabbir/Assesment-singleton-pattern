<?php

namespace App\Http\Controllers;

use App\Builder\Query;
use App\Builder\SearchById;
use App\Builder\SearchByName;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Query::make(Employee::all())
            ->pushSearch(new SearchByName(), $request->search_data)
//            ->pushSearch(new SearchByEmail(), $request->search_data)
//            ->pushSearch(new SearchByExperience(), $request->search_data)
//            ->pushSearch(new SearchById(), $request->search_data)
//            ->pushSearch(new SearchByAge(), $request->search_data)
            ->get();

        return view('employee-list', compact('employees'));
    }

    public function create()
    {
        return view('add-employee');
    }

    public function store(Request $request): RedirectResponse
    {
        $path = 'json/employee.json';
        $employees = File::get($path);
        $employees = json_decode($employees, true);
        $lastEmployee = end($employees);

        if ($employees) {
            foreach ($employees as $key => $value) {
                if ($value['email'] == $request->email) {
                    return redirect()->back()->with(["message"=>"Email already exists!"]);
                }
            }
        }
        $employee = array(
            "id"         => isset($lastEmployee) ? $lastEmployee['id'] + 1 : 1,
            "name"       => $request->input('name'),
            "email"      => $request->input('email'),
            "age"        => $request->input('age'),
            "experience" => $request->input('experience')
        );
        $employees[] = $employee;
        $employees = json_encode($employees);
        File::put($path, $employees);

        return redirect()->back()->with(["message" => "Employee Added Successfully :D "]);
    }

    public function edit($id)
    {
        $employee = Query::make(Employee::all())
            ->pushSearch(new SearchById(), $id)->first();
        return view('add-employee', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $path = 'json/employee.json';
        $employees = File::get($path);
        $employees = json_decode($employees, true);
        foreach ($employees as $key => $value) {
            if ($value['id'] == $id) {
                $employees[$key]['name'] = $request->get('name');
                $employees[$key]['email'] = $request->get('email');
                $employees[$key]['age'] = $request->get('age');
                $employees[$key]['experience'] = $request->get('experience');
            }
        }
        $employees = json_encode($employees);
        File::put($path, $employees);
        return redirect('/employees')->with(["message" => "Employee Updated Successfully :D "]);
    }

    public function destroy($id)
    {
        $path = 'json/employee.json';
        $employees = File::get($path);
        $employees = json_decode($employees, true);
        foreach ($employees as $key => $value) {
            if ($value['id'] == $id) {
                unset($employees[$key]);
            }
        }
        $employees = json_encode($employees);
        File::put($path, $employees);
        return redirect()->back()->with(["message" => "Goodbye Mr. Employee ;( "]);
    }
}
