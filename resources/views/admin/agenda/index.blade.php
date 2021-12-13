<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-auth-validation-errors/>
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" action="{{route('agenda.store')}}">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Tambah Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    </div>

                                    <h4 class="card-title">Tempat</h4>
                                    <div class="form-group">
                                        <input name="tempat" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Jam mulai</h4>
                                    <div class="form-group">
                                        <input name="jam_mulai" type="time" class="form-control">
                                    </div>

                                    <h4 class="card-title">Jam selesai</h4>
                                    <div class="form-group">
                                        <input name="jam_selesai" type="time" class="form-control">
                                    </div>

                                    <h4 class="card-title">Tanggal</h4>
                                    <div class="form-group">
                                        <input name="tanggal" type="date" class="form-control">
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

    <div class="modal fade bd-example-modal-lg" id="scrollable-modal-edit" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" id="editModalForm" action="">
                <div class="modal-content">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Ubah Data agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h4 class="card-title">Judul</h4>
                                        <div class="form-group">
                                            <input name="judul" id="inp-judul" type="text" class="form-control">
                                            <x-validate-error-message name="judul"/>
                                        </div>

                                        <h4 class="card-title">tempat</h4>
                                        <div class="form-group">
                                            <input name="tempat" id="inp-tempat" type="text" class="form-control">
                                            <x-validate-error-message name="tempat"/>
                                        </div>

                                        <h4 class="card-title">Jam mulai</h4>
                                        <div class="form-group">
                                            <input name="jam_mulai" id="inp-jam_mulai" type="time" class="form-control">
                                            <x-validate-error-message name="jam_mulai"/>
                                        </div>

                                        <h4 class="card-title">Jam selesai</h4>
                                        <div class="form-group">
                                            <input name="jam_selesai" id="inp-jam_selesai" type="time" class="form-control">
                                            <x-validate-error-message name="jam_selesai"/>
                                        </div>

                                        <h4 class="card-title">Tanggal</h4>
                                        <div class="form-group">
                                            <input name="tanggal" id="inp-tanggal" type="date" class="form-control">
                                            <x-validate-error-message name="tanggal"/>
                                        </div>
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
    </div><!-- /.mo-->

    <div class="container-fluid">

        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#scrollable-modal">Tambah Data</button>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data agenda</h4>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered no-wrap">
                                    <thead class="thead-primary text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Tempat</th>
                                            <th>Jam_mulai</th>
                                            <th>Jam_selesai</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agenda as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration}}</td>
                                            <td>{{$item->judul}}</td>
                                            <td>{{$item->tempat}}</td>
                                            <td>{{$item->jam_mulai}}</td>
                                            <td>{{$item->jam_selesai}}</td>
                                            <td>{{$item->tanggal->isoFormat("D MMMM Y")}}</td>
                                            <td style="text-align: center;">
                                            {{-- <a href="{{route('agenda.edit',$item->id)}}" style="border-radius: 15px;" class="btn waves-effect waves-light btn-warning">
                                                <i class="fas fa-edit"> EDIT</i>
                                            </a> --}}
                                                <button type="button"
                                                    data-toggle="modal"
                                                    style="border-radius: 15px"
                                                    class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editagendaButton"
                                                    data-target="#scrollable-modal-edit"
                                                    value="{{$item->id}}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <form  class="btn p-0" method="post" action="{{route('agenda.destroy',$item->id)}}">
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
            $(document).on("click", ".editagendaButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "agenda/"+id+"/edit",
                }).done(function(response)
                {
                    $("#inp-judul").val(response.judul);
                    $("#inp-tempat").val(response.tempat);
                    $("#inp-jam_mulai").val(response.jam_mulai.substring(0,5));
                    $("#inp-jam_selesai").val(response.jam_selesai.substring(0,5));
                    $("#inp-tanggal").val(response.tanggal.substring(0,10));
                    $("#editModalForm").attr("action", "{{url('')}}/admin/agenda/" + id)
                });
            });
        </script>
    @endpush

</x-app-layout>