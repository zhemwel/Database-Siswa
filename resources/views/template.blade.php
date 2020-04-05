<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SiswakuApp</title>

    {{-- Memanggil Bootstrap. Komentar ini tidak akan tampak di browser. --}}
    <link href="{{ asset('bootstrap-3.3.6-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.min.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      @include('navbar')
      @yield('main')
    </div>

    @yield('footer')

    <script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap-3.3.6-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/siswakuapp.js') }}"></script>
  </body>
</html>