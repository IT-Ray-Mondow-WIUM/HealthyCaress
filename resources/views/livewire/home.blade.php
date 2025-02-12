<div>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container mt-2">
        <!-- Grafik Utama -->
        <div class="card p-3 mb-4">
            <canvas id="mainChart" height="375"></canvas>
        </div>

        <!-- 4 Kotak Informasi -->
        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary text-center p-3">
                    <h5>Total Pasien</h5>
                    <h3>{{ $pasien }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-success text-center p-3">
                    <h5>Total Dokter</h5>
                    <h3>{{ $dokter }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-warning text-center p-3">
                    <h5>Total Poliklinik</h5>
                    <h3>{{ $poliklinik }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-danger text-center p-3">
                    <h5>Total Ruangan Rawat Inap</h5>
                    <h3>{{ $ruang }}</h3>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Script Chart.js -->
    <script>
        var ctx = document.getElementById('mainChart').getContext('2d');
        var mainChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jumlah Pasien Per Bulan',
                    data: [120, 150, 180, 200, 220, 250],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</div>