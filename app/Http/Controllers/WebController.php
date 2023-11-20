<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Session;
use DB;
use Auth;
class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $products = Product::with('vendor')->paginate(8);
        return view('web.index',compact('products'));
    }


    public function registCustomer(Request $request)
    {
        $Bill_Address = new Addresses;
        $Bill_Address->street_address = $request->bill_street_address;
        $Bill_Address->city = $request->bill_city;
        $Bill_Address->province = $request->bill_province;
        $Bill_Address->postal_code = $request->bill_postal_code;
        $Bill_Address->country = $request->bill_country;
        $Bill_Address->save();

        if ($request->is_same_bill_address == 'true') {
            $Ship_Address = $Bill_Address;
        } else {
            $Ship_Address = new Addresses;
            $Ship_Address->street_address = $request->ship_street_address;
            $Ship_Address->city = $request->ship_city;
            $Ship_Address->province = $request->ship_province;
            $Ship_Address->postal_code = $request->ship_postal_code;
            $Ship_Address->country = $request->ship_country;
            $Ship_Address->save();
        }

        $User = new User;
        $User->role = 'customer';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->billing_address_id = $Bill_Address->id;
        $User->shipping_address_id = $Ship_Address->id;
        $User->password = bcrypt($request->password);
        $User->save();

        $login = User::where('id',$User->id)->first();
        Auth::login($login);
        return redirect('homepage');
    }


    public function detailProduct($id)
    {
        $product = Product::find($id);
        return view('web.detail',compact('product'));
    }

}
