<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view.brands')->only('index');
        $this->middleware('permission:create.brands')->only(['create', 'store']);
        $this->middleware('permission:update.brands')->only(['edit', 'update']);
        $this->middleware('permission:delete.brands')->only('delete');
    }


    public function index()
    {
        $brands = Brands::with('category')->where('deleted', 0)->get();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('brands.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'country' => 'required'
        ]);

        $brands = new Brands();

        $brands->name = $request->name;
        $brands->category_id = $request->category_id;
        $brands->country = $request->country;
        $brands->description = $request->description;
        $brands->created_at = time();
        $brands->created_by = Auth::id(); // current logged user

        $brands->save();

        return redirect('/brands')->with('msg', "Created Succesfully!");

    }

    public function edit($id)
    {
        $brands = Brands::find($id);
        $categories = Categories::all();
        return view('brands.edit', compact('brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'country' => 'required'
        ]);

        $brands = Brands::find($id);

        $brands->name = $request->name;
        $brands->category_id = $request->category_id;
        $brands->country = $request->country;
        $brands->description = $request->description;
        $brands->updated_at = time();
        $brands->updated_by = Auth::id(); // current logged user

        $brands->save();

        return redirect('/brands')->with('msg', "Updated Succesfully!");
    }

    public function delete($id)
    {
        $brands = Brands::find($id);

        if(!$brands)
        {
            return redirect('/brands')->with('msg', "brands is not Found !");
        }

        $brands->deleted = 1;
        $brands->deleted_at = time();
        $brands->deleted_by = Auth::id(); // current logged user

        if ($brands->save()) {
            return response()->json([
                'status' => true,
                'message'=> 'Deleted Successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message'=> 'Deleted Faild!'
            ]);
        }

    }


    public function show($id)
    {
        $brands = Brands::with('category')->findOrFail($id);
        return view('brands.show', compact('brands'));
    }


}
