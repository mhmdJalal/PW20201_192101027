<?php
    $nama = $_POST['nama'];
    $lama_hari = $_POST['lama_hari'];
    $kode_booking = $_POST['kode_booking'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $jenis_pembayaran = $_POST['jenis_pembayaran'];

    $kode_kamar = substr($kode_booking, 0, 2);
    $nama_kamar = "";
    $harga_kamar = 0;
    switch($kode_kamar) {
        case "AL":
            $nama_kamar = "Alamanda";
            $harga_kamar = 450000;
            break;
        case "BG":
            $nama_kamar = "Bougenvile";
            $harga_kamar = 350000;
            break;
        case "CR":
            $nama_kamar = "Crysan";
            $harga_kamar = 375000;
            break;
        case "KM":
            $nama_kamar = "Kemuning";
            $harga_kamar = 425000;
            break;
        default:
            $nama_kamar = "Tidak ditemukan";
            break;
    }
    $lantai = substr($kode_booking, 2, 2);
    $nomor_kamar = substr($kode_booking, 4, 3);
    $potongan_tambahan = 0;
    $spring_bad_tambahan = 0;
    $total_biaya = 0;

    if($jumlah_orang > 2) {
        $orang_tambahan = $jumlah_orang - 2;
        $spring_bad_tambahan = 75000 * $orang_tambahan;
    }

    $total_biaya = ($harga_kamar * $lama_hari) + $spring_bad_tambahan;

    switch($jenis_pembayaran) {
        case "Kartu Kredit":
            $potongan_tambahan = 2 / 100 * $total_biaya;
            $total_biaya += $potongan_tambahan;
            break;
        case "Debit":
            $potongan_tambahan = 1.5 / 100 * $total_biaya;
            $total_biaya -= $potongan_tambahan;
            break;
    }
    echo "
    <h2 align=center>FLORENSIA HOTEL</h2>
    <table width=\"100%\" border=\"0\" cellspacing=\"10\" cellpadding=\"0\">
        <tr>
            <td width=15%>Nama</td>
            <td>: $nama</td>
            <td width=15%>Kode Booking</td>
            <td>: $kode_booking</td>
        </tr>
        <tr>
            <td>Nama Kamar</td>
            <td>: $nama_kamar</td>
            <td>Lantai</td>
            <td>: $lantai</td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>: $nomor_kamar</td>
            <td>Jumlah</td>
            <td>: $jumlah_orang Orang</td>
        </tr>
        <tr>
            <td>Lama</td>
            <td>: $lama_hari hari</td>
            <td>Jenis Pembayaran</td>
            <td>: $jenis_pembayaran</td>
        </tr>
        <tr>
            <td>Potongan/Tambahan</td>
            <td>: Rp $potongan_tambahan</td>
            <td>Biaya Spring Bad Tambahan</td>
            <td>: Rp $spring_bad_tambahan</td>
        </tr>
        <tr>
            <td>Total Biaya Seluruhnya</td>
            <td>: Rp $total_biaya</td>
        </tr>
    </table>
    <a href=\"index.php\">Back</a>
    ";
?>