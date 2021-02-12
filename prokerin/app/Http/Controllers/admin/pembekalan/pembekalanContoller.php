<?php

namespace App\Http\Controllers\admin\pembekalan;

use App\Http\Controllers\Controller;
use App\Models\pembekalan_magang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
class pembekalanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = pembekalan_magang::all();
        $sidebar = 'pembekalan';
        return view('admin.pembekalan.index', compact('data','sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function show(pembekalan_magang $pembekalan_magang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function delete_all(Request $request){

    }
    public function download($id)
    {

    }
}
