<x-layout>
    <div class="container-fluid py-4">

        {{-- <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendapatan Hari Ini</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        Rp.{{ number_format($totalhariini->total, 0, ',', '.') }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pendapatan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        Rp.{{ number_format($totalpendapatan->total, 0, ',', '.') }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}
        <div class="row mt-4">

            <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Daftar Laporan Toko</h6>
                        </div>

                        <div class="col-6 text-end">
                            {{-- <a class="btn bg-gradient-dark mb-0" href="{{ route('penjualan.create') }}"><i
                                    class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Penjualan</a> --}}
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Cabang</th>
                            <th>Alamat</th>
                            <th>Manajer</th>
                          

                            @foreach ($daftartoko as $item)
                        </tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{route('laporan.show', $item->id)}}"><p class="font-weight-bold text-primary">{{ $item->nama_cabang }}</p></a></td>
                        <td>{{ $item->alamat_cabang }}</td>
                        <td>{{ $item->name }}</td>
                        <td></td>
                        @endforeach
                    </table>
                </div>
            </div>






        </div>
    </div>
</x-layout>
