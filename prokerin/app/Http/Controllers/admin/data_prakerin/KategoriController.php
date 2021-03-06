<?php

namespace App\Http\Controllers\admin\data_prakerin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_nilai_prakerin;
use App\Models\kelas;
use App\Models\Nilai_prakerin;
use App\Models\Siswa;
use App\Models\jurusan;
use Database\Seeders\kategori_nilai_prakerinSeeder;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.kategori.index');
    }

    public function getNameColumn($val)
    {
        //
    }

    public function get_option()
    {
        //
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $kategoriNilaiPrakerin = Kategori_nilai_prakerin::select('*');
            return datatables()->of($kategoriNilaiPrakerin)
            ->addIndexColumn()

            ->filter(function ($instance) use ($request) {
                if ($request->get('jurusan') == 'RPL' || $request->get('jurusan') == 'MM' || $request->get('jurusan') == 'BC' || $request->get('jurusan') == 'TKJ' || $request->get('jurusan') == 'TEI') {
                    $instance->where('jurusan', $request->get('jurusan'));
                }
                if (!empty($request->get('search'))) {
                     $instance->where(function($w) use($request){
                        $search = $request->get('search');
                        $w->orWhere('aspek_yang _dinilai', 'LIKE', "%$search%")
                        ->orWhere('jurusan', 'LIKE', "%$search%")
                        ->orWhere('domain', 'LIKE', "%$search%")
                        ->orWhere('keterangan', 'LIKE', "%$search%");
                    });
                }
            })

          
           
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/kategori/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="../admin/kategori/edit/'.$data->id.'" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
    }

    public function tambah()
    {
        $jurusan = jurusan::all();
    
        return view('admin.kategori.tambah',compact('jurusan'));
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'aspek_yang_dinilai' => 'required',
            'jurusan' =>'required',
            'domain' =>'required',
            'keterangan' =>'required'
        ],[
            'required' => 'Tidak Boleh kosong',
        ]);

        Kategori_nilai_prakerin::create([
            'aspek_yang_dinilai' => $request->aspek_yang_dinilai,
            'jurusan' => $request->jurusan,
            'domain' => $request->domain,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('kategori.index')->with('success','Berhasil menambah kategori');

    }

    public function detail($id)
    {
        $detail = Kategori_nilai_prakerin::find('id',$id)->first();
        return view('admin.kategori.detail',compact('detail'));
    }

    public function edit($id)
    {
        // dd($id);
        $jurusan = jurusan::all();
        $detail = Kategori_nilai_prakerin::find($id)->first();
        return view('admin.kategori.edit',compact('detail','jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aspek_yang_dinilai' => 'required',
            'jurusan' =>'required',
            'domain' =>'required',
            'keterangan' =>'required'
        ],[
            'required' => 'Tidak Boleh kosong',
        ]);
        
    Kategori_nilai_prakerin::find($id)->update([
        'aspek_yang_dinilai' => $request->aspek_yang_dinilai,
        'jurusan' => $request->jurusan,
        'domain' => $request->domain,
        'keterangan' => $request->keterangan,
    ]);
    return redirect()->route('kategori.index')->with('success','Berhasil Ubah kategori');

    }

    public function destroy($id)
    {
        Kategori_nilai_prakerin::where('id',$id)->delete();
        return response()->json($data = 'berhasil');
    }
}
