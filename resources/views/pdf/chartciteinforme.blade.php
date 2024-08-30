<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    /* Ajusta el tamaño del canvas para que el gráfico sea más pequeño */
    #myPieChart {
        max-width: 600px; /* Ajusta el ancho máximo según tus necesidades */
        margin: auto; /* Centra el gráfico horizontalmente */
    }
    /* Estilo opcional para la lista de leyendas */
    .chart-legend {
        display: flex;
        flex-direction: column;
        align-items: center; /* Centra las leyendas horizontalmente */
    }
    .chart-legend ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .chart-legend li {
        margin: 5px 0; /* Ajusta el espaciado entre los ítems de la lista */
    }

    .image-border {
            border: 1px solid black; /* Grosor de 5px, estilo sólido, color negro */
        }
</style>
<body>
    <div style="width: 800px;" class="image-border">
        <canvas id="myChart"></canvas>
    </div>

    <form id="chartForm" method="POST" action="{{ route('generate.pdf') }}">
        @csrf
        <input type="hidden" id="chartImage" name="chartImage">
    </form>

    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/chart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        function generateAndSubmitChart() {
            $.ajax({
                url: "{{ route('datacontactos') }}", // Ruta que devuelve los datos
                method: 'GET',
                success: function(response) {

                    var ctx = document.getElementById('myChart').getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'pie', // Tipo de gráfico: pie
                        data: {
                            labels: response.estados,
                            datasets: [{
                                label: 'Cant.:',
                                data: response.cantidades,
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
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom', // Cambia la posición de las leyendas
                                    labels: {
                                        font: {
                                            size: 25 // Ajusta el tamaño de la fuente de las leyendas
                                        }
                                    }
                                },
                                tooltip: {
                                    enabled: false // Deshabilita los tooltips
                                },
                                datalabels: {
                                    color: '#4f506e',
                                    display: true,
                                    formatter: function(value) {
                                        return value; // Ajusta el formato de los valores
                                    },
                                    font: {
                                        size: 30 // Tamaño de la fuente en píxeles
                                    },
                                    anchor: 'center',
                                    align: 'center'
                                }
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 10,
                                    top: 10,
                                    bottom: 10
                                }
                            },
                            elements: {
                                arc: {
                                    borderWidth: 2, // Ajusta el ancho del borde de las secciones
                                    borderColor: '#fff' // Ajusta el color del borde
                                }
                            }
                        },
                        plugins: [ChartDataLabels] // Incluye el plugin de datos
                    });

                    // Espera a que el gráfico se haya renderizado completamente
                    myChart.options.animation.onComplete = function() {
                        // Convierte el gráfico a una imagen en base64
                        var chartImage = document.getElementById('myChart').toDataURL('image/png');
                        document.getElementById('chartImage').value = chartImage;

                        // Envía el formulario automáticamente
                        document.getElementById('chartForm').submit();
                    };
                },
                error: function(error) {
                    console.error('Error al obtener los datos:', error);
                }

            });


        }

        // Ejecuta la función al cargar la página
        window.onload = generateAndSubmitChart;
    </script>

</body>

</html>
