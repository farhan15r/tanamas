<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Addresses;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function log_out_admin(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function log_out_customer(Request $request)
    {
        Auth::logout();
        return redirect('homepage');
    }

    public function indexAdmin()
    {
        $users = User::where('role', 'admin')->get();
        Session::put('menu', 'user_admin');
        return view('dashboard.index_admin', compact('users'));
    }

    public function createAdmin(Request $request)
    {
        $User = new User;
        $User->role = 'admin';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        if ($request->contact_person == 'on') {
            $data = User::where('contact_person', 'yes')->first();
            $ganti = User::find($data->id);
            $ganti->contact_person = NULL;
            $ganti->save();
            $User->contact_person = 'yes';
        }
        $User->password = bcrypt($request->password);
        $User->save();
        return redirect('users')
            ->with('success', 'New data User admin successfully added!');
    }

    public function updateAdmin(Request $request, $id)
    {
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        if ($request->contact_person == 'on') {
            $data = User::where('contact_person', 'yes')->first();
            $ganti = User::find($data->id);
            $ganti->contact_person = NULL;
            $ganti->save();
            $User->contact_person = 'yes';
        }
        $User->password = bcrypt($request->password);
        $User->save();
        return redirect('users')
            ->with('success', 'New data User admin successfully updated!');
    }

    public function deleteAdmin($id)
    {
        User::find($id)->delete();
        return redirect('users')
            ->with('success', 'New data User admin successfully deleted!');
    }

    public function indexCustomer()
    {
        $users = User::where('role', 'customer')->with('shipping_address', 'billing_address')->get();
        Session::put('menu', 'user_customer');
        return view('dashboard.index_customer', compact('users'));
    }

    public function createCustomer(Request $request)
    {
        $User = new User;
        $User->role = 'customer';
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->address = $request->address;
        $User->password = bcrypt($request->password);
        $User->save();
        return redirect('customers')
            ->with('success', 'New data User customer successfully added!');
    }

    public function updateCustomer(Request $request, $id)
    {
        $User = User::find($id);

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

        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->billing_address_id = $Bill_Address->id;
        $User->shipping_address_id = $Ship_Address->id;
        if ($request->password != NULL) {
            $User->password = bcrypt($request->password);
        }
        $User->save();

        Addresses::where('id', $User->billing_address_id)->where('id', '!=', $Bill_Address->id)->delete();
        Addresses::where('id', $User->shipping_address_id)->where('id', '!=', $Ship_Address->id)->delete();

        return redirect('customers')->with('success', 'New data User customer successfully updated!');
    }

    public function deleteCustomer($id)
    {
        User::find($id)->delete();
        return redirect('customers')
            ->with('success', 'New data User customer successfully deleted!');
    }
}
