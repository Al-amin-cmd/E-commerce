<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Color  $color
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Color $color)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Color  $color
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Color $color)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Color  $color
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Color $color)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Color  $color
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Color $color)
    // {
    //     //
    // }

    public function index()
    {
        $colors = Color::latest()->paginate(10);
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

     public function show($id)
    {
       $color = Color::findOrFail($id);
        // dd( $category);
       // dd($category->products);
        return view('admin.color.show', compact('color')); 
    }
    public function store(Request $request)
    {
        $requestData = [
            'name' => $request->name,
            'code' => $request->code,
        ];

        Color::create($requestData);

        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully Created');
    }


    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        $requestData = [
            'name' => $request->name,
            'code' => $request->code,
        ];

        $color->update($requestData);

        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully update');
    }

    public function destory($id)
    {
         $color = Color::find($id);
         $color->delete();
        return redirect()
            ->route('colors.index')
            ->withMessage('Successfully deleted');
    }


    public function trash()
    {
        $colors = Color::onlyTrashed()->get();
        return view('admin.color.trash', compact('colors'));
    }

    public function restore($id)
    {
        $color = Color::onlyTrashed()->find($id);
        $color->restore();
        return redirect()
            ->route('colors.trash')
            ->withMessage('Successfully restore');
    }

    public function delete($id)
    {
        $color = Color::onlyTrashed()->find($id);
        $color->forceDelete();
        return redirect()
            ->route('colors.trash')
            ->withMessage('Successfully deleted');
    }
    
}