<x-layout>
    <div class="container-fluid py-4">
        <div class="row">

            <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Daftar Barang</h6>
                        </div>

                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('barang.create') }}"><i
                                    class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Barang</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Kode</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Stok</th>
                            <th>Action</th>

                            @foreach ($barang as $item)
                        </tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->harga_barang }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->kadarluarsa_barang }}</td>
                        <td>{{ $item->stok_barang }}</td>
                        <td class="align-middle">
                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                           
                          </td>
                        @endforeach
                    </table>
                </div>
            </div>






        </div>
    </div>
</x-layout>
