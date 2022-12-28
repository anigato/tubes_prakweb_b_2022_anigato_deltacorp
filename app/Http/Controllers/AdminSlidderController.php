<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slidder;
use Illuminate\Http\Request;

class AdminSlidderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slidder.index', [
            'title' => 'All Slidder',
            'active' => 'allSlidder',
            'slidders' => Slidder::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slidder.add');
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
            'id_product' => 'required',
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $validatedData['status'] = 1;

        Slidder::create($validatedData);

        return redirect('/admin/slidder');
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
    public function edit(Slidder $slidder)
    {
        return view('admin.slidder.edit', [
            'title' => 'Edit Slidder',
            'active' => 'editSlidder',
            'slidder' => $slidder,
            'slidders' => Slidder::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slidder $slidder)
    {
        $rules = [
            'id_product' => 'required',
            'title' => 'required|max:225',
            'description' => 'required'
        ];

        $validatedData['status'] = 1;

        $validatedData = $request->validate($rules);

        Slidder::where('id', $slidder->id)
            ->update($validatedData);
        return redirect('/admin/slidder/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
