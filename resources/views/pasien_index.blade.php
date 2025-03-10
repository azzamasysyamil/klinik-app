<div>
    @extends('layouts.app_modern', ['title' => 'Data Pasien'])
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">Form Pasien</div> --}}
                        <div class="card-body">
                            <div class="row mb-3 mt-3">
                            <div class="col-md-3 h3">
                                Data Pasien
                            </div>
                            <div class="col-md-6">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="text" name="p" placeholder="Cari Nama, No Pasien atau Poli" value="{{ request('p') }}" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a href="/pasien/create" class="btn btn-primary btn-md float-end">Tambah Data</a>
                            </div>
                        </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pasien</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Foto</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_pasien }}</td>
                                            <td>
                                                {{ $item->nama }}
                                            </td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->umur }}</td>
                                            <?php  $foto=$item->foto ? $item->foto : 'AT1.svg' ?>
                                            <td><img src="../storage/images/{{  $foto }}" alt="foto" width="100px"></td>
                                            <td>{{ $item->alamat }}</td>
                                            <td style="min-width: 200px">
                                                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>&nbsp
                                                <form action="/pasien/{{  $item->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus
                                                    </button>
                                                </form>
                                                                                         

                                                {{-- <button type="button" class="btn btn-warning">Edit</button>
                                                <button type="button" class="btn btn-danger">Remove</button> --}}
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $pasien->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
