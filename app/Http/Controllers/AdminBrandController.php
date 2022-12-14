<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index', [
            'title' => 'All Brand',
            'active' => 'allBrand',
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add', [
            'title' => 'Add New Brand',
            'active' => 'addNewBrand'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'img' => 'image|file|max:1024'
        ]);

        if ($request->file('img')) {
            $img = $request->file('img')->store('img/brand');
            $imageSplit = explode('/', $img);
            $validatedData['img'] = $imageSplit[2];
        }

        Brand::create($validatedData);

        return redirect('/admin/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', [
            'title' => 'Edit Brand',
            'active' => 'editBrand',
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required|max:225',
            'img' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('img')) {
            $img = $request->file('img')->store('img/brand');
            $imageSplit = explode('/', $img);
            $validatedData['img'] = $imageSplit[2];
        }


        Brand::where('id', $brand->id)
            ->update($validatedData);
        return redirect('/admin/brand/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->img) {
            Storage::delete($brand->img);
        }
        Brand::destroy($brand->id);
        return redirect('/admin/brand')->with('success', 'Post has been deleted');
    }
}
