<?php

namespace App\Http\Controllers\admin\jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jurnal_prakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.index', compact('sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax()
    {
        return response()->json();
    }
    public function tambah(Request $request)
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.tambah', compact('sidebar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.detail', compact('sidebar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidebar = 'jurnal';
        return view('admin.jurnal_prakerin.edit', compact('sidebar'));
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    }
    public function delete_all(Request $request)
    {
    }
}
