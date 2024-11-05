<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<div class="card card-navy card-outline">
    <div class="card-body">
        <div id="app">
            <!-- Grid Container -->
            <div class="row">
                <!-- Preview Video -->
                <div class="col-12 col-md-8 d-flex flex-column align-items-center">
                    <h2 class="text-center font-weight-bold">Preview</h2>
                    <div class="preview-container w-100">
                        <video id="preview" class="w-100 border border-primary rounded"></video>
                    </div>
                </div>

                <!-- Camera Selection and Scan Results -->
                <div class="col-12 col-md-4 mt-4 mt-md-0">
                    <!-- Camera Selection -->
                    <div class="mb-4">
                        <span class="p font-weight-bold">Pilih Kamera di Bawah ini</span>
                        <ul class="list-group">
                            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                            <li v-for="camera in cameras" :key="camera.id" class="list-group-item">
                                <button
                                    v-if="camera.id == activeCameraId"
                                    :title="formatName(camera.name)"
                                    class="btn btn-primary active w-100"
                                    disabled>
                                    {{ formatName(camera.name) }}
                                </button>
                                <button
                                    v-else
                                    :title="formatName(camera.name)"
                                    class="btn btn-secondary w-100"
                                    @click.stop="selectCamera(camera)">
                                    {{ formatName(camera.name) }}
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Scan Results -->
                    <div>
                        <span class="p font-weight-bold">Data hasil Scanning QR</span>
                        <div v-if="peserta">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID Peserta</th>
                                        <td>{{ peserta.id_peserta }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ peserta.nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Depan</th>
                                        <td>{{ peserta.nama_depan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Belakang</th>
                                        <td>{{ peserta.nama_belakang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{ peserta.kelas }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kontak</th>
                                        <td>{{ peserta.contact }}</td>
                                    </tr>
                                    <tr>
                                        <th>Plotting</th>
                                        <td>{{ peserta.plotting }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Peserta</th>
                                        <td>{{ peserta.status_peserta }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Presensi</th>
                                        <td>{{ peserta.status_presensi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Input</th>
                                        <td>{{ peserta.tgl_input }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success" @click="checkIn()">Check In</button>
                            <button class="btn btn-danger" @click="reset()">Reset</button>
                        </div>
                        <ul v-else class="list-group">
                            <li class="list-group-item empty">No data found</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            scanner: null,
            activeCameraId: null,
            cameras: [],
            peserta: null // Data peserta yang ditampilkan setelah scan
        },
        mounted: function() {
            var self = this;
            self.scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                scanPeriod: 5
            });
            self.scanner.addListener('scan', function(content) {
                self.fetchPesertaData(content); // Ambil data peserta berdasarkan hasil scan
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                self.cameras = cameras;
                if (cameras.length > 0) {
                    self.activeCameraId = cameras[0].id;
                    self.scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        },
        methods: {
            formatName: function(name) {
                return name || '(unknown)';
            },
            selectCamera: function(camera) {
                this.activeCameraId = camera.id;
                this.scanner.start(camera);
            },
            fetchPesertaData: function(barcode) {
                var self = this;
                // Ambil data peserta berdasarkan barcode via AJAX
                fetch(`<?= base_url('admin/get_peserta_by_barcode') ?>/${barcode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            self.peserta = data; // Set data peserta jika ditemukan
                        } else {
                            alert('Peserta tidak ditemukan');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            },
            checkIn: function() {
                if (this.peserta) {
                    // Mengubah status presensi menjadi SUCCESS
                    this.peserta.status_presensi = 'SUCCESS';
                }
            },
            reset: function() {
                // Reset data peserta untuk scan berikutnya
                this.peserta = null;
            }
        }
    });
</script>