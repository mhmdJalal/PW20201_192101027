@extends('app')

@section('content')
    <h3>Distribusi LKS</h3>

    <form method="POST"
          action="{{ $isCreate ? route('distribution.store') : route('distribution.update', $distribution->id) }}">
        @csrf
        @if($isCreate) @method('POST')
        @else @method('PATCH')
        @endif

        <table cellpadding="5">
            <tr>
                <td>Nama Sekolah</td>
                <td>:</td>
                <td>
                    <input type="text" name="school_name" required
                           value="{{ $isCreate ? '' : $distribution->school_name }}">
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    @for($i=1; $i<=6; $i++)
                        <input type="radio" name="class" value="{{ $i }}"
                        {{ (!$isCreate && $distribution->class == $i) ? 'checked' : '' }}> {{ $i }}
                    @endfor
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td>
                    <input type="number" name="quantity" required value="{{ $isCreate ? '' : $distribution->quantity }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <button type="submit">{{ $isCreate ? 'Simpan' : 'Update' }}</button>
                </td>
            </tr>
        </table>
    </form>

    <h3>Data Distribusi</h3>
    <table border="1" cellpadding="5">
        <tr>
            <td>No.</td>
            <td>Nama Sekolah</td>
            <td>Kelas</td>
            <td>Jumlah</td>
            <td>Action</td>
        </tr>
        @foreach($distributions as $distribution)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $distribution->school_name }}</td>
                <td>{{ $distribution->class }}</td>
                <td>{{ $distribution->quantity }}</td>
                <td>
                    <a href="{{ route('distribution.edit', $distribution->id) }}">edit</a>
                    <a href="#" class="btn-delete" data-id='{{ $distribution->id }}'>hapus</a>

                    <form action="{{ route('distribution.destroy', $distribution->id) }}" method="POST"
                          id="delete-form-{{ $distribution->id }}" style="display: none;">
                        @csrf @method('delete')
                        <input type="hidden" value="{{ $distribution->id }}" name="id">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {
                var id = $(this).attr('data-id');
                $("#delete-form-" + id).submit();
            })
        })
    </script>
@endsection
