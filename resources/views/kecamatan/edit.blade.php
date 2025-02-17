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
                        <h4>Edit Data {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route("kecamatan.update", $kecamatan->kode_kecamatan) }}"
                            method="POST"
                        >
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="kode_kecamatan">Kode Kecamatan</label>
                                <input
                                    type="text"
                                    id="kode_kecamatan"
                                    class="form-control"
                                    name="kode_kecamatan"
                                    value="{{ $kecamatan->kode_kecamatan }}"
                                    required
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input
                                    type="text"
                                    id="nama_kecamatan"
                                    class="form-control"
                                    name="nama_kecamatan"
                                    value="{{ $kecamatan->nama_kecamatan }}"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                                <input
                                    type="number"
                                    id="jumlah_penduduk"
                                    class="form-control"
                                    name="jumlah_penduduk"
                                    value="{{ $kecamatan->jumlah_penduduk }}"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="luas_wilayah">Luas Wilayah</label>
                                <input
                                    type="text"
                                    id="luas_wilayah"
                                    class="form-control"
                                    name="luas_wilayah"
                                    value="{{ $kecamatan->luas_wilayah }}"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="id_kabupaten">Kabupaten</label>
                                <select
                                    id="id_kabupaten"
                                    class="form-control"
                                    name="id_kabupaten"
                                    required
                                >
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach ($kabupaten as $kab)
                                        <option
                                            value="{{ $kab->id_kabupaten }}"
                                            {{ $kab->id_kabupaten == $kecamatan->id_kabupaten ? "selected" : "" }}
                                        >
                                            {{ $kab->nama_kabupaten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary mb-1 me-1">
                                    Update
                                </button>
                                <a
                                    href="{{ route("kecamatan.index") }}"
                                    class="btn btn-secondary mb-1 me-1"
                                >
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
