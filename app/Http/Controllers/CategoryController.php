<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

        {
            return view('categories.form', [
                'title' => 'Crea Categoria',
                'action' => route('categories.store'),
                'button' => 'Crea Categoria',
                'category' => new Category(),
            ]);
        }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->back()->with(['success' => 'Categoria creata correttamente.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.form', [
            'category' => $category,
            'title' => 'Modifica Categoria',
            'action' => route('categories.update', $category),
            'button' => 'Modifica Categoria',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->back()->with(['success' => 'Categoria modificata correttamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->articles->count()) {
            return redirect()->back()->with(['error' => 'Impossibile cancellare...']);
        }

        $category->delete();

        return redirect()->back()->with(['success' => 'Categoria cancellata correttamente']);
    }
}