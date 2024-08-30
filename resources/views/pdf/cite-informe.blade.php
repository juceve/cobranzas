<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFORME ID-{{$citeinforme->id}}</title>
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
    </style>

</head>

<body>
    <div class="watermark">
        <img src="{{ public_path('images/tools/blackbirdservicios.png') }}" alt="Logo" width="550px">
    </div>
    <div class="contenido">
        <div style="text-align: right; margin-right: 3rem;">
            <img src="{{ public_path('images/tools/blackbirdservicios.png') }}" alt="Logo" width="80px">
            <br> <br>
            <strong>
                Santa Cruz, {{ fechaLiteral($citeinforme->fecha) }}
            </strong>
        </div>

        <p style="margin-left: 3rem">
            Señor: <br>

            {{ $citeinforme->receptor }} <br>
            <strong>
                {{ $citeinforme->cargoreceptor }} <br><br>
            </strong>
            Presente. -
        </p>
        <p style="margin-left: 3rem;margin-right: 3rem; margin-top: 2rem;text-align: justify;">
            <u>
                <strong>REF.: {{ $citeinforme->referencia }}</strong>
            </u>
            <br><br>
            De nuestra consideración: <br><br>
            Me permito elevar a su autoridad el informe sobre el trabajo realizado de la cartera en mora de la
            empresa BBO S.A del {{ convertirFecha($citeinforme->fechainicial) }} al
            {{ convertirFecha($citeinforme->fechafinal) }}. <br> <br>

            Informamos que el avance de fecha {{ convertirFecha($citeinforme->fecha) }} refleja el siguiente
            levantamiento de datos y
            programación de cobros de acuerdo al siguiente detalle:
        </p>

        @foreach ($citeinforme->puntoinformes as $punto)
            <p style="margin-left: 4rem;margin-right: 3rem;text-align: justify; margin-bottom: 1rem">
                &#8226; {{ $punto->detalle }}
            </p>
        @endforeach



        <p style="margin-left: 3rem;margin-right: 3rem; margin-top: 2rem;text-align: justify;">
            Es todo lo que tengo a bien informar para los fines consiguientes.
        </p>

        <div class="footer">
            Av. Santos Dumont, 3er. Anillo Externo, Barrio La Morita Calle Gumercindo Coronado No. 3045 Dpto. “C” <br>
            <span style="color: #383bf3;"><u>blackbirdseguridad@gmail.com</u></span> – Telf. Cel. 3331550 – 78458561
        </div>
    </div>
    {{-- @endif --}}

    <script src="{{ asset('vendor/bs3/bootstrap.min.js') }}"></script>

</body>

</html>
