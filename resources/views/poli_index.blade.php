<div>
    @extends('layouts.app_modern', ['title' => 'Data Pasien'])
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">Form Pasien</div> --}}
                        <div class="card-body">
                            <h3>Data pasien Poli</h3>
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6">
                                    <a href="/poli/create" class="btn btn-primary btn-sm">Tambah Pasien Poli</a>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($poli as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $item->nama }}
                                            </td>
                                            <td>{{ $item->biaya }}</td>
                                            <td style="min-width: 200px">
                                                <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>&nbsp
                                                <form action="/poli/{{  $item->id }}" method="post" class="d-inline">
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
                            {!! $poli->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
