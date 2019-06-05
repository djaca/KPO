<!DOCTYPE html>
<html>
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="text-sm w-full mx-auto">
  @include('includes.pages')
</div>
</body>
</html>
