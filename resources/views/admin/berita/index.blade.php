@push('css')
<link href="{{ asset('src/assets/libs/summernote/summernote.min.css') }}" rel="stylesheet">

<style>
    .note-editor .note-toolbar{
        background: #000;
    }
    .modal-lg{
        max-width: 90%;
    }

    .note-editor.fullscreen .note-editing-area{
        background-color: #fff;
    }
</style>
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
                        <h4 class="card-title">Data Berita</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered">
                                <thead class="thead-primary text-center">
                                    <tr>
                                        <th class="">No.</th>
                                        <th class="">Judul</th>
                                        <th class="">Foto</th>
                                        <th class="col-2">Isi</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berita as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration}}</td>
                                        <td>{{ substr($item->judul, 0, 50)}}...</td>
                                        <td><a href="{{url('storage/berita/'.$item->foto)}}">{{$item->foto}}</a></td>
                                        <td>{{ substr($item->isi, 0, 50)}}...</td>
                                        <td style="text-align: center;">
                                            <button
                                                style="border-radius: 15px"
                                                value="{{ $item->id}}"
                                                class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editBerita"
                                                data-toggle="modal"
                                                data-target="#scrollable-modal-edit">
                                                    <i class="fas fa-edit"></i>
                                            </button>
                                            <form  class="btn p-0" method="post" action="{{route('berita.destroy',$item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border-radius: 15px;" class="btn waves-effect waves-light btn-outline-secondary pt-1 pb-1">
                                                    <i class="far fa-trash-alt"></i>
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
            <form method="post" class="w-100" action="{{route('berita.store')}}" enctype="multipart/form-data">
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
                                    <h4 class="card-title">Judul</h4>
                                    <div class="form-group">
                                        <input name="judul" type="text" class="form-control">
                                        <X-validate-error-message name="judul"/>
                                    </div>

                                    <h4 class="card-title">Foto</h4>
                                    <label class="block form-group cursor-pointer w-100">
                                        <div class="w-100">
                                          <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="preview">
                                        </div>
                                        <div class="input-group ">
                                            <div class="custom-file">
                                              <input type="file" name="foto" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" id="image">
                                              <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                              <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <X-validate-error-message name="foto"/>
                                    </label>

                                    <h4 class="card-title">Isi</h4>
                                    <div class="form-group">
                                        <textarea name="isi" class="form-control summernote"></textarea>
                                        <X-validate-error-message name="isi"/>
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
            <form method="post" class="w-100" action="" id="editBerita" enctype="multipart/form-data">
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
                                    <h4 class="card-title">Judul</h4>
                                    <div class="form-group">
                                        <input name="judul" id="inp-judul" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Foto</h4>
                                    <label class="block form-group cursor-pointer w-100">
                                        <div class="w-100">
                                          <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="previewEdit">
                                        </div>
                                        <div class="input-group ">
                                            <div class="custom-file">
                                              <input type="file" name="foto" onchange="document.getElementById('previewEdit').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" id="imageEdit">
                                              <label class="custom-file-label" for="imageEdit">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                              <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </label>
                                        <X-validate-error-message name="foto"/>
                                    <h4 class="card-title">Isi</h4>
                                    <div class="form-group">
                                        <textarea name="isi" id="inp-isi" class="form-control summernote"></textarea>
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
                $('.summernote').summernote({
                    height: 150,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
    
            $(document).on("click", ".editBerita", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "berita/"+id+"/edit",
                }).done(function(response)
                {
                    console.log(response);
                    $("#inp-judul").val(response.judul);
                    $("#inp-foto").val(response.foto);
                    $("#inp-isi").summernote('code',response.isi);
                    $("#previewEdit").attr("src", "{{asset('storage/berita')}}/"+response.foto);
                    $("#editBerita").attr("action", "/admin/berita/" + id)
                });
            });
        </script>
        
    @endpush
</x-app-layout>
