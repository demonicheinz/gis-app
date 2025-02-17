@extends("layouts.app")

@section("head")
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous"
    />
@endsection

@section("content")
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("kecamatan.store") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="kode-kecamatan-horizontal">
                                            Kode Kecamatan
                                        </label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="kode-kecamatan-horizontal"
                                            class="form-control"
                                            name="kode_kecamatan"
                                            placeholder="Kode Kecamatan"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nama-kecamatan-horizontal">
                                            Nama Kecamatan
                                        </label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="nama-kecamatan-horizontal"
                                            class="form-control"
                                            name="nama_kecamatan"
                                            placeholder="Nama Kecamatan"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jumlah-penduduk-horizontal">
                                            Jumlah Penduduk
                                        </label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="number"
                                            id="jumlah-penduduk-horizontal"
                                            class="form-control"
                                            name="jumlah_penduduk"
                                            placeholder="Jumlah Penduduk"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="luas-wilayah-horizontal">Luas Wilayah</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="number"
                                            id="luas-wilayah-horizontal"
                                            class="form-control"
                                            name="luas_wilayah"
                                            placeholder="Luas Wilayah"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="id-kabupaten-horizontal">Kabupaten</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select
                                            id="id-kabupaten-horizontal"
                                            class="form-control"
                                            name="id_kabupaten"
                                            required
                                        >
                                            <option value="">Pilih Kabupaten</option>
                                            @foreach ($kabupaten as $kab)
                                                <option value="{{ $kab->id_kabupaten }}">
                                                    {{ $kab->nama_kabupaten }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary mb-1 me-1">
                                            Submit
                                        </button>
                                        <a
                                            href="{{ route("kecamatan.index") }}"
                                            class="btn btn-secondary mb-1 me-1"
                                        >
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                sessionStorage.setItem("success", "{{ session('success') }}");
            @endif
            @if (session('error'))
                sessionStorage.setItem("error", "{{ session('error') }}");
            @endif
        });
    </script>
@endsection
