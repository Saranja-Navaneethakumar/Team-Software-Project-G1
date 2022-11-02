<?php

namespace App\Http\Controllers;

use App\Models\MedicineType;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;

use Validator;
use Auth;
use DB;

class MedicineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$medicine_types= MedicineType::all();
        return view('Medicine.medicinetype',compact('medicine_types'));*/
        $medicine_types = DB::table('medicine_types')->orderBy('id')->Paginate(5);
        return view('Medicine.medicinetype', compact('medicine_types'))->with('i',(request()->input('page',1)-1)*5);
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
        //$id = IdGenerator::generate(['table' => 'medicine_types', 'length' => 6, 'prefix' => 'Tid-']);
        $this->validate($request, [
            
            'type_name' => 'required',
            'status'=> 'required',
            'created_by'=> 'required',
        ]);
        

        $medicine_type = new MedicineType([
            'type_name' => $request->get('type_name'),
            'status' => $request->get('status'),
            'created_by' => $request->get('created_by'),
            'remember_token' => Str::random(8)
        ]);
        //$medicine_type->id = $id;
        $medicine_type->save();
        return back()->with('success','Medicine Type created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineType $medicineType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineType $medicineType)
    {
        //$browser->check('status');
        return view('Medicine.edittype',compact('medicineType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicineType $medicineType)
    {
        $this->validate($request, [
            
            'type_name' => 'required',
            'status' => 'required',
            'created_by'=> 'required',
            //'created_date'=> 'required'
        ]);

        $medicineType->update($request->all());
        return redirect('medicine_types')->with('success','Medicine Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineType  $medicineType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineType $medicineType)
    {
        $medicineType->delete();
        return back()->with('success','Category Deleted successfully!!!');
    }
}
