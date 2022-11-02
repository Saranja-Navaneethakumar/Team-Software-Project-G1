<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class LoginController extends Controller
{
    //
    function checklogin(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => [
                'required',
                'string',
                'min:7',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);
        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );
       
        if(Auth::attempt($user_data))
        {
            $usercount = DB::table('users')->count();
                $suppliercount = DB::table('suppliers')->count();
                $medicinecount = DB::table('medicines')->count();
                $medicinetypecount = DB::table('medicine_types')->count();
                $medicinecategorycount = DB::table('categories')->count();
                $medicinecount = DB::table('medicines')->count();
                $stockcount = DB::table('stocks')->count();
                
                $current = Carbon::today();
                $finishdate = $current->addMonths(6);
                
                $stocks = DB::table('stocks')->select('stocks.medicine_id','stocks.quantity', 'stocks.dosage','stocks.batch_no','stocks.expiry_date')
                ->where('stocks.expiry_date', '<', Carbon::today()->addMonths(6))
                ->get();
                $medicines = DB::table('medicines')
                ->select('id','commercial_name')
                ->get();
                $lessstocks = DB::table('stocks')->select('stocks.medicine_id','stocks.quantity', 'stocks.dosage','stocks.batch_no','stocks.expiry_date')
                ->where('stocks.quantity', '<', 100)
                ->get();
                /*$exalertmedicine= DB::table('stocks')->select('*')
                        ->whereBetween('expiry_date', 
                            [$finishdate, $current]
                        )
                        ->get()->count();
                        $quantityalert= DB::table('stocks')->select('*')
            ->where('quantity', '<=', 100)
            ->get()->count();*/
            
                    return View::make('dashboard.adminfront')
                    ->with(compact('usercount'))
                    ->with(compact('medicinecount'))
                    ->with(compact('medicinetypecount'))
                    ->with(compact('medicinecategorycount'))
                    //->with(compact('exalertmedicine'))
                    //->with(compact('quantityalert'))
                    ->with(compact('suppliercount'))
                    ->with(compact('stockcount'))

                    ->with(compact('stocks'))
                    ->with(compact('medicines'))
                    ->with(compact('lessstocks'));
        }
        else
        {
            return back()->with('error','Wrong Login Details');
        }
        
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
