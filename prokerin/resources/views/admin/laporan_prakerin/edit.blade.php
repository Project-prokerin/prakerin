<form action="{{ route('laporan.update',$laporan->id) }}" method="post" id="edit_form">
    @method('PUT')
    @csrf

    <div class="row mt-3">
        <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title mb-5">Laporan Prakerin</h5>

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label>
                                    <h6>Judul Laporan</h6>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="text"  name="judul_laporan" id="judul_laporan"
                                        class="form-control " value="{{$laporan->judul_laporan}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    <h6>No kelompok</h6>
                                </label>
                                <div class="input-group">
                                   
                                    <select name="id_kelompok_laporan" id="id_kelompok_laporan"
                                        class="form-control select2" >
                                        <option value="">--No Kelompok--</option>
                                        <option value="{{ $laporan->kelompok_laporan->no }}" selected>{{ $laporan->kelompok_laporan->no}}

                                        @forelse ($kelompok as $item)
                                            <option value="{{ $item->no }}">{{ $item->no }}
                                            @empty
                                            <option disabled>Belom ada kelompok laporan!
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                        </div>



                    </div>
            </div>
        </div>
    </div>
   
</div>