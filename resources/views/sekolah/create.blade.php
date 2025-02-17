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
                        <form action="{{ route("sekolah.store") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="npsn">NPSN</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="npsn"
                                            class="form-control"
                                            name="npsn"
                                            placeholder="NPSN"
                                            required
                                        />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama_sekolah">Nama Sekolah</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="nama_sekolah"
                                            class="form-control"
                                            name="nama_sekolah"
                                            placeholder="Nama Sekolah"
                                            required
                                        />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="alamat_sekolah">Alamat Sekolah</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="alamat_sekolah"
                                            class="form-control"
                                            name="alamat_sekolah"
                                            placeholder="Alamat Sekolah"
                                            required
                                        />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select
                                            id="status"
                                            class="form-control"
                                            name="status"
                                            required
                                        >
                                            <option value="">Pilih Status</option>
                                            <option value="Negeri">Negeri</option>
                                            <option value="Swasta">Swasta</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select
                                            id="jenjang_pendidikan"
                                            class="form-control"
                                            name="jenjang_pendidikan"
                                            required
                                        >
                                            <option value="">Pilih Jenjang</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="koordinat">Koordinat (Lat, Lng)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input
                                            type="text"
                                            id="koordinat"
                                            class="form-control"
                                            name="koordinat"
                                            placeholder="Contoh: -7.12345, 110.98765"
                                            required
                                        />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="kode_kecamatan">Kecamatan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select
                                            id="kode_kecamatan"
                                            class="form-control"
                                            name="kode_kecamatan"
                                            required
                                        >
                                            <option value="">Pilih Kecamatan</option>
                                            @foreach ($kecamatan as $kec)
                                                <option value="{{ $kec->kode_kecamatan }}">
                                                    {{ $kec->nama_kecamatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary mb-1 me-1">
                                            Submit
                                        </button>
                                        <a
                                            href="{{ route("sekolah.index") }}"
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

@section("javascript")
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
