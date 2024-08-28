<div>
    <div class="card card-outline card-success">
        <div class="card-header text-success">
            CONTROL DEUDAS ENTRANTES
        </div>
        <div class="card-body">
            <div class="container" style="max-height: 350px; width: 100%">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/chartjs/chart.js') }}"></script>
    <script>
        $.ajax({
            url: "{{ route('ctrldeudas') }}", // Ruta que devuelve los datos
            method: 'GET',
            success: function(response) {

                // Configurar el gráfico con los datos recibidos
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line', // Puedes cambiar el tipo de gráfico según tus necesidades
                    data: {
                        labels: response.fechas, // Nombres de las semanas
                        datasets: [{
                            label: 'Nuevos registros',
                            data: response.cantidades, // Cantidades de registros
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1,
                            pointStyle: 'rectRot', // Aquí defines el estilo de los puntos
                            pointRadius: 10, // Tamaño del punto
                            pointBackgroundColor: 'rgb(255, 99, 132)' // Color de fondo del punto
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Fecha Actualización'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Cantidad de Registros'
                            }
                        }
                        }
                    }
                });
            },
            error: function(error) {
                console.error('Error al obtener los datos:', error);
            }
        });
    </script>
</div>
