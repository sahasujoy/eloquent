<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function addCategory()
    {
        return view('category.add');
    }

    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->title;
        $result =  $category->save();
        if($result)
        {
            return redirect('/categories')->with('Category_Created', 'Cateegory has been created successfully!');
        }
        else
        {
            return redirect('/categories')->with('Category_Created', 'Category has not created successfully!');
        }
    }

    public function getCategory()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('category.categories', compact('category'));
    }

    public function getCategoryById($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.single-category', compact('category'));
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return back()->with('category_deleted', 'Post has been deleted successfully');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->title;
        $category->update();
        return redirect('/categories')->with('category_edited', 'Category has been updated successfully');
    }
}
