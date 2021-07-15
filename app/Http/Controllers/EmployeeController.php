<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $company = Company::all();
        $employee = Employee::join('companies', 'companies.id', '=', 'employees.company')
            ->get(['employees.*', 'companies.name']);
        if (request()->ajax()) {
            return datatables()->of($employee)
                ->addColumn('action', 'employees.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'employees' => $employee,
            'companies' => $company
        ];

        return view('employees/employees', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Company::all();
        return view('employees.addEmployee', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
        ]);

        $timestap = date('Y-m-d H:i:s');
        $created = null;

        if ($request->timezone == 1) {
            $created =  Carbon::createFromFormat('Y-m-d H:i:s', $timestap)->timezone('Asia/Singapore');
        } else {
            $created =  Carbon::createFromFormat('Y-m-d H:i:s', $timestap)->timezone('Asia/Jakarta');
        }

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->input('company'),
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => $created,
            'updated_at' => $created,
        ]);

        return redirect('employees')->with('message', 'Employee Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'employee' => Employee::find($id),
            'companies' => Company::all()
        ];
        return view('employees.updateEmployee', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $employee_id = Employee::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
        ]);


        $timestap = date('Y-m-d H:i:s');
        $created = null;

        if ($request->timezone == 1) {
            $created =  Carbon::createFromFormat('Y-m-d H:i:s', $timestap)->timezone('Asia/Singapore');
        } else {
            $created =  Carbon::createFromFormat('Y-m-d H:i:s', $timestap)->timezone('Asia/Jakarta');
        }

        $employee_id->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->input('company'),
            'email' => $request->email,
            'phone' => $request->phone,
            'phone' => $request->phone,
            'created_at' => $created,
        ]);

        return redirect('employees')->with('message', 'Employee Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employees')->with('message', 'Employee Successfully Deleted');
    }
    public function importEmployee(Request $request)
    {
        $fileImport = $request->file('file');
        if ($fileImport == null) {
            return back()->with('message', 'File not imported');
        }
        Excel::import(new EmployeeImport, $fileImport->store('temp'));
        return back()->with('message', 'File successfully imported');
    }
    public function exportEmployee()
    {
        return Excel::download(new EmployeeExport, 'employee-list.xlsx');
    }
}
