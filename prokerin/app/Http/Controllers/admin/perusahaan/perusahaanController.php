<?php

namespace App\Http\Controllers\admin\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Yajra\DataTables\DataTables;

class perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //  ambil semua user
            $data = perusahaan::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) { // menambahkan button
                $input = '<input type="checkbox" class="cb-child" ata-toggle="tooltip" data-original-title="checkbox" data-id="' . $row->id . '" value="' . $row->id . '">';
                    return $input;
                })
                ->addColumn('action', function ($row) {
                    // button show
                    $btn0 = '<a href="/siswa/'.$row->id.'" data-toggle="tooltip"  data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-search"></i></a>';
                    // button update
                    $btn1 = $btn0. ' <a href="/siswa/' . $row->id . '/editar" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="fas fa-pencil-alt"></i></a>';
                    // button delete
                    $btn1 = $btn1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                    return $btn1;
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
            return response()->json(compact('data'));
        }
        return view('admin.perusahaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = perusahaan::where('id', $id)->first();
        return response()->json(['success' => 'sccesss']);
    }
    public function delete_all(Request $request){
        perusahaan::whereIn('id', $request->id)->delete();
        return back();
    }
}
