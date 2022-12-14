<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function index()
    {
        //$users = User::all();
        //$users =  User::latest()->paginate(5);
        //$users = DB::table('users')->orderBy('id')->Paginate(5);
        $users = DB::table('users')->where('role', 'Employee')->orWhere('role', 'Stock Manager')->Paginate(5);
        //$users = DB::select('SELECT UPPER(LEFT(role,1))+LOWER(SUBSTRING(role,2,LEN(role))) FROM [users]')->orderBy('id')->Paginate(5);
        //SELECT UPPER(LEFT(word,1))+LOWER(SUBSTRING(word,2,LEN(word))) FROM [yourtable]
        //$users = DB::table('select id, username, role');
        return view('User.manageuser', compact('users'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function headpharmacist()
    {
        
        $users = DB::table('users')->where('role', 'Head Pharmacist')->Paginate(5);
        return view('User.managehp', compact('users'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function create()
    {
        return view('User.adduser');
    }

    public function store(Request $request)
    {
        //$id = IdGenerator::generate(['table' => 'users', 'length' => 7, 'prefix' => 'Uid-']);
       
         $this->validate($request, [
            'username' => ['required','unique:users,username'],
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'], // must contain a special character
                'name' => 'required',
                'nic' => ['required','regex:/^([0-9]{9})(X|V)$|^([0-9]{11})/','unique:users,nic'],
                'mobile'=>['required','regex:/^([0-9]{10})/','unique:users,mobile'],
                'address' => 'required',
                'gender'=> 'required',
                'role' => 'required',
                'nicfile' => ['required','unique:users,nicfile']
            
        ],
        [
            'unique'=>"This NIC number is already exist. Please enter valid NIC number.",
            'unique'=>"This username already exist.",
            'unique'=>"This mobile number is already exist. Please enter valid mobile number.",
            'unique'=>"This file is already exists, Nic file shouldn't be duplicate"
            //'unique'=>"File format is invalid, Acceptable formats are png,jpg,jpeg,pdf.",
        ]);
        
        /*$user = new User([
            'username' => $request->get('username'),
            //'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'role' => $request->get('role'),
            'gender' => $request->get('gender'),
            'nic' => $request->get('nic'),
            //$fileName = $request->get('username') . '.' . $request->file('nicfile')->extension(), 
            //'nicfile'=>$request->file('nicfile')->storeAs('/asset/uploads',$fileName),
            
            'remember_token' => Str::random(8)
        ]);
        if($request->hasFile('nicfile'))
        {
            $destination_path='public/uploads/nicfiles';
            $nicfile=$request->file('nicfile');
            $nicfile_name=$nicfile->getClientOriginalName();
            $path=$request->file('nicfile')->storeAs($destination_path,$nicfile_name);
        }
        User::create($user);*/
        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->get('password'));
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->role = $request->get('role');
        $user->gender = $request->get('gender');
        $user->nic = $request->get('nic');
        $user->mobile = $request->get('mobile');

        if($request->hasFile('nicfile'))
        {
            $username = $request->input('username');
            $nicfile=$request->file('nicfile');
            $extension = $nicfile->getClientOriginalExtension();
            $nicfilename = $username.'.'.$extension;
            $nicfile->move('uploads/nicfiles',$nicfilename);
            $user->nicfile = $nicfilename;
        }
        if($user->role=="Head Pharmacist")
        {
            if($request->hasFile('license'))
            {
                $username = $request->input('username');
                $role = $request->input('role');
                $license=$request->file('license');
                $extension = $license->getClientOriginalExtension();
                $licensename = $username.'-'. $role.'.'.$extension;
                $license->move('uploads/license',$licensename);
                $user->license = $licensename;
            }
        }

        //$user->id = $id;
        $user->save();
        return back()->with('success','User created successfully!');

        //if ($validator->fails()){
  // something
  // return Redirect::back()
  //        ->withErrors($validator) // send back all errors to the login form
  //        ->withInput();}
//else{
  // something$data->save(); // save your data }
    }

    /*public function show($id)
    {
        $user = User::find($id);
        return view('User.showuser',compact('user'));
    }*/
    public function show(User $user)
    {
        return view('User.showuser',compact('user'));
    }
    public function edit(User $user)
    {
        return view('User.edituser',compact('user'));
    }
    /*
    public function edit($id)
    {
        $user = User::find($id);
        return view('User.edituser',compact('user'));
    }*/

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $user->update($request->all());
        //return \view::make('User.manageuser')->with('success','User updated successfully!');
        
        //$this->redirectTo = url()->previous()->previous();
        //return redirect()->route('User.manageuser')->with('success','User updated successfully!');
        return back()->with('success','User Updated successfully!!!');
    }
    /*
    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        //check the column is null

        $user = User::find($id);
        $user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->password = $request->get('role');
        $user->save();
        return redirect('/')->with('success', 'User Updated!');
    }*/

     /*public function destroy($id)
     {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.manageuser')->with('success', 'User Deleted!');

     }*/
     public function destroy(User $user)
     {
    
        $user->delete();
        return back()->with('success','User Deleted successfully!!!');
     }
     public function dashboard(User $user)
     {
        $usercount = DB::table('users')->count();
        $suppliercount = DB::table('suppliers')->count();
        $medicinecount = DB::table('medicines')->count();
        $medicinetypecount = DB::table('medicine_types')->count();
        $medicinecategorycount = DB::table('categories')->count();
        $stockcount = DB::table('stocks')->count();
        //$medicinecount = DB::table('medicines')->count();
        $current = Carbon::today();
        $finishdate = $current->addMonths(6);
        /*$exalertmedicine= DB::table('medicines')->select('*')
            ->whereBetween('expiry_date', 
                [$finishdate, $current]
                )
                ->get()->count();
        $quantityalert= DB::table('medicines')->select('*')
        ->where('quantity', '<=', 100)
            ->get()->count();*/
        
            return View::make('dashboard.adminfront')
            ->with(compact('usercount'))
            ->with(compact('medicinecount'))
            ->with(compact('medicinetypecount'))
            ->with(compact('medicinecategorycount'))
            ->with(compact('suppliercount'))
            //->with(compact('exalertmedicine'))
            //->with(compact('quantityalert'))
            ->with(compact('stockcount'));
        

        
        
     }

     public function back()
     {
        return redirect ()->back ();
     }
     
     public function myprofile(User $user)
     {
        return view('User.myprofile',compact('user'));
     }
}
