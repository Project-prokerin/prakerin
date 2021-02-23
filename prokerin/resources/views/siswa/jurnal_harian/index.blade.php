@extends('template.master')
@push('link')
<style>
        .card-body h6{
                font-size: 15px;
        }
        .table-th p{
                text-align: center;
                margin-bottom: -3px;
                color: white;
        }
        .in-jurnal{
                margin-top: -10px;
        }
        .modal{
                margin-left: 130px;
                margin-top: 43px;
        }
</style>
@endpush
@section('title', 'Prakerin | jurnal harian')
@section('judul', 'JURNAL HARIAN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL HARIAN</div>
@endsection
@section('main')
<div class="card">
        <div class="card-header" style="margin-bottom: -30px;">
                <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 pl-4"><h6>Nama Perusahaan</h6></label>
                            <div class="col-sm-9">
                                <label for=""><h6>: TelkomNet.Co</h6></label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -35px;">
                            <label for="" class="col-sm-3 pl-4"><h6>Lokasi</h6></label>
                            <div class="col-sm-9">
                                <label for=""><h6>: Jakarta Pusat Jl.Blok B</h6></label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -35px;">
                            <label for="" class="col-sm-3 pl-4"><h6>Tanggal</h6></label>
                            <div class="col-sm-9">
                                <label for=""><h6>: 15 September 2022</h6></label>
                            </div>
                        </div>
                </div>
                <div class="card-header-action" style="margin-bottom: -15px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                    </button>
                </div>
        </div>


{{-- table --}}
<div class="card-body p-4" style="margin-top: -45px;">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
           <thead class="text-white">
              <tr class="bg-primary table-th">
                 <th scope="col"><p>No</p></th>
                 <th scope="col"><p>Tanggal</p></th>
                 <th scope="col" style="width: 130px;"><p>Jam Datang</p></th>
                 <th scope="col" style="width: 130px;"><p>Jam Pulang</p></th>
                 <th scope="col"><p>Kegiatan Harian</p></th>
              </tr>
           </thead>
           <tbody style="padding-top: 200px">
              <tr>
                    <th scope="row">1</th>
                <td>
                  22/02/2021
                  <div class="table-links">
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                    <p href="#" class="font-weight-600">19.23</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">01.30</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">
                            Membuat sebuah design web, tahap pertama yaitu dengan mendesign tampilan awal
                            /mockup menggunakan software figma. sekian untuk hari ini terimakasih
                    </p>
                </td>
              </tr>
              <tr>
                    <th scope="row">2</th>
                <td>
                  22/02/2021
                  <div class="table-links">
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                    <p href="#" class="font-weight-600">19.23</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">01.30</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">
                            Membuat sebuah design web, tahap pertama yaitu dengan mendesign tampilan awal
                            /mockup menggunakan software figma. sekian untuk hari ini terimakasih
                    </p>
                </td>
              </tr>
              <tr>
                    <th scope="row">3</th>
                <td>
                  22/02/2021
                  <div class="table-links">
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                    <p href="#" class="font-weight-600">19.23</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">01.30</p>
                </td>
                <td>
                    <p href="#" class="font-weight-600">
                            Membuat sebuah design web, tahap pertama yaitu dengan mendesign tampilan awal
                            /mockup menggunakan software figma. sekian untuk hari ini terimakasih
                    </p>
                </td>
              </tr>
           </tbody>
        </table>
   </div>
</div>
{{-- table --}}

{{-- pagelink footer --}}
<div class="card-footer">
      <div class="card-body" style="float: right; margin-top: -20px;">
         <nav aria-label="Page navigation example">
            <ul class="pagination">
               <li class="page-item"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
            </ul>
         </nav>
      </div>
</div>
{{-- pagelink footer --}}
</div>









{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <div class="row mt-3">
                        <div class="col-sm-12">
                          <div class="">
                            <div class="card-body">
                              <h5 class="card-title mb-5">Jurnal Harian</h5>
                              <div class="row">
                                {{-- tgl pelaksanaan --}}
                                <div class="col-sm-12">
                                        <div class="form-group">
                                                <label><h6>Tanggal Pelaksanaan</h6></label>
                                                <div class="input-group in-jurnal">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                      <i class="fas fa-calendar"></i>
                                                    </div>
                                                  </div>
                                                  <input type="date" class="form-control daterange-cus">
                                                </div>
                                              </div>
                                  </div>
                                {{-- tgl pelaksanaan --}}
                              </div>
                              <div class="row">
                                {{-- jam masuk --}}
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label><h6>Jam Masuk</h6></label>
                                    <div class="input-group in-jurnal">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-clock"></i>
                                        </div>
                                      </div>
                                      <input type="time" class="form-control timepicker">
                                    </div>
                                  </div>
                                  </div>
                                {{-- jam masuk --}}

                                {{-- jam pulang --}}
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label><h6>Jam Pulang</h6></label>
                                      <div class="input-group in-jurnal">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                          </div>
                                        </div>
                                        <input type="time" class="form-control timepicker">
                                      </div>
                                    </div>
                                  </div>
                                {{-- jam pulang --}}
                              </div>

                              {{-- kegiatanharian --}}
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                          <label><h6>Kegiatan Harian</h6></label>
                                          <div class="input-group in-jurnal">
                                            <div class="input-group-prepend">
                                            </div>
                                            <textarea name="" id="" class="form-control daterange-cus"></textarea>
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
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            {{-- button save --}}
          </div>
        </div>
      </div>
{{-- modal --}}
@endsection
@push('script')

@endpush


