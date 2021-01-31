@extends('app')

@section('content')
    <h3>Form Input Stock LKS</h3>

    <form method="POST"
          action="{{ $isCreate ? route('stock.store') : route('stock.update', $lks->id) }}">
        @csrf
        @if($isCreate) @method('POST')
        @else @method('PATCH')
        @endif

        <table cellpadding="5">
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="class" required>
                        @for($i=1; $i<=6; $i++)
                            <option
                                value="{{ $i }}" {{ (!$isCreate && $lks->class == $i) ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td>
                    <input type="number" name="quantity" required value="{{ $isCreate ? '' : $lks->quantity }}">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <input type="number" name="price" required value="{{ $isCreate ? '' : $lks->price }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <button type="submit">{{ $isCreate ? 'Simpan' : 'Update' }}</button>
                </td>
            </tr>
        </table>
    </form>

    <h3>Data Stock LKS</h3>
    <table border="1" cellpadding="10">
        <tr>
            <td>No.</td>
            <td>Kelas</td>
            <td>Jumlah</td>
            <td>Harga</td>
            <td>Nilai Persediaan</td>
            <td>Action</td>
        </tr>
        @foreach($lksList as $lks)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $lks->class }}</td>
                <td>{{ $lks->quantity }}</td>
                <td>{{ $lks->price }}</td>
                <td>{{ $lks->quantity * $lks->price }}</td>
                <td>
                    <a href="{{ route('stock.edit', $lks->id) }}">edit</a>
                    <a href="#" class="btn-delete" data-id='{{ $lks->id }}'>hapus</a>

                    <form action="{{ route('stock.destroy', $lks->id) }}" method="POST" id="delete-form-{{ $lks->id }}"
                          style="display: none;">
                        @csrf @method('delete')
                        <input type="hidden" value="{{ $lks->id }}" name="id">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <p>
        Jumlah LKS Seluruh : {{ $lksList->sum('quantity') }}
        <br>    
        Total Nilai Persediaan : {{ $lksList->sum('quantity') * $lksList->sum('price') }}
    </p>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {
                var id = $(this).attr('data-id');
                $("#delete-form-" + id).submit();
            })
        })
    </script>
@endsection
