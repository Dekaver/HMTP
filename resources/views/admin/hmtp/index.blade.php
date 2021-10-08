@push('css')
<link href="{{ asset('src/assets/libs/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#scrollable-modal">Tambah Data</button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data HMTP</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered">
                                <thead class="thead-primary text-center">
                                    <tr>
                                        <th class="">No.</th>
                                        <th class="">Periode</th>
                                        <th class="col-2">Deskripsi</th>
                                        <th class="col-2">Visi</th>
                                        <th class="col-2">Misi</th>
                                        <th class="col-2">Struktur Organisasi</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hmtp as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration}}</td>
                                        <td>{{$item->periode->tahun}}</td>
                                        <td>{{ substr($item->deskripsi, 0, 50)}}...</td>
                                        <td>{{ substr($item->visi, 0, 50)}}...</td>
                                        <td>{{ substr($item->misi, 0, 50)}}...</td>
                                        <td>{{$item->struktur_organisasi}}</td>
                                        <td style="text-align: center;">
                                        {{-- <a href="{{route('hmtp.edit',$item->id)}}" style="border-radius: 15px;" class="btn waves-effect waves-light btn-warning">
                                            <i class="fas fa-edit"> EDIT</i>
                                        </a> --}}
                                        <button
                                            style="border-radius: 15px"
                                            value="{{ $item->id}}"
                                            class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editHmtpButton"
                                            data-toggle="modal"
                                            data-target="#scrollable-modal-edit">
                                                <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form  class="btn p-0" method="post" action="{{route('hmtp.destroy',$item->id)}}">
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

    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form method="post" class="w-100" action="{{route('hmtp.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Deskripsi</h4>
                                    <div class="form-group">
                                        <input name="deskripsi" type="text" class="form-control">
                                        <X-validate-error-message name="deskripsi"/>
                                    </div>

                                    <h4 class="card-title">Visi</h4>
                                    <div class="form-group">
                                        <input name="visi" type="text" class="form-control">
                                        <X-validate-error-message name="visi"/>
                                    </div>

                                    <h4 class="card-title">Misi</h4>
                                    <div class="form-group">
                                        <textarea name="misi" class="form-control summernote"></textarea>
                                        <X-validate-error-message name="misi"/>
                                    </div>

                                    <h4 class="card-title">Struktur Organisasi</h4>
                                    <label class="block form-group cursor-pointer">
                                        <div class="w-100">
                                          <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="preview">
                                        </div>
                                        <input 
                                          class="form-control"
                                          type="file" 
                                          aria-hidden="true"
                                          name="struktur_organisasi"
                                          id="image"
                                          onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                        <X-validate-error-message name="struktur_organisasi"/>
                                    </label>

                                    <h4 class="card-title">Periode</h4>
                                    <div class="form-group">
                                        <select class="custom-select mr-sm-2" name="id_periode" id="inlineFormCustomSelect" required>
                                            <option value="">--Select--</option>
                                            @foreach ($periode as $item)
                                            <option value="{{$item->id}}">{{$item->tahun}}-{{$item->semester}}</option>
                                            @endforeach
                                        </select>
                                        <X-validate-error-message name="periode"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal-edit" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitleEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form method="post" class="w-100" action="" id="editHmtp" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitleEdit">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
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
                                        <textarea name="misi" id="inp-misi" class="form-control summernote"></textarea>
                                    </div>

                                    <h4 class="card-title">Struktur Organisasi</h4>
                                    <label class="form-group cursor-pointer">
                                        <div class="w-100">
                                          <img class="object-contain" height="100" src="" id="previewEdit">
                                        </div>
                                        <input 
                                          class="form-control"
                                          type="file" 
                                          aria-hidden="true"
                                          name="struktur_organisasi"
                                          id="image"
                                          onchange="document.getElementById('previewEdit').src = window.URL.createObjectURL(this.files[0])">
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
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    @push('scripts')
    <script src="{{ asset('src/assets/libs/summernote/summernote.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#inp-misi').summernote({
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['view', ['codeview', 'help']]
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
    
            $(document).on("click", ".editHmtpButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "hmtp/"+id+"/edit",
                }).done(function(response)
                {
                    console.log(response);
                    $("#inp-deskripsi").val(response.deskripsi);
                    $("#inp-visi").val(response.visi);
                    $("#inp-misi").summernote('code',response.misi);
                    $("#inp-struktur_organisasi").val(response.struktur_organisasi);
                    $("#previewEdit").attr("src", "{{asset('storage/struktur-organisasi')}}/"+response.struktur_organisasi);
                    $("#editHmtp").attr("action", "/admin/hmtp/" + id)
                });
            });
        </script>
        
    @endpush
</x-app-layout>
