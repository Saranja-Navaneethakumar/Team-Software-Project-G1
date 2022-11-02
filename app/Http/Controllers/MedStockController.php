<?php

namespace App\Http\Controllers;

use App\Models\MedStock;
use Illuminate\Http\Request;
use DB;

class MedStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $med_stocks = DB::table('med_stocks')
        ->join('medicines','med_stocks.medicine_id', '=','medicines.id')
        ->join('stocks','stocks.id', '=','med_stocks.stock_id')
        ->select('medicines.commercial_name','medicines.medical_name','medicines.company_name',
        'medicines.category','medicines.type','medicines.usage','stocks.dosage', 'stocks.unit', 'stocks.unitcost', 'stocks.unitprice',
        'stocks.cost', 'stocks.price', 'stocks.quantity', 'stocks.expiry_date', 'stocks.supplier_name', 'stocks.batch_no', 'stocks.box_size',
        'stocks.noboxes', 'medicines.created_by as Medicine_Createdby', 'medicines.created_time as Medicine_Created_time', 
        'stocks.created_by as Stock_Createdby', 'stocks.created_time as Stock_Created_time')
        ->where('med_stocks.medicine_id', 'med_stocks.stock_id')
        ->get();
       
        /*$med_stocks = DB::table('medicines')
        ->select('medicines.commercial_name','medicines.medical_name',
        'medicines.category','medicines.type','medicines.usage')*/
        //return view('stock.allstock',compact('med_stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        MedStock::create($request->all());
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
     * @param  \App\Models\MedStock  $medStock
     * @return \Illuminate\Http\Response
     */
    public function show(MedStock $medStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedStock  $medStock
     * @return \Illuminate\Http\Response
     */
    public function edit(MedStock $medStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedStock  $medStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedStock $medStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedStock  $medStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedStock $medStock)
    {
        //
    }
}
