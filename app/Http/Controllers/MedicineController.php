<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use App\Models\MedicineType;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;

// it add 30 days from now 

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = DB::table('medicines')->orderBy('id')->Paginate(5);
        return view('Medicine.managemedicine', compact('medicines'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $medicine_types = MedicineType::all();
        $suppliers = Supplier::all();
        return View::make('Medicine.addmedicine')
        ->with(compact('categories'))
        ->with(compact('medicine_types'))
        ->with(compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //$id = IdGenerator::generate(['table' => 'medicines', 'length' => 9, 'prefix' => 'Mid-']);
        

       
        $request->validate([
            'commercial_name' => ['required','unique:medicines,commercial_name'],
            'medical_name'=> 'required',
            'company_name' => 'required',
            'category'=> 'required',
            'type' => 'required',
            'usage' => 'required',
            'created_by'=> 'required'
        
        ],

        ['unique'=>"This commercial name already exist."]);
       
        //$medicine->id = $id;
        //Medicine::create($request->all());
        $medicine = new Medicine([
            'commercial_name'=> $request->get('commercial_name'),
            'medical_name'=> $request->get('medical_name'),
            'company_name'=> $request->get('company_name'),
            'category'=> $request->get('category'),
            'type' => $request->get('type'),
            'usage' => $request->get('usage'),
            'created_by'=> $request->get('created_by'),
            'remember_token' => Str::random(8)
        ]);
        // get the current time
        
        //$medicine->id = $id;
        $medicine->save();
        return back()->with('success','Medicine created successfully!!!');
        $suppliers = DB::table('suppliers')
        ->select('suppliername', 'status')
        ->get();
       
        foreach($suppliers as $supplier)
        {
            if($supplier->suppliername == $supplier_name)
            {
                DB::table('suppliers')
              ->where('suppliername', '=', $medicine->supplier_name)
              ->update(['status' => 'Active']);
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view('Medicine.showmedicine',compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $categories= Category::all();
        $medicine_types = MedicineType::all();
        $suppliers = Supplier::all();
        //return view('Medicine.editmedicine',compact('medicine'),compact('categories'));
        return View::make('Medicine.editmedicine')
        ->with(compact('medicine'))
        ->with(compact('categories'))
        ->with(compact('medicine_types'))
        ->with(compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $current = Carbon::today();
        // add 90 days to the current time
        $ex_date = $current->addMonths(3);
        $request->validate(['commercial_name' => 'required',
        'medical_name'=> 'required',
        'category'=> 'required',
        'type' => 'required',
        'usage' => 'required',
        'created_by'=> 'required'
        ]);
        //$medicine->update($request->all());
        $medicine = Medicine::find($medicine->id);
        $medicine->commercial_name = $request->get('commercial_name');
        $medicine->medical_name = $request->get('medical_name');
        $medicine->category = $request->get('category');
        $medicine->type = $request->get('type');
        $medicine->usage = $request->get('usage');
        $medicine->created_by = $request->get('created_by');
        $medicine->save();
        return redirect('medicines')->with('success','Medicine updated successfully!');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return back()->with('success','Medicine Deleted successfully!!!');
    }

    public function search(Request $request)
    {
        $searchmedicine = $request->get('searchmedicine');
        $searchcategory = $request->get('searchcategory');
        /*$medicines=DB::table('medicines')->where('commercial_name','like','%' .$search. '%')
        ->orWhere('medical_name','like','%' .$search. '%')->paginate(5);
        return view('Medicine.managemedicine', ['medicines' => $medicines]);*/
        if(!empty($searchmedicine))
        {
            $medicines=DB::table('medicines')->where('commercial_name','like','%' .$searchmedicine. '%')
            ->orWhere('medical_name','like','%' .$searchmedicine. '%')
            ->orWhere('type','like','%' .$searchmedicine. '%')->paginate(5);
            return view('Medicine.managemedicine', ['medicines' => $medicines]);
        }
        else if(!empty($searchcategory))
        {
           
        }
        else 
            return view('Medicine.managemedicine', 'Empty search Input!!');
    }
}
