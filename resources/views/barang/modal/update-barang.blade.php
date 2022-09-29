@foreach ($barang as $p)
    <div class="modal fade" tabindex="-1" role="dialog" id="updateData{{ $p->id }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="createRecord" action="{{ url('barang/' . $p->id . '/update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Update Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label for="name" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="name" name="kode_barang"
                                value="{{ $b->kode_barang }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="name" name="nama_barang"
                                value="{{ $b->nama_barang }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Tahun Perolehan</label>
                            <input type="number" min="1900" max="2100" class="form-control" id="name"
                                name="tahun_perolehan" value="{{ $p->tahun_perolehan }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">NUP</label>
                            <input type="text" class="form-control" id="name" name="nup"
                                value="{{ $p->nup }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Kategori</label>
                            <select name="category_id" id="" class="select2">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Merk/Type</label>
                            <input type="text" class="form-control" id="name" name="merk"
                                value="{{ $p->merk }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Kuantitas</label>
                            <input type="number" min="1" class="form-control" id="name" name="kuantitas"
                                id="kuantitas" value="{{ $p->kuantitas }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Harga Satuan Barang</label>
                            <input type="number" min="0" class="form-control" id="name" id="satuan"
                                name="harga_satuan_barang" value="{{ $p->harga_satuan_barang }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Harga</label>
                            <input type="number" min="0" class="form-control" id="harga" name="harga"
                                id="harga" value="{{ $p->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Kondisi</label>
                            <select name="condition_id" id="" class="select2">
                                @foreach ($conditions as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Penggunaan</label>
                            <select name="penggunaan" id="" class="select2">
                                <option value="Sendiri">Sendiri</option>
                                <option value="Pihak Ketiga">Pihak Ketiga</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Ruangan</label>
                            <select name="room_id" id="" class="select2">
                                @foreach ($rooms as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar Dokumentasi</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset($p->dokumentasi) }}" alt="" width="300" height="200">
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
