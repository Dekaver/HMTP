<x-app-layout>
    @push('css')
        <style>
            .files input {
                outline: 2px dashed #92b0b3;
                outline-offset: -10px;
                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                transition: outline-offset .15s ease-in-out, background-color .15s linear;
                padding: 120px 0px 85px 35%;
                text-align: center !important;
                margin: 0;
                width: 100% !important;
            }
            .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
            }
            .files{ position:relative}
            .files:after {  pointer-events: none;
                position: absolute;
                top: 60px;
                left: 0;
                width: 50px;
                right: 0;
                height: 56px;
                content: "";
                background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                display: block;
                margin: 0 auto;
                background-size: 100%;
                background-repeat: no-repeat;
            }
            .color input{ background-color:#f1f1f1;}
            .files:before {
                position: absolute;
                bottom: 10px;
                left: 0;  pointer-events: none;
                width: 100%;
                right: 0;
                height: 57px;
                display: block;
                margin: 0 auto;
                color: #2ea591;
                font-weight: 600;
                text-transform: capitalize;
                text-align: center;
            }
        </style>    
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('kegiatan.store')}}">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="scrollableModalTitle">Tambah Kegiatan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4 class="card-title">Nama</h4>
                            <div class="form-group">
                                <input name="nama" type="text" class="form-control">
                            </div>

                            <h4 class="card-title">Kategori</h4>
                            <div class="form-group">
                                <input name="kategori" type="text" class="form-control">
                            </div>

                            <label class="block form-group cursor-pointer">
                                <span class="text-gray-700">Foto Kegiatan</span>
                                <div class="w-100">
                                  <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="preview">
                                </div>
                                <input 
                                  class="form-control"
                                  type="file" 
                                  name="foto"
                                  id="image"
                                  onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                            </label>

                            <h4 class="card-title">Periode</h4>
                            <div class="form-group">
                                <select class="custom-select mr-sm-2" name="id_periode" id="inlineFormCustomSelect">
                                    @foreach ($periode as $item)
                                    <option value="{{$item->id}}">{{$item->tahun}}-{{$item->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form method="post" id="editModalForm" action="{{route('kegiatan.store')}}">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Deskripsi</h4>
                                    <div class="form-group">
                                        <input name="deskripsi" id="inp-deskripsi" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Visi</h4>
                                    <div class="form-group">
                                        <input name="visi" id="inp-visi" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Misi</h4>
                                    <div class="form-group">
                                        <input name="misi" id="inp-misi" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Struktur Organisasi</h4>
                                    <div class="form-group">
                                        <input name="struktur_organisasi" id="inp-struktur_organisasi" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Periode</h4>
                                    <div class="form-group">
                                        <select class="custom-select mr-sm-2" name="id_periode" id="inlineFormCustomSelect">
                                            @foreach ($periode as $item)
                                            <option value="{{$item->id}}">{{$item->tahun}}-{{$item->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="container-fluid">

        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#scrollable-modal">Tambah Data</button>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data kegiatan</h4>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered no-wrap">
                                    <thead class="thead-primary text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Periode</th>
                                            <th>Deskripsi</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Struktur Organisasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatan as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration}}</td>
                                            <td>{{$item->periode->tahun}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td>{{$item->visi}}</td>
                                            <td>{{$item->misi}}</td>
                                            <td>{{$item->struktur_organisasi}}</td>
                                            <td style="text-align: center;">
                                            {{-- <a href="{{route('kegiatan.edit',$item->id)}}" style="border-radius: 15px;" class="btn waves-effect waves-light btn-warning">
                                                <i class="fas fa-edit"> EDIT</i>
                                            </a> --}}
                                            <button
                                                style="border-radius: 15px"
                                                value="{{ $item->id}}"
                                                class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editkegiatanButton"
                                                data-toggle="modal"
                                                data-target="#editModal">
                                                    <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form  class="btn p-0" method="post" action="{{route('kegiatan.destroy',$item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border-radius: 15px;" class="btn waves-effect waves-light btn-outline-secondary pt-1 pb-1">
                                                    <i class="far fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            {{-- <th>ID</th>
                                            <th>PERTANYAAN</th>
                                            <th>JAWABAN</th>
                                            <th>Action</th> --}}
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            $(document).on("click", ".editkegiatanButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "kegiatan/"+id+"/edit",
                }).done(function(response)
                {
                    console.log(response);
                    // $("#inp-tahun").val(response.tahun);
                    $("#inp-deskripsi").val(response.deskripsi);
                    $("#inp-visi").val(response.visi);
                    $("#inp-misi").val(response.misi);
                    $("#inp-struktur_organisasi").val(response.struktur_organisasi);
                    $("#editModalForm").attr("action", "/kegiatan/" + id)
                });
            });

            inputFoto.onchange = evt => {
                const [file] = inputFoto.files
                if (file) {
                    previewFoto.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush

</x-app-layout>