<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use App\Http\Requests;
use App\Http\Requests\Crud\StoreRequest;
use App\Http\Requests\Crud\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller{
    
    public function index(){
        $cruds = Crud::all();
        return view('ajax', compact('cruds'));
    }

    public function create(){
        return view('create');
    }

    public function store(StoreRequest $request){
        $cruds = new Crud();
        $cruds->firstname   = $request->firstname;
        $cruds->lastname    = $request->lastname;
        $cruds->email       = $request->email;
        $cruds->address     = $request->address;
        $cruds->save();
        return response()->json($cruds);
    }

    public function show($id){
        
    }

    public function edit($id){
        $cruds = Crud::FindOrFail($id);
        return view('edit', compact('cruds'));
    }

    public function update(Request $request){
        $cruds = Crud::findOrFail($request->id);
        $cruds->firstname   = $request->firstname;
        $cruds->lastname    = $request->lastname;
        $cruds->email       = $request->email;
        $cruds->address     = $request->address;
        $cruds->save();
        return response()->json($cruds);
    }

    public function destroy(Request $request){
        $cruds =    Crud::find($request->id);
        $cruds->delete();
        return response()->json($cruds);
    }
}
