<?php

namespace App\Http\Controllers\admin\pembekalan;

use App\Http\Controllers\Controller;
use App\Models\pembekalan_magang;
use App\Models\Siswa;
use App\Models\guru;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\pembekalan_magangRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class pembekalanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pembekalan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $pembekalan = pembekalan_magang::all();
            return datatables()->of($pembekalan)
                ->addColumn('siswa', function ($pembekalan) {
                    return $pembekalan->siswa->nama_siswa;
                })
                ->editColumn('file', function ($data) {
                    if ($data->file_portofolio === 'belum') {
                        $button = 'belum';
                        return $button;
                    }else {
                    $array = explode(' ', $data->file_portofolio);
                    unset($array[0]);
                    $file = implode(' ', $array);
                        $button = '<a  href="/pembekalan/' . $data->file_portofolio . '/download" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="download text-white">' .  $file . '</a>';
                        return $button;
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a  href="/admin/pembekalan/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','siswa','file'])
                ->addIndexColumn()->make(true);
        }
    }
    public function tambah()
    {
        $Siswa = Siswa::select('*')->whereNotIn('id',function($query) {
            $query->select('id_siswa')->from('pembekalan_magang');
        })->get();
        return view('admin.pembekalan.tambah', ['siswa' => $Siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('file') > 0) {
            $file = time() . ' ' . $request->file('file')->getClientOriginalName();
            $pembekalan_magang = $request->file('file')->move('portofolio_siswa/',  $file);
            $pem = pembekalan_magang::create([
                'id_siswa' => $request->siswa,
                'id_guru' => Auth()->id(),
                'test_wpt_iq' => $request->test_wpt_iq,
                'personality_interview' => $request->personality_interview,
                'soft_skill' => $request->soft_skill,
                'file_portofolio' => $file
            ]);
        } else {
            $pem = pembekalan_magang::create([
                'id_siswa' => $request->siswa,
                'id_guru' => Auth()->id(),
                'test_wpt_iq' => $request->test_wpt_iq,
                'personality_interview' => $request->personality_interview,
                'soft_skill' => $request->soft_skill,
                'file_portofolio' => 'belum'
            ]);
        }
        return redirect()->route('pembekalan.index')->with('success', 'Data berhasil di tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function  detail(pembekalan_magang $pembekalan_magang)
    {
        return view('admin.pembekalan.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembekalan = pembekalan_magang::where('id', $id)->first();
        $Siswa = Siswa::select('*')->whereNotIn('id', function ($query) use($id) {
            $query->select('id_siswa')->from('pembekalan_magang')->where('id','!=', $id);
        })->get();
        return view('admin.pembekalan.edit', compact('Siswa','pembekalan'));
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
        $pem = pembekalan_magang::where('id', $id)->first();
        if ($request->file('file') > 0) {
            $file = time() . ' ' . $request->file('file')->getClientOriginalName();
            $pembekalan_magang = $request->file('file')->move('portofolio_siswa/',  $file);
            if (File::exists("portofolio_siswa/$pem->file_portofolio") && "portofolio_siswa/$pem->file_portofolio" !== "portofolio_siswa/default.pdf") {
                File::delete("portofolio_siswa/$pem->file_portofolio");
            }
            $pem = pembekalan_magang::where('id', $id)->update([
                'id_siswa' => $request->siswa,
                'id_guru' => Auth()->id(),
                'test_wpt_iq' => $request->test_wpt_iq,
                'personality_interview' => $request->personality_interview,
                'soft_skill' => $request->soft_skill,
                'file_portofolio' =>  $file
            ]);
        } else {
            $pem = pembekalan_magang::where('id', $id)->update([
                'id_siswa' => $request->siswa,
                'id_guru' => Auth()->id(),
                'test_wpt_iq' => $request->test_wpt_iq,
                'personality_interview' => $request->personality_interview,
                'soft_skill' => $request->soft_skill,
            ]);
        }


        return redirect()->route('pembekalan.index')->with('success', 'Data berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembekalan_magang  $pembekalan_magang
     * @return \Illuminate\Http\Response
     */
    public function downloads($id)
    {
        // file directory
        $file = public_path() . "/portofolio_siswa/$id";
        // file name
        $array = explode(' ', $id);
        unset($array[0]);
        $id = implode(' ', $array);
        //file headers
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response()->download($file, $id, $headers);
    }
    public function destroy($id)
    {
        $pem = pembekalan_magang::where('id', $id)->first();
        if (File::exists("portofolio_siswa/$pem->file_portofolio") && "portofolio_siswa/$pem->file_portofolio" !== "portofolio_siswa/default.pdf") {
            File::delete("portofolio_siswa/$pem->file_portofolio");
        }
        pembekalan_magang::where('id', $id)->delete();
        return response()->json($data = 'berhasil');
    }
    public function delete_all(Request $request){

    }
    public function download($id)
    {

    }
}
