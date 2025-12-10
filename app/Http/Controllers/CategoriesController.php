<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        // $categories = Categories::where('deleted', 0)->get();
        $categories = Categories::where('deleted', 0)
        ->orderBy('id', 'ASC')  // stable order
        ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categories = new Categories();

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->created_at = time();
        $categories->created_by = Auth::id(); // current logged user

        $categories->save();

        return redirect('/categories')->with('msg', "Category Created Succesfully !");

    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        // dd($categories);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categories = Categories::find($id);

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->updated_at = time();
        $categories->updated_by = Auth::id(); // current logged user

        $categories->save();

        return redirect('/categories')->with('msg', "Category Updated Succesfully !");
    }

    public function delete($id)
    {
        $categories = Categories::find($id);

        if(!$categories)
        {
            return redirect('/categories')->with('msg', "Category is not Found !");
        }

        $categories->deleted = 1;
        $categories->deleted_at = time();
        $categories->deleted_by = Auth::id(); // current logged user

        if ($categories->save()) {
            return response()->json([
                'status' => true,
                'message'=> 'Deleted Successfully !'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message'=> 'Deleted Faild !'
            ]);
        }

    }

}
