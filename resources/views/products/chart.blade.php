<div class="bg-white p-6 rounded shadow" style="height: 400px;">
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('{{ route('products.chartData') }}')
            .then(response => response.json())
            .then(data => {
                // Ubah format tanggal
                const labels = data.map(item => {
                    const date = new Date(item.sold_at);
                    return date.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                    // Kalau mau gaya "24 Apr 2025" ubah month ke 'short'
                });

                const prices = data.map(item => item.price);

                new Chart(document.getElementById('myChart'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Harga Produk',
                            data: prices,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: 'rgb(75, 192, 192)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(75, 192, 192)'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: '#333',
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal Terjual',
                                    color: '#666',
                                    font: {
                                        size: 14
                                    }
                                },
                                ticks: {
                                    color: '#666'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Harga (Rp)',
                                    color: '#666',
                                    font: {
                                        size: 14
                                    }
                                },
                                ticks: {
                                    color: '#666'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error(error));
    </script>
@endpush
