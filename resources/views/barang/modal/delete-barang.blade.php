@foreach ($barang as $b)
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteData{{ $b->id }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk menghapus barang yang bernama "{{ $b->name }}"...?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="{{ url('barang/' . $b->id . '/delete') }}">Delete Barang</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
