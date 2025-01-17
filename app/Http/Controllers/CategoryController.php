<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Book;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::latest()->get(),
            'count' => Book::has('category')->count(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $validate = $request->validated();

        Category::create($validate);

        return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
    }

    public function update(CategoryRequest $request, $id)
    {
        $validate = $request->validated();
        $category = Category::findOrfail($id);

        $category->update($validate);

        return back()->with('success', 'Proses perubahan data telah berhasil dilakukan.');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return back()->with('success', 'Proses penghapusan data telah berhasil dilakukan.');
    }
}
