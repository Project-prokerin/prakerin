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
        return view('admin.pembekalan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Auth::user()->siswa);
        $pembekalan = pembekalan_magang::where('id_siswa', 28)->first();
        return view('admin.pembekalan.tambah', compact('pembekalan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->file('file')->getClientOriginalName());
        // dd($request->input('test_wp'));
        // $pembekalan_magang = new pembekalan_magang;
        // $pembekalan_magang->file = $request->file('file')->getClientOriginalName();
        // $pembekalan_magang->test_wpt_iq = $request->test_wpt_iq;
        // $pembekalan_magang->save();
        // $pembekalan_magang = $request->file('file')->move('PDF/', $request->file('file')->getClientOriginalName());
        // return view('pembekalan.index');
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
        $pem = pembekalan_magang::where('id', $id)->first();
        return view('admin.pembekalan.edit', compact('pem'));
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
        $pem = pembekalan_magang::where('id', $id)->update($request->all());
        return view('pembelakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembekalan = pembekalan_magang::where('id', $id)->delete();
        return response()->json(['success' => 'success']);
    }
    public function delete_all(Request $request){
        $pembekalan = pembekalan_magang::whereIn('id', $request->id)->delete();
        return response()->jsonp(['success' => 'success']);
    }
    public function download($id)
    {
        $file = public_path() . "/PDF/$id";

        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response()->download($file, $id, $headers);
    }
}
