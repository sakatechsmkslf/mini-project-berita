@include('layout.head')

<body>
    <nav class="navbar navbar-light bg-light">
        @include('layout.nav')
    </nav>

    <div class="d-flex">

        <div class="row">
            @include('layout.sidebar')
        </div>

        <div class="d-flex flex-column flex-grow-1">
            <main class="flex-grow-1 p-4">
                @yield('konten')
            </main>

            <footer class="bg-dark text-center p-2">
                @include('layout.footer')
            </footer>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous">
        </script>
    <!-- script datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    @stack('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- summernote-lite css & js -->

    @stack('script')

</body>

</html>