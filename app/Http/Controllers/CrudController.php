<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use App\Http\Requests;
use App\Http\Requests\Crud\StoreRequest;
use App\Http\Requests\Crud\UpdateRequest;

class CrudController extends Controller{

    public function index() {
        $cruds = Crud::all(); // ini buat nampilkan seluruh datanya.
        return view('ajax', compact('cruds')); // ini buat menampilkan tampilan index.blade.php.
    }

    public function create(){
        return view('create'); // ini buat menampilkan tampilan create.blade.php
    }

     public function store(StoreRequest $request){
        $cruds = new Crud(); // buat data baru
        $cruds->firstname = $request->firstname; // ini buat nangkap value pada form bernama firstname
        $cruds->lastname = $request->lastname; // ini buat nangkap value pada form bernama lastname.
        $cruds->email = $request->email; // ini buat nangkap value pada form email.
        $cruds->address = $request->address; // ini buat nangkap value pada form address.
        $cruds->save(); // ini buat menyimpan data
        return redirect()->route('crud.index')->with('alert-success','Data Berhasil Disimpan'); // perintah ini maksutnya supaya kalo datanya sudah tersimpan, maka akan diarahkan pada tampilan index.blade.php dengan menyertakan pesan berupa alert.
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $cruds = Crud::findOrFail($id); // ini buat menemukan id-nya.
        return view('edit', compact('cruds')); // ini buat mengarahkan pada tampilan edit.blade.php
    }

    public function update(UpdateRequest $request, $id){
        $cruds = Crud::findOrFail($id); // ini buat menemukan id-nya
        $cruds->firstname   = $request->firstname;  // ini buat nangkap value pada form bernama firstname
        $cruds->lastname    = $request->lastname;  // ini buat nangkap value pada form bernama lastname
        $cruds->email       = $request->email;  // ini buat nangkap value pada form bernama email
        $cruds->address     = $request->address;  // ini buat nangkap value pada form bernama address
        $cruds->save(); // ini buat menyimpan
        return redirect()->route('crud.index')->with('alert-success', 'Data Berhasil Diubah'); // perintah ini maksutnya supaya kalo datanya sudah tersimpan, maka akan diarahkan pada tampilan index.blade.php dengan menyertakn pesan berupa alert.
    }

    public function destroy($id) {
        $cruds = Crud::findOrFail($id); // ini buat menemukan id-nya
        $cruds->delete(); // ini buat menghapus data
        return redirect()->route('crud.index')->with('alert-success','Data Berhasil Dihapus'); // perintah ini maksutnya supaya kalo datanya sudah tersimpan, maka akan diarahkan pada tampilan index.blade.php dengan menyertakn pesan berupa alert.
    }
}
