@extends("layouts.app")

@section("head")
    <!-- Leaflet-->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="anonymous"
    />

    <!-- Marker Cluster -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css"
        crossorigin="anonymous"
    />
@endsection

@section("content")
    <div id="main-content">
        <!-- Flash Message -->
        @if (session("error"))
            <div class="alert alert-danger">
                {{ session("error") }}
            </div>
        @endif

        <!-- Page Heading -->
        <div class="page-heading">
            <!-- Page Title -->
            <div class="page-title mb-4">
                <div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>

            <!-- Main Content Section -->
            <section class="section row">
                <!-- Left Column -->
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $header }}</h4>
                        </div>
                        <div class="card-body">
                            <!-- Map Container -->
                            <div id="map" class="z-3 rounded-3" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-12 col-md-4">
                    <div class="card">
                        <!-- Accordion -->
                        <div class="card-header">
                            <h4>Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button
                                            class="accordion-button"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne"
                                            aria-expanded="true"
                                            aria-controls="collapseOne"
                                        >
                                            Statistik
                                        </button>
                                    </h2>
                                    <div
                                        id="collapseOne"
                                        class="accordion-collapse show collapse"
                                        aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample"
                                    >
                                        <div class="accordion-body">
                                            <table class="table-borderless table">
                                                <tbody>
                                                    @foreach ($kabupaten as $data)
                                                        <tr>
                                                            <td>Kabupaten</td>
                                                            <td>:</td>
                                                            <td>{{ $data->nama_kabupaten }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luas Wilayah</td>
                                                            <td>:</td>
                                                            <td>
                                                                {{ number_format($data->luas_wilayah, 2, ",", ".") }}
                                                                km
                                                                <sup>2</sup>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah Penduduk</td>
                                                            <td>:</td>
                                                            <td>
                                                                {{ number_format($data->jumlah_penduduk, 0, ",", ".") }}
                                                                Jiwa
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <p class="text-muted mb-0 mt-3">Sumber : BPS 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section("javascript")
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="anonymous"
    ></script>
    <script
        src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        crossorigin="anonymous"
    ></script>
    <script src="{{ asset("extensions/jquery/jquery.min.js") }}"></script>
    <script>
        // Function to invalidate map size
        function invalidateMapSize() {
            setTimeout(function() {
                map.invalidateSize();
            }, 400); // Adjust the timeout as needed
        }

        // Add event listener to the burger button
        document.querySelector('.burger-btn').addEventListener('click', function() {
            invalidateMapSize();
        });

        // Add event listener to the navbar toggler for mobile view
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            invalidateMapSize();
        });

        // Initialize the map
        var map = L.map('map').setView([-7.452056485479403, 109.17060824882819], 10);

        // Add tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            className: 'map-tiles'
        }).addTo(map);

        // Initialize marker cluster group
        var markers = L.markerClusterGroup();

        // Add markers to the cluster group
        @foreach ($kabupaten as $kab)
            @foreach ($kab->sekolah as $data)
                var marker = L.marker([{{ $data->koordinat }}])
                    .bindPopup('<b>{{ $data->nama_sekolah }}</b><br>{{ $data->alamat_sekolah }}');
                markers.addLayer(marker);
            @endforeach
        @endforeach

        // Add marker cluster group to the map
        map.addLayer(markers);

        // Load the JSON file and add it to the map as a polygon
        fetch('{{ asset('json/3302.json') }}')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function(feature) {
                        switch (feature.properties.Name.toUpperCase()) {
                            case 'LUMBIR':
                                return {
                                    fillColor: 'green', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'WANGON':
                                return {
                                    fillColor: 'blue', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'JATILAWANG':
                                return {
                                    fillColor: 'purple', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'RAWALO':
                                return {
                                    fillColor: 'red', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KEBASEN':
                                return {
                                    fillColor: 'orange', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KEMRANJEN':
                                return {
                                    fillColor: 'yellow', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'SUMPIUH':
                                return {
                                    fillColor: 'pink', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'TAMBAK':
                                return {
                                    fillColor: 'cyan', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'SOMAGEDE':
                                return {
                                    fillColor: 'magenta', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KALIBAGOR':
                                return {
                                    fillColor: 'brown', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'BANYUMAS':
                                return {
                                    fillColor: 'lime', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PATIKRAJA':
                                return {
                                    fillColor: 'violet', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PURWOJATI':
                                return {
                                    fillColor: 'olive', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'AJIBARANG':
                                return {
                                    fillColor: 'navy', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'GUMELAR':
                                return {
                                    fillColor: 'limegreen', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PEKUNCEN':
                                return {
                                    fillColor: 'teal', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'CILONGOK':
                                return {
                                    fillColor: 'coral', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KARANGLEWAS':
                                return {
                                    fillColor: 'orchid', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KEDUNGBANTENG':
                                return {
                                    fillColor: 'peru', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'BATURRADEN':
                                return {
                                    fillColor: 'gold', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'SUMBANG':
                                return {
                                    fillColor: 'tomato', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'KEMBARAN':
                                return {
                                    fillColor: 'darkcyan', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'SOKARAJA':
                                return {
                                    fillColor: 'mediumorchid', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PURWOKERTO SELATAN':
                                return {
                                    fillColor: 'salmon', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PURWOKERTO BARAT':
                                return {
                                    fillColor: 'slateblue', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PURWOKERTO TIMUR':
                                return {
                                    fillColor: 'seagreen', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            case 'PURWOKERTO UTARA':
                                return {
                                    fillColor: 'skyblue', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                            default:
                                return {
                                    fillColor: 'gray', color: 'black', weight: 2, fillOpacity: 0.5
                                };
                        }
                    },
                    onEachFeature: function(feature, layer) {
                        layer.bindPopup('<b>' + feature.properties.Name.toUpperCase());
                    }
                }).addTo(map);
            });
    </script>
@endsection
