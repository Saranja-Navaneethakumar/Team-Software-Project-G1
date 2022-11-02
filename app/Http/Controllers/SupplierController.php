<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;
use Validator;
use Auth;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$suppliers = Supplier::all();  
        //return view("supplier.index",compact('suppliers'));
        $suppliers = DB::table('suppliers')->orderBy('id')->Paginate(5);
        return view('supplier.index', compact('suppliers'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$id = IdGenerator::generate(['table' => 'suppliers', 'length' => 12, 'prefix' => 'Supplier-']);
        $this->validate($request, [
            'suppliername' => 'required',
            'mobile'=> 'required|digits:10',
            'address'=> 'required',
            'previousdue'=> 'required',
            'status'=> 'required',
            'created_by'=> 'required',
        ]);

        $supplier = new Supplier([
            'suppliername' => $request->get('suppliername'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
            'previousdue' => $request->get('previousdue'),
            'status' => $request->get('status'),
            'created_by' => $request->get('created_by'),
            'remember_token' => Str::random(8)
        ]);
        //$supplier->id = $id;
        $supplier->save();
        return back()->with('success','Supplier created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'suppliername' => 'required',
            'mobile'=> 'required',
            'address'=> 'required',
            'previousdue'=> 'required',
            'status'=> 'required',
            'created_by'=> 'required',
        ]);
        $supplier->update($request->all());
        return redirect('suppliers')->with('success','Supplier updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('success','Supplier Deleted successfully!!!');
    }
    public function search(Request $request)
    {
        $searchsupplier = $request->get('searchsupplier');
        /*$medicines=DB::table('medicines')->where('commercial_name','like','%' .$search. '%')
        ->orWhere('medical_name','like','%' .$search. '%')->paginate(5);
        return view('Medicine.managemedicine', ['medicines' => $medicines]);*/
        if(!empty($searchsupplier))
        {
            $suppliers=DB::table('suppliers')->where('suppliername','like','%' .$searchsupplier. '%')->paginate(5);
            return view('supplier.index', ['suppliers' => $suppliers]);
        }
        else 
            return view('supplier.index', 'Empty search Input!!');
    }
}
