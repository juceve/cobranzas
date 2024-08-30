<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GRAFICO ID-{{ $citeinforme->id }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bs3/bootstrap.min.css') }}">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            opacity: 0.1;
            /* Ajusta la transparencia de la marca de agua */
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #666;
        }


        .container {
            width: 80%;
            /* Ajusta el ancho del contenedor */
            margin: 0 auto;
            /* Centra el contenedor horizontalmente */
            /* padding: 5px; */
        }

        table {
            margin: 0 auto;
            /* Centra la tabla horizontalmente dentro del contenedor */
            border-collapse: collapse;
            /* Opcional: para eliminar los espacios entre bordes */
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        .row::after {
            content: "";
            display: table;
            clear: both;
            /* Limpia los floats */
        }

        .column {
            font-size: 12px;
            float: left;
            width: 50%;
            /* Dos columnas iguales */
            padding: 10px;
            box-sizing: border-box;
        }
    </style>

</head>

<body>
    @php
        $colores = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
        ];
    @endphp
    <div class="watermark">
        <img src="{{ public_path('images/tools/blackbirdservicios.png') }}" alt="Logo" width="550px">
    </div>
    <div class="contenido">
        <div style="text-align: right; margin-right: 3rem;">
            <img src="{{ public_path('images/tools/blackbirdservicios.png') }}" alt="Logo" width="80px">
        </div>

        <div class="container" style="text-align: center;">

            <h3>DATOS DEL RESULTADO GENERAL DE AVANCE</h3>
            <img src="{{ $chartImage }}" alt="Gráfico" style="width:50%; background-color:#ffffffab;  ">
        </div>
        <br>
        <div class="container" style="text-align: center;">
            <table style="width: 60%; font-size: 10px;">
                <tr style="background-color: #97b0cbd6">
                    <td colspan="2">
                        <strong>CUADRO DE RESUMEN</strong>
                    </td>
                </tr>
                <tr style="background-color: #97b0cbd6">
                    <td>
                        <strong>RESULTADO</strong>
                    </td>
                    <td>
                        <strong>CANTIDAD</strong>
                    </td>
                </tr>
                @php
                    $total = 0;
                    $i = 0;
                @endphp
                @foreach ($contactos as $item)
                    <tr style="background-color: {{ $colores[$i] }}">
                        <td style="text-align: left">{{ $item->estado }}</td>
                        <td>{{ $item->cantidad }}</td>
                    </tr>
                    @php
                        $total += $item->cantidad;
                        $i++;
                    @endphp
                @endforeach
                <tr style="background-color: #97b0cbd6">
                    <td>
                        <strong>TOTAL</strong>
                    </td>
                    <td>
                        <strong>{{ $total }}</strong>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <p style="margin-left: 3rem;margin-right: 3rem; margin-top: 0.5rem;text-align: justify;">
            Sin otro particular, me despido cordialmente. <br> <br>
            Atentamente,
        </p> <br> <br>
        <div class="row">
            <div class="column" style="text-align: center">
                Ing. Juan Abimael Borda Morales <br>
                <strong>
                    JEFE DE OPERACIONES <br>
                    SERVICIOS INTEGRALES BLACK BIRD S.R.L.
                </strong>

            </div>
            <div class="column" style="text-align: center">
                Lic. Davis Boris Vargas Campero <br>
                <strong>
                    GERENTE ADMINISTRATIVO <br>
                    SERVICIOS INTEGRALES BLACK BIRD S.R.L.
                </strong>

            </div>
        </div>

        <div class="footer">
            Av. Santos Dumont, 3er. Anillo Externo, Barrio La Morita Calle Gumercindo Coronado No. 3045 Dpto. “C” <br>
            <span style="color: #383bf3;"><u>blackbirdseguridad@gmail.com</u></span> – Telf. Cel. 3331550 – 78458561
        </div>
    </div>
    {{-- @endif --}}

    <script src="{{ asset('vendor/bs3/bootstrap.min.js') }}"></script>

</body>

</html>
