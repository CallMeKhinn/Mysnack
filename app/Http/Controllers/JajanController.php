<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jajan;
use App\Models\Kategori;

class JajanController extends Controller
{
    public function index()
    {
        $semuajajan = Jajan::all();
        return view('jajan.index', compact('semuajajan'));
    }
    public function tambah()
    {
       $semuakategori = Kategori::all(); 
       return view('jajan.tambah', compact('semuakategori')); 
    }
    public function simpan(Request $request, $id = null)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_jajan' => 'required',
            'harga' => 'required|integer',
            'rasa_jajan' => 'required'
        ],[
            'nama_jajan.required' => 'Nama jajan lu apa?',
            'harga.required' => 'harga jajan berapa? isilah biar bisa tau',
            'harga.integer' => 'harga udah pasti angka dong!!, bukan huruf atau simbol',
            'rasa_jajan.required' => 'isi dong rasa jajan lu'
        ]);

        if($id){
            $jajan = Jajan::findOrFail($id);
        }else{
            $jajan = new Jajan();
        }

        $jajan->kategori_id = $request->kategori_id;
        $jajan->nama_jajan = $request->nama_jajan;
        $jajan->harga = $request->harga;
        $jajan->rasa_jajan = $request->rasa_jajan;
        $jajan->save();

        return redirect('/jajan');
    }
    public function hapus($id)
    {
        $jajan = Jajan::findOrFail($id);
        $jajan->delete();
        return redirect('/jajan');
    }
    public function edit($id)
    {
        $jajan = Jajan::findOrFail($id);
        $semuakategori = Kategori::all();
        return view('jajan.edit', compact('jajan', 'semuakategori'));
    }
    public function rekap()
    {
        $semuajajan = Jajan::all();
        $totalbiayajajan = $semuajajan->sum('harga');
        $banyaknyajajansaya = $semuajajan->count();
        $semuakategori = Kategori::all();
        return view('rekap', compact(
            'semuajajan',
            'totalbiayajajan',
            'banyaknyajajansaya',
            'semuakategori'
        ));
    }
}