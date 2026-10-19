<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $semuakategori = Kategori::all();
        return view('kategori.index', compact('semuakategori'));
    }
    public function tambah()
    {
        return view('kategori.tambah');
    }
    public function simpan(Request $request, $id = null)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:50',
        ],[
            'nama_kategori.required' => 'Nama Kategori Wajib diisi bro',
            'nama_kategori.string' => 'Kategori Wajib diisi huruf bro',
            'nama_kategori.max' => 'Kategori Maksimal diisi 50',
        ]);

        if ($id){
            $kategori = Kategori::findOrFail($id);
            $kategori->update($request->all());

        } else {
            $kategori = Kategori::create($request->all());
        }
         return redirect('/kategori');
    }
    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }
}