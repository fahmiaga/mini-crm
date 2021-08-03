<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sell;
use App\Models\SellSummary;
use Illuminate\Http\Request;

class SellSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
            ->get(['sell_summaries.*', 'employees.first_name', 'employees.last_name']);
        $data = [
            'sells' => $sells
        ];

        return view('sell.sellSummaries', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'sells' => Sell::join('items', 'items.id', '=', 'sells.item')
                ->join('employees', 'employees.id', '=', 'sells.employee')
                ->where('employee', $id)
                ->get(['sells.*', 'items.name', 'employees.first_name', 'employees.last_name']),
            'sells_summaries' => SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
                ->where('employee', $id)
                ->get(['sell_summaries.*', 'employees.first_name', 'employees.last_name']),
            'employee' => Employee::find($id)
        ];
        return view('sell.detailSellSummaryEmployee', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function summaryPerDay()
    {
        // $test = SellSummary::distinct()->get('date');
        // $test2 = SellSummary::all();
        // dd($test);

        $data = [
            'sells' => SellSummary::distinct()->get('date')
        ];
        return view('sell.sellSummaryPerDay', $data);
    }

    public function detailPerday($date)
    {
        $data = [
            'sells_summaries' => SellSummary::where('date', $date)->get()
        ];
        return view('sell.detailSummaryPerDay', $data);
    }
}
