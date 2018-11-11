<?php

namespace App\Http\Controllers;

use App\User; // Ini untuk memanggil Model User
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->get(); // Untuk query memanggil semua User
        // dd($data); // Untuk dump data user... hapus aja ini

        // foreach ($data as $users) {
        //     $users->name;
        //     $users->email;
        // }
        return view('pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
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
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]); // ini untuk validasi inputan. apabila tidak sesuai dengan yang diatas dia kembali lagi

        $data = new User; // new memanggil User yang tadi di atas lalu dia membuat baru
        $data->name = $request->name; // ini tuh $_POST atau bisa juga $_GET. tapi inget kalau proses method di route nya POST
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save(); // Tanpa ada save ini tidak akan tersimpan
        return redirect()->route('pengguna.index'); // Redirect ke halaman tadi
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
        $data = User::find($id); // Mencari user sesuai dengan id = $id
        // dd($data);
        return view('pengguna.edit', compact('data'));
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
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'min:6',
        ]); // ini untuk validasi inputan. apabila tidak sesuai dengan yang diatas dia kembali lagi. Password tidak dipakai required karna password tidak selalu harus di update

        $data = User::find($id);
        $data->name = $request->name; // ini tuh $_POST atau bisa juga $_GET. tapi inget kalau proses method di route nya POST
        $data->email = $request->email;
        if ($request->password) { // Jikalau ada password dia mengganti password
            $data->password = bcrypt($request->password);
        }
        $data->save(); // Tanpa ada save ini tidak akan tersimpan
        return redirect()->route('pengguna.index')->with('success', 'berhasil'); // Redirect ke halaman tadi
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id)->delete(); // Menghapus
        return redirect()->route('pengguna.index'); // Redirect ke halaman tadi
    }
}
