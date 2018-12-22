<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Berita;
use App\Category;
use App\User;
use UploadFile; // Dari folder Helper dan isinya UploadFile

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $berita = Berita::with('category', 'user')->get();

    $berita = Berita::query();

        if ($request->filled('search')) {
            $berita = $berita->where('judul', 'like', '%' .$request->search. '%')->orwhere('isi', 'like', '%' .$request->search. '%');
        }

        $berita = $berita->orderBy('created_at', 'DESC')->get();

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
            'header' => 'mimes:jpg,png,jpeg',
            'isi' => 'required|max:100',
            'user_id' => 'required|max:50',
            'kategori_id' => 'required|max:50',
            'status' => 'required|max:20',

        ]);

        $data = new Berita;
        $data->judul = $request->judul;
        if($request->header) { // Jikalau ada inputan header dia proses dibawah
          $data->header = UploadFile::file($request->header, 'foto/'); // dia nge return url nya
        }
        $data->isi = $request->isi;
        $data->user_id = $request->user_id;
        $data->kategori_id = $request->kategori_id;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('berita.index')->with('success', 'Data Berhasil di Tambah');
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
        $berita = Berita::find($id);
        $category = Category::all();
        $user = User::all();

        return view('berita.edit', compact('berita','category', 'user'));
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
        $data = Berita::find($id);
        $data->judul = $request->judul;
        if($request->header) { // Jikalau ada inputan header dia proses dibawah
          $data->header = UploadFile::file($request->header, 'foto/'); // dia nge return url nya
        }
        $data->isi = $request->isi;
        $data->user_id = $request->user_id;
        $data->kategori_id = $request->kategori_id;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('berita.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::find($id)->delete();
        return redirect()->route('berita.index')->with('success', 'Data Berhasil di hapus');
    }
}
