<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('hmtp.store')}}">
                    @csrf
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
                                    <input name="deskripsi" type="text" class="form-control">
                                </div>

                                <h4 class="card-title">Visi</h4>
                                <div class="form-group">
                                    <input name="visi" type="text" class="form-control">
                                </div>

                                <h4 class="card-title">Misi</h4>
                                <div class="form-group">
                                    <input name="misi" type="text" class="form-control">
                                </div>

                                <h4 class="card-title">Struktur Organisasi</h4>
                                <div class="form-group">
                                    <input name="struktur_organisasi" type="text" class="form-control">
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

    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#scrollable-modal">Scrollable modal</button>


</x-app-layout>