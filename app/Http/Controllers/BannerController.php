<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = [
            'title' => $request->title,
            'sub_title_one' => $request->sub_title_one,
            'sub_title_two' => $request->sub_title_two,
            'discretion' => $request->discretion,
            'button' => $request->button,
            'image' => $this->uploadImage($request->file('image'))
        ];

        Banner::create($requestData);

        return redirect()
            ->route('banners.index')
            ->withMessage('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $requestData = [
            'title' => $request->title,
            'sub_title_one' => $request->sub_title_one,
            'sub_title_two' => $request->sub_title_two,
            'discretion' => $request->discretion,
            'button' => $request->button,
        ];

        if ($request->hasFile('image')) {
            $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $banner->update($requestData);

        return redirect()
            ->route('banners.index')
            ->withMessage('Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()
            ->route('banners.index')
            ->withMessage('Successfully Delete');
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;

        $image->move(storage_path('/app/public/banners'), $fileName);

        // Image::make($image)
        //     ->resize(200, 200)
        //     ->save(storage_path() . '/app/public/products/' . $fileName);

        return $fileName;
    }
}
