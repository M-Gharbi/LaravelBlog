@include('_head')

<body>

  <header>
      @include('_nav')
  </header>

  <div class="container">
      @yield('contant')
  </div>

  <footer>
      @include('_footer')
  </footer>

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script src="{{ asset('js/popper.min.js') }}"></script>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  
  <script src="{{ asset('js/app.js') }}"></script>

  <script src="{{ asset('js/filter.js') }}"></script>


</body>
</html>
