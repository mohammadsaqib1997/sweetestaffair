<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Category as CatModel;
use Illuminate\Support\Str;

class Category extends Controller
{
    public function index()
    {
        $categories = CatModel::orderBy('id', 'desc')->simplePaginate(15);
        return view(
            'admin.category-add',
            ['categories' => $categories]
        );
    }

    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'category' => 'bail|required|unique:categories,name|min:3|max:255'
        ]);

        $category = new CatModel;
        $category->name = $validatedData['category'];
        $category->slug = Str::slug($validatedData['category'], '-');
        $category->save();

        return redirect()->route('admin.add-cats')->with('message', 'Successfully created.');
    }

    public function edit(Request $req, $id)
    {
        $category = CatModel::findOrFail($id);
        return view('admin.category-edit', ['category' => $category]);
    }

    public function update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'category' => 'bail|required|unique:categories,name,' . $id . '|min:3|max:255',
            'slug' => 'bail|required|unique:categories,slug,' . $id . '|min:3|max:255'
        ]);

        $category = CatModel::findOrFail($id);
        $category->name = $validatedData['category'];
        $category->slug = Str::slug($validatedData['slug'], '-');
        $category->save();

        return redirect()->route('admin.add-cats')->with('message', 'Successfully updated.');
    }

    public function destroy(Request $req)
    {
        $validatedData = $req->validate([
            'cat_id' => 'bail|required|numeric|digits_between:1,20',
        ]);
        $category = CatModel::findOrFail($validatedData['cat_id']);
        try {
            $category->delete();
            return redirect()->route('admin.add-cats')->with('message', 'Successfully deleted.');
        } catch (\Exception $e) {
            return redirect()->route('admin.add-cats')->with('error', 'This category used in products.');
        }
    }
}
