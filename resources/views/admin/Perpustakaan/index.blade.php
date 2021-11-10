<x-app-layout>
    @push('css')
    <style>
        .invalid-feedback{
            display: block;
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
            <form class="w-100" action="{{route('Perpustakaan.store')}}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                    @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Judul</h4>
                                    <div class="form-group">
                                        <input name="judul" type="text" class="form-control">
                                    </div>
                                    <x-validate-error-message name="judul"/>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title">Penulis</h4>
                                            <div class="form-group">
                                                <input name="penulis" type="text" class="form-control">
                                            </div>
                                            <x-validate-error-message name="penulis"/>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="card-title">Penerbit</h4>
                                            <div class="form-group">
                                                <input name="penerbit" type="text" class="form-control">
                                            </div>
                                            <x-validate-error-message name="penerbit"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title">Kategori</h4>
                                            <div class="form-group">
                                                <input name="kategori" type="text" class="form-control" list="listkategori">
                                                <datalist id="listkategori">    
                                                    @foreach ($kategori as $item)
                                                    <option value="{{$item->kategori}}"></option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                            <x-validate-error-message name="kategori"/>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="card-title">Upload File</h4>
                                            <div class="form-group">
                                                <div class="input-group ">
                                                    <div class="custom-file">
                                                      <input name="file" type="file" class="custom-file-input">
                                                      <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                                <x-validate-error-message name="file"/>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title">Cover</h4>
                                    <label class="block form-group cursor-pointer w-100">
                                        <div class="w-100">
                                            <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="preview">
                                        </div>
                                        <div class="input-group ">
                                            <div class="custom-file">
                                            <input name="cover" type="file" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                            <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <x-validate-error-message name="cover"/>
                                    </label>
                                    
                                    <h4 class="card-title">Ringkasan</h4>
                                    <div class="form-group">
                                        <textarea name="ringkasan" rows="3" class="form-control"></textarea>
                                        <x-validate-error-message name="ringkasan"/>
                                    </div>
                                    
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="scrollable-modal-edit" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <form class="w-100" method="post" id="editModalForm" action="">
            <div class="modal-content">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableModalTitle">Ubah Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="card-title">Judul</h4>
                                        <div class="form-group">
                                            <input name="judul" id="inp-judul" type="text" class="form-control">
                                        </div>
                                        <x-validate-error-message name="judul"/>
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="card-title">Penulis</h4>
                                                <div class="form-group">
                                                    <input name="penulis" id="inp-penulis" type="text" class="form-control">
                                                </div>
                                                <x-validate-error-message name="penulis"/>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="card-title">Penerbit</h4>
                                                <div class="form-group">
                                                    <input name="penerbit" id="inp-penerbit" type="text" class="form-control">
                                                </div>
                                                <x-validate-error-message name="penerbit"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="card-title">Kategori</h4>
                                                <div class="form-group">
                                                    <input name="kategori" id="inp-kategori" type="text" class="form-control" list="listkategori">
                                                    <datalist id="listkategori">
                                                        @foreach ($kategori as $item)
                                                        <option value="{{$item->kategori}}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <x-validate-error-message name="kategori"/>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="card-title">Upload File</h4>
                                                <div class="form-group">
                                                    <div class="input-group ">
                                                        <div class="custom-file">
                                                          <input name="file" id="inp-file" type="file" class="custom-file-input">
                                                          <label class="custom-file-label">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                          <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                    <x-validate-error-message name="file"/>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Cover</h4>
                                        <label class="block form-group cursor-pointer w-100">
                                            <div class="w-100">
                                              <img class="object-contain" height="100" src="{{asset('assets/img/upload-image.png')}}" id="preview">
                                            </div>
                                            <div class="input-group ">
                                                <div class="custom-file">
                                                  <input name="cover" id="inp-cover" type="file" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" id="image">
                                                  <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                  <span class="input-group-text"></span>
                                                </div>
                                            </div>
                                            <x-validate-error-message name="cover"/>
                                        </label>
                                        
                                        <h4 class="card-title">Ringkasan</h4>
                                        <div class="form-group">
                                            <textarea name="ringkasan" id="inp-ringkasan" rows="3" class="form-control"></textarea>
                                            <x-validate-error-message name="ringkasan"/>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid">

        <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#scrollable-modal">Tambah Data</button>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Perpustakaan</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-sm-td table-hover table-striped table-bordered no-wrap">
                                <thead class="thead-primary text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Nomer HP</th>
                                        <th>Ringkasan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Perpustakaan as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration}}</td>
                                        <td>{{$item->judul}}</td>
                                        <td>{{$item->kategori}}</td>
                                        <td>{{$item->penulis}}</td>
                                        <td>{{$item->no_panggil}}</td>
                                        <td>{{$item->ringkasan}}</td>
                                        <td style="text-align: center;">
                                            <button type="button"
                                            data-toggle="modal"
                                            style="border-radius: 15px"
                                            class="btn waves-effect waves-light btn-outline-primary pt-1 pb-1 editPerpustakaanButton"
                                            data-target="#scrollable-modal-edit"
                                            value="{{$item->id}}">
                                            <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form class="btn p-0" method="post" action="{{route('Perpustakaan.destroy',$item->id)}}">
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

        $(document).on("click", ".editPerpustakaanButton", function()
        {
            let id = $(this).val();
            $.ajax({
                method: "get",
                url :  "Perpustakaan/"+id+"/edit",
            }).done(function(response)
            {
                $("#inp-kategori").val(response.kategori);
                $("#inp-judul").val(response.judul);
                $("#inp-penulis").val(response.penulis);
                $("#inp-penerbit").val(response.penerbit);
                $("#inp-no_panggil").val(response.no_panggil);
                $("#inp-ringkasan").val(response.ringkasan);
                $("#inp-cover").val(response.cover);
                $("#inp-file").val(response.file);
                $("#editModalForm").attr("action", "/Perpustakaan/" + id)
            });
        });
    </script>
    @endpush
</x-app-layout>