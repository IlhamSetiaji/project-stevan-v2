@foreach ($conditions as $p)
    <!--Modal Tambah Data-->
    <div class="modal fade" tabindex="-1" role="dialog" id="updateData{{ $p->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Kondisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('/conditions/' . $p->id . '/update') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kondisi</label>
                            <input type="text" style="border-radius: 30px;" class="form-control" name="name"
                                value="{{ $p->name }}" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit"
                            style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                            class="btn text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
