<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category; //ambil dari model categori

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required|max:30', // ini tuh required html kan?
            'keterangan' => 'required|max:100', // apakah ada keamanan lain untuk validate selain required dan max?
        ]);

        $data = new Category;
        $data->kategori = $request->kategori; // kategori ini ambil dari nama inputan form atau database ??

        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('category.index')->with('success', 'Berhasil di Tambah!');
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
    public function edit($id)
    {
        $data = Category::find($id);

        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->kategori = $request->kategori; // kategori ini ambil dari nama inputan form atau database ??

        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('category.index')->with('success', 'Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id)->delete();

        return redirect()->route('category.index')->with('success', 'Berhasil di Delete!');
    }
}
