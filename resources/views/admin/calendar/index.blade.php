
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
                        <h4 class="card-title">Data calendar</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered">
                                <thead class="thead-primary text-center">
                                    <tr>
                                        <th class="">No.</th>
                                        <th class="">Periode</th>
                                        <th class="col-2">Deskripsi</th>
                                        <th class="col-2">Foto</th>
                                        <th class="col-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calendar as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration}}</td>
                                        <td>{{$item->periode->tahun}}</td>
                                        <td>{{ substr($item->deskripsi, 0, 50)}}...</td>
                                        <td><a href="calendar{{$item->foto}}">{{ $item->foto }}</a></td>
                                        <td style="text-align: center;">
                                            <div class="row m-0">

                                                <button
                                                    style="border-radius: 15px"
                                                    value="{{ $item->id}}"
                                                    class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editcalendarButton"
                                                    data-toggle="modal"
                                                    data-target="#scrollable-modal-edit">
                                                        <i class="fas fa-edit"></i>
                                                </button>
                                                <form  class="btn p-0" method="post" action="{{route('calendar.destroy',$item->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border-radius: 15px;" class="btn waves-effect waves-light btn-outline-danger pt-1 pb-1">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form method="post" class="w-100" action="{{route('calendar.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Tambah calendar</h5>
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
            <form method="post" class="w-100" action="" id="editcalendar" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitleEdit">Edit Calendar</h5>
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

                                    <h4 class="card-title">Foto</h4>
                                    <label class="form-group cursor-pointer w-100">
                                        <div class="w-100">
                                          <img class="object-contain" height="100" src="" id="previewEdit">
                                        </div>
                                        <div class="input-group w-100">
                                            <div class="custom-file">
                                              <input type="file" name="foto" onchange="document.getElementById('previewEdit').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" id="imageEdit">
                                              <label class="custom-file-label" for="imageEdit">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                              <span class="input-group-text"></span>
                                            </div>
                                        </div>
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
    
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
    
            $(document).on("click", ".editcalendarButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "calendar/"+id+"/edit",
                }).done(function(response)
                {
                    console.log(response);
                    $("#inp-deskripsi").val(response.deskripsi);
                    $("#inp-foto").val(response.foto);
                    $("#previewEdit").attr("src", "{{asset('storage/calendar')}}/"+response.foto);
                    $("#editcalendar").attr("action", "/admin/calendar/" + id)
                });
            });
        </script>
        
    @endpush
</x-app-layout>
