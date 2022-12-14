<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\MedStock;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DB::table('stocks')->orderBy('id')->Paginate(5);
        $medicines = DB::table('medicines')
                ->select('id','commercial_name')
                ->get();
        return view('stock.managestock', compact('stocks'), compact('medicines'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$medicines = DB::table('medicines')->orderBy('id')->Paginate(5);
        //$medicines= Medicine::all();
        //return view('stock.addstock',compact('medicines'))->with('i',(request()->input('page',1)-1)*5);
        $suppliers = Supplier::all();
        
        $medicines = DB::table('medicines')
                ->select('id','commercial_name')
                ->get();
        return view('stock.addstock',compact('suppliers'),compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        //$id = IdGenerator::generate(['table' => 'stocks', 'length' => 12, 'prefix' => 'Stockid-']);
        $current = Carbon::today();
        // add 90 days to the current time
        $ex_date = $current->addMonths(3);
        
        $request->validate([
            //'commercial_name' => 'required',
            
            'dosage'=> 'required',
            'unit'=> 'required',
            'unitprice'=> 'required',
            'unitcost'=> 'required',
            'expiry_date'=> 'required|after:'.$ex_date, 
            'supplier_name'=> 'required',
            //'box_size'=> ['required','numeric','min:0','not_in:0','unique:stocks,box_size'],
            'box_size'=>'required',
            'noboxes'=> 'required',
            'batch_no'=> 'required',
            'medicine_id'=>'required',
            'created_by'=> 'required'
        ],
        [
            'unique'=>"Box size should not be 0."
        ]
);
        
        $stock = new Stock([
            //'commercial_name'=> $request->get('commercial_name'),
            'dosage'=> $request->get('dosage'),
            'unit'=> $request->get('unit'),
            'unitprice'=> $request->get('unitprice'),
            'unitcost'=> $request->get('unitcost'), 
            'box_size'=> $request->get('box_size'), 
            'noboxes'=> $request->get('noboxes'), 
            'quantity'=> $request->get('box_size')*$request->get('noboxes'),
            'price'=> $request->get('unitprice')*$request->get('box_size')*$request->get('noboxes'),
            'cost'=> $request->get('unitcost')*$request->get('box_size')*$request->get('noboxes'),
            'expiry_date'=> $request->get('expiry_date'),
            'batch_no'=> $request->get('batch_no'),
            'supplier_name'=> $request->get('supplier_name'),
            'created_by'=> $request->get('created_by'),
            'medicine_id'=> $request->get('medicine_id'),
            'remember_token' => Str::random(8)
        ]);
        //$stock->id = $id;
        $stock->save();
    
            $med_stock = new MedStock();
            $med_stock->medicine_id = $stock->medicine_id;
            $med_stock->stock_id = $stock->id;
            $med_stock->save();
            
            /*$suppliers = DB::table('suppliers')
            ->select('suppliers.id','suppliers.suppliername','suppliers.status')
            ->where('suppliers.suppliername','stocks.supplier_name')
            ->get();
            foreach($suppliers as $supplier)
            {
                if($supplier->suppliername == $stock->supplier_name)
                {
                    if($supplier->status == 'Inactive')
                    {
                        $supplier->update(['status'=> 'Active']);
                    }
                }
            }*/

        return back()->with('success','Stock created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //$stocks = DB::table('stocks')->orderBy('id')->Paginate(5);
        $medicines = DB::table('medicines')
                ->select('id','commercial_name')
                ->get();
        return view('stock.showstock', compact('stock'), compact('medicines'));
        //return view('stock.showstock',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $medicines= Medicine::all();
        $suppliers = Supplier::all();
        return View::make('stock.editstock')
        ->with(compact('stock'))
        ->with(compact('medicines'))
        ->with(compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $current = Carbon::today();
        // add 90 days to the current time
        $ex_date = $current->addMonths(3);
        $request->validate([
            //'commercial_name' => 'required',
            'medicine_id'=> 'required',
            'dosage'=> 'required',
            'unit'=> 'required',
            'unitprice'=> 'required',
            'unitcost'=> 'required',
            'expiry_date'=> 'required|after:'.$ex_date, 
            'supplier_name'=> 'required',
            'box_size'=> 'required',
            'noboxes'=> 'required',
            'batch_no'=> 'required',
            'created_by'=> 'required',
            
        ]);
        $stock = Stock::find($stock->id);
        $stock->medicine_id = $request->get('medicine_id');
        $stock->dosage = $request->get('dosage');
        $stock->unit = $request->get('unit');
        $stock->unitprice = $request->get('unitprice');
        $stock->unitcost = $request->get('unitcost');
        $stock->box_size = $request->get('box_size');
        $stock->noboxes = $request->get('noboxes');
        $stock->batch_no = $request->get('batch_no');
        $stock->quantity = $request->get('box_size')*$request->get('noboxes');
        $stock->price = $request->get('unitprice')*$request->get('box_size')*$request->get('noboxes');
        $stock->cost = $request->get('unitcost')*$request->get('box_size')*$request->get('noboxes');
        $stock->expiry_date = $request->get('expiry_date');
        $stock->supplier_name = $request->get('supplier_name');
        $stock->created_by = $request->get('created_by');
        $stock->medicine_id = $request->get('medicine_id');

        $stock->save();
        return redirect('stocks')->with('success','Stock updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return back()->with('success','Stock Deleted successfully!!!');
    }

    public function sales()
    {
        return view('sales');
    }

    public function showallstock()
    {
        $stocks = Stock::all();
        $medicines = DB::table('medicines')
                ->select('medicines.*')
                ->get();

        return view('stock.allstock',compact('stocks'), compact('medicines'));
     
    }
    public function alerts()
     {
        $stocks = DB::table('stocks')->select('stocks.medicine_id','stocks.quantity', 'stocks.dosage','stocks.batch_no','stocks.expiry_date')
        ->where('stocks.expiry_date', '<', Carbon::today()->addMonths(6))
        ->get();
        $expiryquantity = DB::table('stocks')
        ->where('stocks.expiry_date', '<', Carbon::today()->addMonths(6))
        ->get()->count();
        $lessstocks = DB::table('stocks')->select('stocks.medicine_id','stocks.quantity', 'stocks.dosage','stocks.unit','stocks.batch_no','stocks.expiry_date')
        ->where('stocks.quantity', '<', 100)
        ->get();
        $medicines = DB::table('medicines')
        ->select('id','commercial_name')
        ->get();
        return View::make('stock.expiryalert')
                    ->with(compact('stocks'))
                    ->with(compact('medicines'))
                    ->with(compact('lessstocks'))
                    ->with(compact('expiryquantity'));
                    
     }

     public function qtyalerts()
     {
       
        $lessstocks = DB::table('stocks')->select('stocks.medicine_id','stocks.quantity', 'stocks.dosage','stocks.unit','stocks.batch_no','stocks.expiry_date')
        ->where('stocks.quantity', '<', 100)
        ->get();
        $lessstockscount = DB::table('stocks')
        ->where('stocks.quantity', '<', 100)
        ->get()->count();
        $medicines = DB::table('medicines')
        ->select('id','commercial_name')
        ->get();
        return View::make('stock.qtyalert')
                    ->with(compact('medicines'))
                    ->with(compact('lessstocks'))
                    ->with(compact('lessstockscount'));
                    
     }

     public function totalstock()
     {
        /*$sum = collect($student)
        ->reduce(function($carry, $item){
        return $carry + $item["score"];
        }, 0);*/
        
     }
     /*public function getdetails($id)
     {
        $data = Stock::where('medicine_id',$id)->first();
        return response()->json($data);
     }*/
}
