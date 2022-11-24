<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

     public function show($id)
    {
       $category = Category::findOrFail($id);
        // dd( $category);
       // dd($category->products);
        return view('admin.categories.show', compact('category')); 
    }
    public function store(CategoryRequest $request)
    {
        $requestData = [
            'name' => $request->name,
            //'is_active' => $request->is_active ? true : false,
            'image' => $this->uploadImage($request->file('image')),
            'details' => $request->details,
        ];

        Category::create($requestData);

        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Created');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $requestData = [
            'name' => $request->name,
            //'is_active' => $request->is_active ? true : false,
            'image' => $fileName ?? $category->image,
            'details' => $request->details,
        ];

        if($request->hasFile('image')){
             $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $category->update($requestData);

        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully update');
    }

    public function destory($id)
    {
         $category = Category::find($id);
         $category->delete();
        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully deleted');
    }


    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully restore');
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();
        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully deleted');
    }

    public function pdf()
    {
        $categories = Category::all();
        $pdf = Pdf::loadView('admin.categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }

    public function uploadImage($image)
    {
        
        $originalname = $image->getClientOriginalName();
        $fileName = date('Y-m-d').time().$originalname;
        $image->move( storage_path('/app/public/categories'), $fileName);

        return $fileName;

    }
}