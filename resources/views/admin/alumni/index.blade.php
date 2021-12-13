<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="modal fade bd-example-modal-lg" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" action="{{route('alumni.store')}}">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Tambah Alumni</h5>
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

                                    <h4 class="card-title">Alamat</h4>
                                    <div class="form-group">
                                        <input name="alamat" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Pekerjaan</h4>
                                    <div class="form-group">
                                        <input name="pekerjaan" type="text" class="form-control">
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
                        <h5 class="modal-title" id="scrollableModalTitle">Ubah Data Alumni</h5>
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

                                    <h4 class="card-title">Alamat</h4>
                                    <div class="form-group">
                                        <input name="alamat" id="inp-alamat" type="text" class="form-control">
                                    </div>

                                    <h4 class="card-title">Pekerjaan</h4>
                                    <div class="form-group">
                                        <input name="pekerjaan" id="inp-pekerjaan" type="text" class="form-control">
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

        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#scrollable-modal">Tambah Data</button>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data alumni</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered no-wrap">
                                <thead class="thead-primary text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pekerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->pekerjaan}}</td>
                                        <td style="text-align: center;">
                                        <button type="button"
                                            data-toggle="modal"
                                            style="border-radius: 15px"
                                            class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editAlumniButton"
                                            data-target="#scrollable-modal-edit"
                                            value="{{$item->id}}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form  class="btn p-0" method="post" action="{{route('alumni.destroy',$item->id)}}">
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

            $(document).on("click", ".editAlumniButton", function()
            {
                let id = $(this).val();
                $.ajax({
                    method: "get",
                    url :  "alumni/"+id+"/edit",
                }).done(function(response)
                {
                    $("#inp-nama").val(response.nama);
                    $("#inp-alamat").val(response.alamat);
                    $("#inp-pekerjaan").val(response.pekerjaan);
                    $("#editModalForm").attr("action", "{{url('')}}/admin/alumni/" + id)
                });
            });
        </script>
    @endpush

</x-app-layout>