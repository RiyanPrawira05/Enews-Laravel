<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Berita;
use App\Category;
use App\User;

// use App\User;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        $category = Category::all();
        $user = User::all();
        return view('berita.index', compact('berita', 'category', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $user = User::all();
        return view('berita.create', compact('category', 'user'));
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

            'judul' => 'required|max:30',
            'header' => 'required',
            'isi' => 'required|max:100',
            'user_id' => 'required|max:50',
            'kategori_id' => 'required|max:50',
            'status' => 'required|max:20',

        ]);
        $data = new Berita;
        $data->judul = $request->judul;
        $data->header = $request->header;
        $data->isi = $request->isi;
        $data->user = $request->user;
        $data->kategori = $request->kategori;
        $data->status = $request->status;
        $data->save();

        if($request->header) { // Jikalau ada inputan header dia proses dibawah
          $user->header = UploadFile::file($request->avatar, 'foto/'); // dia nge return url nya
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $berita = Berita::find($id);

        // dd($berita->category->keterangan); // ini tuh category ambil dari database atau controller atau dari model? dia tuh ambil kolom keterangan nya kan? .. dia dari model terus si model ngambil dari database
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
