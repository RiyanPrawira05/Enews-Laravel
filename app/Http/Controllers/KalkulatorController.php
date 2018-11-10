<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
    	$operasi = [
    		'tambah','kurang','kali','bagi'
    	];
    	return view('kalkulator.index', compact('operasi'));
    	// return view('kalkulator.index')->with(['operasi' => ['asd', 'ddd']]);
    }

    public function proses(Request $request)
    {
    	$operasi = $this->index()->operasi;

    	$hasil = '';
    	switch ($request->operasi) {
    		case 'tambah':
    			 $hasil = $request->angka1 + $request->angka2;
    			break;
    		case 'kurang':
    			 $hasil = $request->angka1 - $request->angka2;
    			break;
    		case 'kali':
    			 $hasil = $request->angka1 * $request->angka2;
    			break;
    		case 'bagi':
    			 $hasil = $request->angka1 / $request->angka2;
    			break;
    		
    		default:
    			echo "Not Found";
    			break;
    	}
    	return view('kalkulator.index', compact('hasil','operasi'));
    }

    public function api()
    {
    	$data = array(
    		0 => 'Senin',
    		1 => 'Selasa',
    		2 => 'Rabu',
    		3 => 'Kamis',
    		4 => 'Jumat',
    	);
    	return $data;
    } 
}
