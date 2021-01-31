@extends('app')

@section('content')
    <h3>Cek Stock</h3>
    <table border="1" cellpadding="10">
        <tr>
            <td>No.</td>
            <td>Kelas</td>
            <td>Jumlah</td>
            <td>Harga</td>
            <td>Nilai Persediaan</td>
        </tr>
        @foreach($lksList as $lks)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $lks->class }}</td>
                <td>{{ $lks->quantity }}</td>
                <td>{{ $lks->price }}</td>
                <td>{{ $lks->quantity * $lks->price }}</td>
            </tr>
        @endforeach
    </table>

@endsection
