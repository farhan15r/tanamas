<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Session;

class CategorieController extends Controller
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

    public function index()
    {
        $categories = Categorie::all();
        Session::put('menu','categories');
        return view('dashboard.vendors',compact('categories'));
    }

    public function create(Request $request)
    {
        $categorie = new Categorie;
        $categorie->name_categorie = $request->name_categorie;
        $categorie->save();
        return redirect('categories')
        ->with('success','New data categorie successfully added!');
    }

    public function update(Request $request,$id)
    {
        $categorie = Categorie::find($id);
        $categorie->name_categorie = $request->name_categorie;
        $categorie->save();
        return redirect('categories')
        ->with('success','Data categorie successfully updated!');
    }

    public function delete($id)
    {
        Categorie::find($id)->delete();
         return redirect('categories')
         ->with('success','Data categorie successfully deleted!');
    }
}
