@extends('template.master')
@push('link')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>

    </style>
@endpush
@section('title', 'Prakerin | Pengajuan Prakerin')
@section('judul', ' PENGAJUAN PRAKERIN')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
    <div class="breadcrumb-item"> <i class="far fa-building"></i> Pengajuan Prakerin</div>
@endsection
@section('main')
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
        {{-- baru --}}
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pengajuan Prakerin</h4>
                </div>
                <div class="card-body">

                  <div class="table-responsive" id="mytable4">
                    <table class="table table-striped" id="table30">
                      <thead class="text-center">
                        @if (Auth::user()->role === 'kaprog' || Auth::user()->role === 'hubin'|| Auth::user()->role === 'admin' || Auth::user()->role === 'tu' || Auth::user()->role === 'bkk')
                        <tr>
                          <th>
                            No
                          </th>
                          <th>Guru Pembimbing</th>
                          <th>Perusahaan</th>
                          <th>status</th>
                          {{-- <th>Persetujuan</th> --}}
                          <th>Action</th>
                        </tr>
                        @elseif(Auth::user()->role === 'kepsek' )
                        <tr>
                          <th>
                            No
                          </th>
                          <th>Guru Pembimbing</th>
                          <th>Perusahaan</th>
                          <th>Persetujuan</th>
                          <th>Action</th>
                        </tr>
                        @endif

                      </thead>
                      <tbody class="text-center">
                        {{-- <tr>
                          <td>
                            1
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> --}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="accModal" aria-labelledby="accModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="accBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="setujuimagang" class="btn btn-primary">Setujui</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

    <div class="modal fade" id="downloadModal" aria-labelledby="downloadModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="downloadBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="download" class="btn btn-primary">download</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

                <span id="role" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/pages-admin/pengajuan_prakerin.js') }}" ></script>


    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


@endpush
