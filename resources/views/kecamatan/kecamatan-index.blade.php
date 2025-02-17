@extends("layouts.app")

@section("head")
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="{{ asset("extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css") }}"
    />
    <link rel="stylesheet" href="{{ asset("css/table-datatable-jquery.css") }}" />
@endsection

@section("content")
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title mb-4">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Data {{ $title }}</h4>
                        <a href="{{ route("kecamatan.create") }}" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table-bordered table-striped table"
                                id="table1"
                                name="table1"
                            >
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Kecamatan</th>
                                        <th class="text-center">Nama Kecamatan</th>
                                        <th class="text-center">Jumlah Penduduk</th>
                                        <th class="text-center">Luas Wilayah</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $key => $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $data->kode_kecamatan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $data->nama_kecamatan }}
                                            </td>
                                            <td class="text-center">
                                                {{ number_format($data->jumlah_penduduk, 0, ",", ".") }}
                                                Jiwa
                                            </td>
                                            <td class="text-center">
                                                {{ number_format($data->luas_wilayah, 2, ",", ".") }}
                                                km
                                                <sup>2</sup>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a
                                                        href="{{ route("kecamatan.edit", $data->kode_kecamatan) }}"
                                                        class="btn btn-outline-primary me-2"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        onclick="confirmDelete('{{ route("kecamatan.destroy", $data->kode_kecamatan) }}')"
                                                        class="btn btn-outline-danger"
                                                        title="Delete"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section("javascript")
    <script src="{{ asset("extensions/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("extensions/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js") }}"></script>
    <script src="{{ asset("js/pages/datatables.js") }}"></script>
    <script src="{{ asset("extensions/sweetalert2/sweetalert2.min.js") }}"></script>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then(result => {
                if (result.isConfirmed) {
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            Accept: 'application/json',
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire(
                                'Terhapus!',
                                'Data kecamatan berhasil dihapus',
                                'success'
                            ).then(() => location.reload());
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        });
                }
            });
        }
    </script>
    @if (session("success"))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        </script>
    @endif

    @if (session("error"))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session("error") }}',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        </script>
    @endif
@endsection
