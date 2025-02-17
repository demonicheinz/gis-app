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
                        <form action="{{ route("sekolah.update", $sekolah->npsn) }}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="npsn">NPSN</label>
                                <input
                                    type="text"
                                    id="npsn"
                                    class="form-control"
                                    name="npsn"
                                    value="{{ $sekolah->npsn }}"
                                    required
                                    readonly
                                />
                            </div>

                            <div class="form-group">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input
                                    type="text"
                                    id="nama_sekolah"
                                    class="form-control"
                                    name="nama_sekolah"
                                    value="{{ $sekolah->nama_sekolah }}"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="alamat_sekolah">Alamat Sekolah</label>
                                <input
                                    type="text"
                                    id="alamat_sekolah"
                                    class="form-control"
                                    name="alamat_sekolah"
                                    value="{{ $sekolah->alamat_sekolah }}"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option
                                        value="Negeri"
                                        {{ $sekolah->status == "Negeri" ? "selected" : "" }}
                                    >
                                        Negeri
                                    </option>
                                    <option
                                        value="Swasta"
                                        {{ $sekolah->status == "Swasta" ? "selected" : "" }}
                                    >
                                        Swasta
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <select
                                    id="jenjang_pendidikan"
                                    class="form-control"
                                    name="jenjang_pendidikan"
                                    required
                                >
                                    <option
                                        value="SD"
                                        {{ $sekolah->jenjang_pendidikan == "SD" ? "selected" : "" }}
                                    >
                                        SD
                                    </option>
                                    <option
                                        value="SMP"
                                        {{ $sekolah->jenjang_pendidikan == "SMP" ? "selected" : "" }}
                                    >
                                        SMP
                                    </option>
                                    <option
                                        value="SMA"
                                        {{ $sekolah->jenjang_pendidikan == "SMA" ? "selected" : "" }}
                                    >
                                        SMA
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="koordinat">Koordinat (Lat, Lng)</label>
                                <input
                                    type="text"
                                    id="koordinat"
                                    class="form-control"
                                    name="koordinat"
                                    value="{{ $sekolah->koordinat }}"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="kode_kecamatan">Kecamatan</label>
                                <select
                                    id="kode_kecamatan"
                                    class="form-control"
                                    name="kode_kecamatan"
                                    required
                                >
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                        <option
                                            value="{{ $kec->kode_kecamatan }}"
                                            {{ $sekolah->kode_kecamatan == $kec->kode_kecamatan ? "selected" : "" }}
                                        >
                                            {{ $kec->nama_kecamatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary mb-1 me-1">
                                    Update
                                </button>
                                <a
                                    href="{{ route("sekolah.index") }}"
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
