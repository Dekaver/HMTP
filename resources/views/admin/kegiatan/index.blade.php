<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('kegiatan.store')}}" enctype="multipart/form-data">
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

                            <label class="block form-group w-100 cursor-pointer">
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
                <form method="post" id="editModalForm" action="{{route('kegiatan.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Edit Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nama</h4>
                                    <div class="form-group">
                                        <input name="nama" id="inp-nama" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Kategori</h4>
                                    <div class="form-group">
                                        <input name="kategori" id="inp-kategori" type="text" class="form-control">
                                    </div>

                                    <label class="block form-group w-100 cursor-pointer">
                                        <span class="text-gray-700">Foto Kegiatan</span>
                                        <div class="w-100">
                                          <img class="object-contain" id="inp-img" height="100" src="">
                                        </div>
                                        <input 
                                          class="form-control"
                                          type="file" 
                                          name="foto"
                                          id="inp-foto"
                                          onchange="document.getElementById('inp-img').src = window.URL.createObjectURL(this.files[0])">
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
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatan as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration}}</td>
                                            <td>{{$item->periode->tahun}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kategori}}</td>
                                            <td>{{$item->foto}}</td>
                                            <td style="text-align: center;">
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
                    var src = "{{ asset('storage/kegiatan') }}/"+response.foto;
                    console.log(src);
                    $("#inp-nama").val(response.nama);
                    $("#inp-kategori").val(response.kategori);
                    // $("#inp-foto").val(response.foto);
                    $("#inp-img").attr("src", src);
                    $("#editModalForm").attr("action", "/admin/kegiatan/" + id)
                });
            });
        </script>
    @endpush

</x-app-layout>