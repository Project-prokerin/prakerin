@extends('template.master')
@push('link')
    <link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Script -->
        <!-- Font Awesome JS -->
    <style>
        .card {
            height: auto;
        }

        .buton {
            margin-top: 30px;
            margin-left: 50px;
            margin-bottom: 30px;
            width: 40%;
        }

        .table {
            margin-top: 20px;
        }

    </style>
@endpush
@section('title', 'Prakerin | Jurnal Harian')
@section('judul', 'JURNAL HARIAN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> JURNAL HARIAN</div>
@endsection
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Jurnal Harian</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive" id="mytable4">
            <table class="table table-striped" id="table99">
              <thead class="text-center">
                <tr>
                  <th>
                    No
                  </th>
                  <th >Nama siswa</th>
                    <th >Tanggal</th>
                    <th >Jam Datang</th>
                    <th >Jam Pulang</th>
                    <th >Kegiatan Harian</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>
                    1
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('jurnalH.post') }}" method="POST" id="contact_form">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="/admin/jurnalH">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Jurnal Harian</h5>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Siswa Prakerin</h6>
                                                    </label>

                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <select name="id_siswa" class="form-control    select2"
                                                            id="id_siswa">
                                                            <option value="">--Cari Siswa--</option>
                                                            @foreach ($data_prakerin as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{-- tgl pelaksanaan --}}
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <label>
                                                        <h6>Tanggal Pelaksanaan</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            class="form-control daterange-cus ">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- tgl pelaksanaan --}}
                                        </div>
                                        <div class="row">
                                            {{-- jam masuk --}}
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Jam Masuk</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-clock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="time" name="datang" id="datang"
                                                            class="form-control timepicker ">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- jam masuk --}}

                                            {{-- jam pulang --}}
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label>
                                                        <h6>Jam Pulang</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-clock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="time" name="pulang" id="pulang"
                                                            class="form-control timepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- jam pulang --}}
                                        </div>

                                        {{-- kegiatanharian --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Kegiatan Harian</h6>
                                                    </label>
                                                    <div class="input-group in-jurnal">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <textarea id="kegiatan_harian" name="kegiatan_harian"
                                                            class="form-control daterange-cus "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- kegiatanharian --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                {{-- button save --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                </div>

                {{-- button save --}}
            </div>
        </div>
        </form>
    </div>


    <div class="modal fade" id="editModal" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="editBody">

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="update" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>








    {{-- <div class="modal fade" id="mediumModal"  role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div> --}}




      <span id="role" data-role="{{ Auth::user()->role }}"></span>


@endsection
@push('script')
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('assets/js/pages-admin/jurnalH.js') }}"></script>
@endpush
