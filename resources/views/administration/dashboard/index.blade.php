@extends('layouts.main')
@section('title', 'Éxito')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Panel de control</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Número total de usuarios</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Número total de compras</h5>
                        <p class="card-text">{{ $totalPurchases }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ventas totales</h5>
                        <p class="card-text">${{ $totalSales }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <canvas id="productCountsChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="productSalesChart"></canvas>
            </div>
        </div>
    </div>


    <!-- Incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('productCountsChart').getContext('2d');
        var productCountsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($productCounts->keys()) !!},
                datasets: [{
                    label: 'Cantidad vendida',
                    data: {!! json_encode($productCounts->values()) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'white'
                        }
                    }
                }
            }
        });

        var ctx = document.getElementById('productSalesChart').getContext('2d');
        var productSalesChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($productSales->keys()) !!},
                datasets: [{
                    label: 'Porcentaje de ingresos',
                    data: {!! json_encode($productSales->values()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    </script>
@endsection
