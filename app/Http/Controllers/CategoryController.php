<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index_main()
    {
        $categories = Category::all();

        return view('admins.dashboard.categories.index')->withCategories($categories);
    }
    public function create_main()
    {
        return view('admins.dashboard.categories.create');
    }

    public function create_sub()
    {
        $categories = Category::all();
        return view('admins.dashboard.categories.create_sub')->withCategories($categories);
    }

    public function main_store(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required'
        ]);

        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->slug = str_slug($request->categoryName);

        $category->save();

        return redirect()->route('index.main');
    }

    public function sub_store(Request $request)
    {
        $this->validate($request, [
            'subcategoryName' => 'required',
            'category_id' => 'required'
        ]);

        $category = new Subcategory();
        $category->subcategoryName = $request->subcategoryName;
        $category->category_id = $request->category_id;
        $category->slug = str_slug($request->subcategoryName);

        $category->save();

        return redirect()->route('index.main');
    }
}
