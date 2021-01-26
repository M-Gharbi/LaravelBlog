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

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
