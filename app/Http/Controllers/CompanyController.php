<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'companies' => Company::all()
        ];

        return view('companies/companies', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Company;
        return view('companies.addCompany', compact('model'));
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
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|mimes:jpg,jpeg,png,bmp|max:1024|dimensions:min_width=100,min_height=100',
            'website' => 'required',
        ]);

        $file = $request->file('logo');
        $time = time();
        $fileName = $time . '.' . $file->extension();
        $file->move(public_path('logo'), $fileName);


        $data =  Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $fileName,
            'website' => $request->website,
        ]);

        Mail::send(
            'email.companyAdded',
            $data->toArray(),
            function ($message) {
                $message->to('fahmi.aga@gmail.com', 'Code Online')->subject('New Company Added');
            }
        );

        return redirect('companies')->with('message', 'Company Successfully Added');
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
        $model = Company::find($id);
        return view('companies.updateCompany', compact('model'));
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

        $company_id = Company::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'mimes:jpg,jpeg,png,bmp|max:1024|dimensions:min_width=100,min_height=100',
            'website' => 'required',
        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $time = time();
            $fileName = $time . '.' . $file->extension();
            $file->move(public_path('logo'), $fileName);
            unlink('logo/' . $request->old_logo);
        } else {
            $fileName = $request->old_logo;
        }

        $company_id->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $fileName,
            'website' => $request->website,
        ]);

        return redirect('companies')->with('message', 'Company Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_img = Company::find($id);
        unlink('logo/' . $id_img->logo);
        Company::destroy($id);
        return redirect('companies')->with('message', 'Company Successfully Deleted');
    }
}
