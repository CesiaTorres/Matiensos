{{-- Titulo en el navegador, si no se especifica aparece 'Matiensos' --}}
<title> @yield('titulo', 'Matiensos') </title>
{{-- Traductor de símbolos para la ñ --}}
<meta charset="UTF-8"> 
{{-- Detector de celulares --}}
<meta name="viewport" content="width=device-width, initial-scale=1"> 
{{-- El motor de diseño (Bootstrap) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


{{-- tipografia --}}
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
{{-- Hoja de estilos --}}
<link rel="stylesheet" href="{{ asset('css/estilos-pages.css') }}">

{{--favicon --}}
<link rel="icon" type="image/png" href="{{ asset('favicon-icono-mate.png') }}">

