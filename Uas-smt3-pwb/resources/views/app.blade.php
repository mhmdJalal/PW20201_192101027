<html>
    <head>
        <title>@yield('title')</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <h3>DATA LOGISTIK LEMBAR KERJA SISWA (LKS)</h3>

        Programmer : Muhamad Jalaludin
        <br><br>
        <a href="{{ route('stock.index') }}">Input Stock</a> &nbsp;&nbsp;&nbsp; 
        <a href="{{ route('distribution.index') }}">Distribusi</a> &nbsp;&nbsp;&nbsp; 
        <a href="{{ url('cek-stock') }}">Cek Stock</a>
        @yield('content')
    </body>
</html>
