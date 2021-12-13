<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" action="{{route('Lab.store')}}">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Tambah Laboratorium</h5>
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
                                        <input name="nama" type="text" class="form-control">
                                    </div>
                                    <h4 class="card-title">Deskripsi</h4>
                                    <div class="form-group">
                                        <input name="deskripsi" type="text" class="form-control">
                                    </div>
                                    
                                    <h4 class="card-title">Kegiatan</h4>
                                    <div class="form-group">
                                        <input name="kegiatan" type="text" class="form-control">
                                    </div>
                                    
                                    <h4 class="card-title">Kepala Lab</h4>
                                    <div class="form-group">
                                        <input name="kepala_lab" type="text" class="form-control">
                                    </div>
                                    
                                    <h4 class="card-title">Asisten Lab</h4>
                                    <div id="input-dynamis">
                                        <div class="input-group mb-3 input-dynamis-add">
                                            <input type="text" name="asisten_lab[]" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                              <button class="btn btn-outline-secondary addAsistenbutton" type="button"><i data-feather="plus" class="feather-icon"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title periode">Periode</h4>
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
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" id="editModalForm" action="{{route('Lab.store')}}">
                <div class="modal-content">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Edit Laboratorium</h5>
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
                                    
                                    <h4 class="card-title">Deskripsi</h4>
                                    <div class="form-group">
                                        <input name="deskripsi" id="inp-deskripsi" type="text" class="form-control">
                                    </div>
                                    
                                    <h4 class="card-title">Kegiatan</h4>
                                    <div class="form-group">
                                        <input name="kegiatan" id="inp-kegiatan" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Kepala Lab</h4>
                                    <div class="form-group">
                                        <input name="kepala_lab" id="inp-kepala_lab" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Asisten Lab</h4>
                                    <div id="input-dynamis-edit">
                                        <div class="input-group mb-3 input-dynamis-add">
                                            <input type="text" id="inp-asisten_lab" name="asisten_lab[]" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary addAsistenbutton" type="button"><i data-feather="plus" class="feather-icon"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title">Periode</h4>
                                    <div class="form-group">
                                        <select class="custom-select mr-sm-2" name="id_periode" id="inp-periode">
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
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="container-fluid">

        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Lab</h4>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered no-wrap">
                                    <thead class="thead-primary text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Kegiatan</th>
                                            <th>Kepala Lab</th>
                                            <th>Asisten Lab</th>
                                            <th>Periode</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Lab as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{substr($item->deskripsi, 0, 50)}}...</td>
                                            <td>{{$item->kegiatan}}</td>
                                            <td>{{$item->kepala_lab}}</td>
                                            <td>{{$item->asisten_lab}}</td>
                                            <td>{{$item->periode->tahun}}</td>
                                            <td style="text-align: center;">
                                            {{-- <a href="{{route('Lab.edit',$item->id)}}" style="border-radius: 15px;" class="btn waves-effect waves-light btn-warning">
                                                <i class="fas fa-edit"> EDIT</i>
                                            </a> --}}
                                            <button type="button"
                                            data-toggle="modal"
                                            style="border-radius: 15px"
                                            class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editLabButton"
                                            data-target="#modalEdit"
                                            value="{{$item->id}}">
                                            <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form  class="btn p-0" method="post" action="{{route('Lab.destroy',$item->id)}}">
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

            $(document).on("click", ".addAsistenbutton", function()
            {
                var elementToReplicate = $('.input-dynamis-add').first(),
                clonedElement = elementToReplicate.clone();
                clonedElement.find('input').val("");
                clonedElement.find('button').removeClass('addAsistenbutton');
                clonedElement.find('button').addClass('removeAsistenbutton');
                clonedElement.find('button').empty();
                clonedElement.find('button').html(`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x feather-icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`);
                $("#input-dynamis").append(clonedElement); 
            });

            $(document).on("click", ".removeAsistenbutton", function()
            {
                $(this).parent().parent().remove();
            });

            $(document).on("click", ".editLabButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "Lab/"+id+"/edit",
                }).done(function(response)
                {

                    $("#input-dynamis-edit").empty();
                    var elementeditToReplicate = $('.input-dynamis-add').first(),
                    clonededitElement = elementeditToReplicate.clone();
                    

                    const arrayasisten = response.asisten_lab.split(";")
                    clonededitElement.find('input').val(arrayasisten.shift());
                    $("#input-dynamis-edit").append(clonededitElement); 
                    $.each(arrayasisten, function (i,v) {
                        addAsistenLab(v);
                    });
                    $("#inp-nama").val(response.nama);
                    $("#inp-deskripsi").val(response.deskripsi);
                    $("#inp-kegiatan").val(response.kegiatan);
                    $("#inp-kepala_lab").val(response.kepala_lab);
                    $("#inp-id_periode").val(response.id_periode);
                    $("#editModalForm").attr("action", "{{url('')}}/admin/Lab/" + id)
                });
            });
            
            function addAsistenLab(value = "") {
                var elementToReplicate = $('.input-dynamis-add').first(),
                clonedElement = elementToReplicate.clone();
                clonedElement.find('input').val(value);
                clonedElement.find('button').removeClass('addAsistenbutton');
                clonedElement.find('button').addClass('removeAsistenbutton');
                clonedElement.find('button').empty();
                clonedElement.find('button').html(`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x feather-icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`);

                $("#input-dynamis-edit").append(clonedElement); 
            }
        </script>
    @endpush

</x-app-layout>