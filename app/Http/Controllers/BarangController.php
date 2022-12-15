<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Barang::latest()->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->addColumn('action', function($row){
                $html = '<a href='. route('barang.edit', $row) . ' class="btn btn-info btn-m ml-3">Edit</a>';
                $html .= '<a href='. route('barang.destroy', $row) . ' class="btn btn-danger btn-m ml-1" onclick="notificationBeforeDelete(event, this)">Delete</a>';
                return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('barang/index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            'tanggalKadaluarsa'=>'required'
        ]);
        $array = $request->only([
            'nama',
            'jumlah',
            'harga',
            'tanggalKadaluarsa'
        ]);
        $barang = Barang::create($array);
        return redirect()->route('barang.index')
        ->with('succes_massage','Berhasil Menambahkan Data Barang');

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
        $barang = Barang::find($id);
        if (!$barang) return redirect()->route('barang.index')
        ->with('error_message', 'barang dengan id'.$id.' tidak ditemukan');

        return view('barang.edit', [
        'barang' => $barang
    ]);
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
        $request->validate([
            'nama'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            'tanggalKadaluarsa'=>'required'
            
        ]);

        $array = $request->only([
            'nama',
            'jumlah',
            'harga',
            'tanggalKadaluarsa'
            
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update($array);
        return redirect()->route('barang.index')
    ->with('success_message', 'Berhasil mengubah barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, $id)
    {
        $barang = barang::find($id);
        if ($barang) $barang->delete();
    return redirect()->route('barang.index')
        ->with('success_message', 'Berhasil menghapus barang');
    }

    
    

    function cetakpdf()
    {
        $barang = Barang::all();
        $pdf = \PDF::loadView('cetakpdf', ['barang' => $barang]);
        return $pdf -> download('laporan Barang.pdf');
    }

}
