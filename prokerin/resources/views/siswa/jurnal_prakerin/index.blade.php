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
        .box-jurnal{
                margin-top: -10px;
                margin-left: 16px;
                margin-bottom: 20px;
        }
        .modal{
                margin-left: 130px;
                margin-top: 43px;
        }
</style>
@endpush
@section('title', 'Prakerin | jurnal prakerin')
@section('judul', 'JURNAL PRAKERIN')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="far fa-newspaper"></i> JURNAL PRAKERIN</div>
@endsection
@section('main')
        <div class="card">
                <div class="card-header" style="margin-bottom: -30px;">
                        <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 pl-4"><h6>Nama</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: Nur FIrdaus</h6></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -35px;">
                                    <label for="" class="col-sm-3 pl-4"><h6>Nama Perusahaan</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: TelkomNet.Co</h6></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -35px;">
                                    <label for="" class="col-sm-3 pl-4"><h6>Lokasi</h6></label>
                                    <div class="col-sm-9">
                                        <label for=""><h6>: Jakarta Pusat. Jl.Blok B</h6></label>
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
                      <tr class="bg-primary table-th pb-2">
                         <th scope="col"><p>No</p></th>
                         <th scope="col"><p>Kompetisi Dasar</p></th>
                         <th scope="col" style=""><p>Topik Pembelajaran</p></th>
                         <th scope="col" style=""><p>Tanggal Pelaksanaan</p></th>
                      </tr>
                   </thead>
                   <tbody style="padding-top: 200px">
                      <tr>
                            <th scope="row">1</th>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                    22/02/2022
                            </p>
                        </td>
                      </tr>
                      <tr>
                            <th scope="row">2</th>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                22/02/2022
                            </p>
                        </td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dolorem!
                            </p>
                        </td>
                        <td>
                            <p class="font-weight-600">
                                22/02/2022
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
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-body">
                        <div class="row mt-3">
                                <div class="col-sm-6">
                                  <div class="">
                                    <div class="card-body">
                                      <h5 class="card-title mb-5">Fasilitas Prakerin</h5>
                                      <div class="row">
                                        {{-- mess --}}
                                        <div class="col-sm-6">
                                                <h6 class="card-title">Mess</h6>
                                                <div class="row">
                                                        <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                                              </div>
                                                              <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                                                              </div>
                                                </div>
                                          </div>
                                        {{-- mess --}}

                                        {{-- bus antar jemput --}}
                                          <div class="col-sm-6">
                                                <h6 class="card-title">Bus Antar Jemput</h6>
                                                <div class="row">
                                                        <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                                              </div>
                                                              <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                                                              </div>
                                                </div>
                                          </div>
                                        {{-- bus antar jemput --}}
                                      </div>
                                      <div class="row">
                                        {{-- makan siang --}}
                                        <div class="col-sm-6">
                                                <h6 class="card-title">Makan Siang</h6>
                                                <div class="row">
                                                        <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                                              </div>
                                                              <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                                                              </div>
                                                </div>
                                          </div>
                                        {{-- makan siang --}}

                                        {{-- intensif --}}
                                          <div class="col-sm-6">
                                                <h6 class="card-title">Intensif</h6>
                                                <div class="row">
                                                        <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Iya</label>
                                                              </div>
                                                              <div class="form-check form-check-inline box-jurnal">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                                                              </div>
                                                </div>
                                          </div>
                                        {{-- intensif --}}
                                      </div>
                                      <br>

                                      {{-- textarea --}}
                                      <h6 class="card-title">Kompetensi Dasar</h6>
                                      <div class="">
                                        <textarea class="form-control" ></textarea>
                                      </div>
                                      <br>
                                      <h6 class="card-title">Topik Pekerjaan</h6>
                                      <div class="">
                                        <textarea class="form-control" ></textarea>
                                      </div>
                                      {{-- textarea --}}

                                    </div>
                                  </div>
                                </div>

                                {{-- tgl-jam --}}
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <br>
                                      <div class="">
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
                                          <div class="form-group">
                                            <label><h6>Jam Istirahat</h6></label>
                                            <div class="input-group in-jurnal">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fas fa-clock"></i>
                                                </div>
                                              </div>
                                              <input type="time" class="form-control timepicker">
                                            </div>
                                          </div>
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
                                    </div>
                                </div>
                                {{-- tgl-jam --}}
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


