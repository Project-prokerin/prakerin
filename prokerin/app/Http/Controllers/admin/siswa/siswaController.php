<?php

namespace App\Http\Controllers\admin\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\orang_tua;
use App\Models\pembekalan_magang;
use App\Models\sekolah_asal;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
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
            $data = Siswa::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('username', function ($row) {
                    $username = !empty($row->username) ? $row->username : 'empty'; // relasi user->siswa
                    return $username;
                })
                ->addColumn('TTL', function ($row) { // menambahkan button
                    return $row->tempat_lahir.', '. $row->tanggal_lahir->isoFormat('DD MMMM YYYY');
                })
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
                ->rawColumns(['action', 'checkbox','TTL'])
                ->make(true);
            return response()->json(compact('data'));
        }
        return view('admin.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.tambah');
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
            'nama_siswa' =>'required',
            'nipd' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'alamat'=>'required',
            'jenis_tinggal' => 'required',
            'transportasi'=>'required',
            'no_hp' => 'required',
            'email' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'anak_ke' => 'required',
            'jmlh_saudara' => 'required',
            'kebutuhan_khusus' => 'required',
            'no_akte' => 'required',
            'nomor_kk' => 'required',
            'nama_ayah' => 'required',
            'tl_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nik_ayah' => 'required',
            'nama_ibu' => 'required',
            'tl_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'nik_ibu' => 'required',
            'asal_sekolah' => 'required',
            'no_ijazah' => 'required',
            'shkun' => 'required',
        ]);
        // $bkk = user::where('role','bkk')->first();
        $guru_id = Auth::user()->guru->id;
        $user = User::create(['username' => $request->nipd, 'role' => 'siswa','password' => Hash::make('password')]);
        $request->request->add(['user_id' => $user->id]);

        $siswa = Siswa::create(['nama_siswa' => $request->nama_siswa,'nipd' => $request->nipd,'jk' => $request->jk,'tempat_lahir'=>$request->tempat_lahir,'tanggal_lahir' => $request->tanggal_lahir,'nik'=>$request->nik,'agama'=>$request->agama,'alamat'=>$request->alamat,'jenis_tinggal'=>$request->jenis_tinggal,'transportasi'=>$request->transportasi,'no_hp'=>$request->no_hp,'email'=>$request->email,'bb'=>$request->bb,'tb'=>$request->tb,'anak_ke'=>$request->anak_ke,'jmlh_saudara'=>$request->jmlh_saudara,'kebutuhan_khusus'=>$request->kebutuhan_khusus,'no_akte'=>$request->no_akte,'user_id'=>$request->user_id,'created_at'=> Carbon::now()]);

        $request->request->add(['id_siswa' => $siswa->id]);

        // $pembekalan = pembekalan_magang::create(['text_wpt_iq' => 'kosong', 'personality_interview' => 'kosong', 'file_portofolio' => 'kosong', 'id_guru' => $guru_id, 'id_siswa' => $request->id_siswa]);

        $orangtua = orang_tua::create(['id_siswa'=>$request->id_siswa,'nomor_kk'=>$request->nomor_kk,'nama_ayah'=>$request->nama_ayah,'tl_ayah'=>$request->tl_ayah,'pendidikan_ayah'=>$request->pendidikan_ayah,'pekerjaan_ayah'=>$request->pekerjaan_ayah,'penghasilan_ayah'=>$request->penghasilan_ayah,'nik_ayah'=>$request->nik_ayah,'nama_ibu'=>$request->nama_ibu,'tl_ibu'=>$request->tl_ibu,'pendidikan_ibu'=>$request->pendidikan_ibu,'pekerjaan_ibu'=>$request->pendidkan_ibu,'pekerjaan_ibu'=>$request->pekerjaan_ibu,'penghasilan_ibu'=>$request->penghasilan_ibu,'nik_ibu'=>$request->nik_ibu,'status'=>$request->status,'created_at'=> Carbon::now()]);

        $sekolah_asal = sekolah_asal::create(['id_siswa'=>$request->id_siswa,'asal_sekolah'=> $request->asal_sekolah,'no_ijazah'=>$request->no_ijazah,'shkun'=>$request->shkun,'created_at'=>Carbon::now()]);
        return redirect('/siswa')->with('success', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $orangtua = orang_tua::where('id_siswa', $siswa->id)->first();
        $sekolah = sekolah_asal::where('id_siswa', $siswa->id)->first();
        return view('admin.siswa.edit', compact('siswa', 'orangtua', 'sekolah'));
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

            $request->validate([
                'nama_siswa' => 'required',
                'nipd' => 'required',
                'jk' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'nik' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'jenis_tinggal' => 'required',
                'transportasi' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
                'bb' => 'required',
                'tb' => 'required',
                'anak_ke' => 'required',
                'jmlh_saudara' => 'required',
                'kebutuhan_khusus' => 'required',
                'no_akte' => 'required',
                'nomor_kk' => 'required',
                'nama_ayah' => 'required',
                'tl_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'penghasilan_ayah' => 'required',
                'nik_ayah' => 'required',
                'nama_ibu' => 'required',
                'tl_ibu' => 'required',
                'pendidikan_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'penghasilan_ibu' => 'required',
                'nik_ibu' => 'required',
                'asal_sekolah' => 'required',
                'no_ijazah' => 'required',
                'shkun' => 'required',
            ]);
        $siswa = Siswa::where('id', $id)->update(['nama_siswa' => $request->nama_siswa, 'nipd' => $request->nipd, 'jk' => $request->jk, 'tempat_lahir' => $request->tempat_lahir, 'tanggal_lahir' => $request->tanggal_lahir, 'nik' => $request->nik, 'agama' => $request->agama, 'alamat' => $request->alamat, 'jenis_tinggal' => $request->jenis_tinggal, 'transportasi' => $request->transportasi, 'no_hp' => $request->no_hp, 'email' => $request->email, 'bb' => $request->bb, 'tb' => $request->tb, 'anak_ke' => $request->anak_ke, 'jmlh_saudara' => $request->jmlh_saudara, 'kebutuhan_khusus' => $request->kebutuhan_khusus, 'no_akte' => $request->no_akte,  'updated_at' => Carbon::now()]);

        $orangtua =  orang_tua::where('id_siswa', $id)->update(['nomor_kk'=>$request->nomor_kk,'nama_ayah'=>$request->nama_ayah,'tl_ayah'=>$request->tl_ayah,'pendidikan_ayah'=>$request->pendidikan_ayah,'pekerjaan_ayah'=>$request->pekerjaan_ayah,'penghasilan_ayah'=>$request->penghasilan_ayah,'nik_ayah'=>$request->nik_ayah,'nama_ibu'=>$request->nama_ibu,'tl_ibu'=>$request->tl_ibu,'pendidikan_ibu'=>$request->pendidikan_ibu,'pekerjaan_ibu'=>$request->pendidkan_ibu,'pekerjaan_ibu'=>$request->pekerjaan_ibu,'penghasilan_ibu'=>$request->penghasilan_ibu,'nik_ibu'=>$request->nik_ibu,'status'=>$request->status,'updated_at'=> Carbon::now()]);

        $sekolah =  sekolah_asal::where('id_siswa', $id)->update(['asal_sekolah'=> $request->asal_sekolah,'no_ijazah'=>$request->no_ijazah,'shkun'=>$request->shkun,'created_at'=>Carbon::now()]);

        return redirect('/siswa')->with('success','Data siswa sudah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $siswa = Siswa::where('id', $id)->first();
        User::where('id', $siswa->user_id)->delete();
        Siswa::where('id', $id)->delete();

        return response()->json(['success' => 'success']);
    }
    public function delete_all(Request $request){
        $siswa = Siswa::whereIn('id', $request->id)->get();
        $user_id = [];
        foreach ($siswa as $siswas) {
            $user_id[] = $siswas->user_id;
        }
        User::where('id', $user_id)->delete();
        Siswa::where('id', $request->id)->delete();
        return response()->json(['fail' => 'data berhasil di hapus']);
    }
}
