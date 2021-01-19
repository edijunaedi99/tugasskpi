<?php

namespace App\Http\Controllers;

use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulevels')->get();
        // dd($edulevels);
        return view('edulevel.data', ['edulevels' => $edulevels]);
    }
    public function add()
    {
        return view('edulevel.add');
    }
    public function addProcess(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required',
        //     'harga' => 'required',
        //     'penerbit' => 'required'
        // ]);
        // dd($request);
        // return $request;
        DB::table('edulevels')->insert([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'penerbit' => $request->penerbit
            ]);
            return redirect('edulevels')->with('status', 'Data Berhasil diTambah!');
    }
    public function edit($id)
    {
        $edulevel = DB::table('edulevels')->where('id', $id)->first();
        // dd($edulevel);
        return view('edulevel/edit', compact('edulevel'));
    }
    public function editProcess(Request $request, $id)
    {
        DB::table('edulevels')->where('id', $id)->update([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'penerbit' => $request->penerbit
            ]);
            return redirect('edulevels')->with('status', 'Data Berhasil di Update!');
    }
    public function delete($id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        // return "delete";
        return redirect('edulevels')->with('status', 'Data Berhasil di Hapus!');
    }
}
