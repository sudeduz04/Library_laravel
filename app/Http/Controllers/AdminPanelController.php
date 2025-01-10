<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('adminPanel.pages.index');
    }

    public function createCategory()
    {
        return view('adminPanel.pages.createCategory');
    }

    public function createCategoryPost(Request $request)
    {
        $categoryModel = new Category();
        $categoryModel->name = $request->category;
        $categoryModel->save();

        return redirect()->route('panel.listCategory')->with('success', 'Kategori başarıyla eklendi.');
    }

    public function listCategory()
    {
        $categories = Category::get();
        return view('adminPanel.pages.listCategory', compact('categories'));
    }
}
