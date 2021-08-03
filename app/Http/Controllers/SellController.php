<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Item;
use App\Models\Sell;
use App\Models\SellSummary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = Sell::join('items', 'items.id', '=', 'sells.item')
            ->join('employees', 'employees.id', '=', 'sells.employee')
            ->get(['sells.*', 'items.name', 'employees.first_name', 'employees.last_name']);
        // dd($sell);
        $data = [
            'items' => $sell
        ];
        return view('sell.sale', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'items' => Item::all(),
            'employees' => Employee::all()
        ];
        return view('sell.addSell', $data);
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
            'item' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'employee' => 'required',
        ]);

        // dd(Carbon::now());

        Sell::create([
            'item' => $request->item,
            'price' => $request->price,
            'discount' => $request->discount,
            'employee' => $request->employee,
            'created_date' => Carbon::now()
        ]);


        $employee = SellSummary::where('employee', $request->employee)->first();

        if (!$employee) {
            SellSummary::create([
                'date' => Carbon::now(),
                'employee' => $request->employee,
                'created_date' => Carbon::now(),
                'last_update' => Carbon::now(),
                'price_total' => $request->price,
                'discount_total' => ($request->discount / 100) * $request->price,
                'total' => $request->price - (($request->discount / 100) * $request->price)
            ]);
        } else {
            // Total Price
            $price_total = Sell::where('employee', $request->employee)->sum('price');

            // Total Discount
            $discount_list = Sell::selectRaw('(discount/100) * price as discount_')->where('employee', $request->employee)->get();
            $discount_total = null;
            foreach ($discount_list as $dsc) {
                $discount_total += intval($dsc->discount_);
            }

            // Total Sale
            $total_ = $price_total - $discount_total;

            $employee->update([
                'date' => Carbon::now(),
                'employee' => $request->employee,
                // 'created_date' => Carbon::now(),
                'last_update' => Carbon::now(),
                'price_total' => $price_total,
                'discount_total' => $discount_total,
                'total' => $total_
            ]);
        }



        return redirect('sells')->with('message', 'Sell Successfully added');
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
            'model' => Sell::find($id),
            'items' => Item::all(),
            'employees' => Employee::all(),
        ];
        return view('sell.updateSell', $data);
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
        $sell_id = Sell::find($id);
        $request->validate([
            'item' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'employee' => 'required',
        ]);

        $sell_id->update([
            'item' => $request->item,
            'price' => $request->price,
            'discount' => $request->discount,
            'employee' => $request->employee
        ]);
        return redirect('sells')->with('message', 'Sell Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sell::destroy($id);
        return redirect('sells')->with('message', 'Sell Successfully deleted');
    }
}
