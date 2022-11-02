<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use Validator;
use Auth;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories= Category::all();
        //return view('Medicine.category',compact('categories'));
        //$categories =  Category::latest()->paginate(5);
        $categories = DB::table('categories')->orderBy('id')->Paginate(5);
        return view('Medicine.category', compact('categories'))->with('i',(request()->input('page',1)-1)*5);
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
        
        //$id = IdGenerator::generate(['table' => 'categories', 'length' => 9, 'prefix' => 'Cid-']);
        $this->validate($request, [
            
            'category_name' => 'required',
            'status'=> 'required',
            'created_by'=> 'required',
            //'created_date'=> 'required'
        ]);

        $category = new Category([
            'category_name' => $request->get('category_name'),
            'status' => $request->get('status'),
            'created_by' => $request->get('created_by'),
            //'created_date' => $request->get('created_date'),
            'remember_token' => Str::random(8)
        ]);
        //$category->id = $id;
        $category->save();
        return back()->with('success','Category created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Medicine.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            
            'category_name' => 'required',
            'status' => 'required',
            'created_by'=> 'required',
            //'created_date'=> 'required'
        ]);

        $category->update($request->all());
        return redirect('categories')->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category Deleted successfully!!!');
    }
}
