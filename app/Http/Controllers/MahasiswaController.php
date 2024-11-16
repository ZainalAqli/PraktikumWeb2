<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $mahasiswa = Mahasiswa::query();

        if(isset($request->keyword))
        {
            $mahasiswa = $mahasiswa->where('nama','LIKE',"%{$request->keyword}%")
            ->orWhere('npm','LIKE',"%{$request->keyword}%");
        }
        $mahasiswa = $mahasiswa->get();
        return view('admin.mahasiswa.index',compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(request $request)
    {
        $input = $request->all();

        if($request->foto){
            $input['foto'] = $request->foto->getClientOriginalName();
            $request->file('foto')->move('storage/mahasiswa',$input['foto']);
        }

        Mahasiswa::create($input);
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrfail($id);
        return view('admin.mahasiswa.edit',compact('mahasiswa'));
    }

    public function update(request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrfail($id);
        $input     = $request->all();
        if($request->foto)
        {
            $input['foto'] =$request->foto->getClientOriginalName();
            $request->file('foto')->move('storage/mahasiswa',$input['foto']);
        }
        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index');
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }

    public function print()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.print',compact('mahasiswa'));
    }
    

}
