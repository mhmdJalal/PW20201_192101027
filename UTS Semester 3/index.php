<?php
    $kode_bookings = array("AL02102", "BG03025", "CR02111", "KM03075");
    $jenis_pembayarans = array("Kartu Kredit", "Debit", "Cash");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Tengah Semester</title>
</head>
<body>
<h2>Form Input</h2>
<form method="post" action="proses.php">
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tr>
            <td width="8%">Nama</td>
            <td >:</td>
            <td width="30%"><input type="text" name="nama" size="30" require></td>
            <td width="8%">Lama</td>
            <td >:</td>
            <td ><input type="number" min="1" name="lama_hari" value="0" size="10"> hari</td>
        </tr>
        <tr>
            <td>Kode Booking</td>
            <td>:</td>
            <td>
                <select name="kode_booking">
                    <?php
                    for ($i=0; $i < sizeof($kode_bookings); $i++) { 
                        echo "<option value=$kode_bookings[$i]>$kode_bookings[$i]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><input type="number" min="1" name="jumlah_orang" value="0" size="10"> orang</td>
            <td width="10%">Jenis Pembayaran</td>
            <td>:</td>
            <td>
                <select name="jenis_pembayaran">
                    <?php
                    for ($i=0; $i < sizeof($jenis_pembayarans); $i++) { 
                        echo "<option value=\"$jenis_pembayarans[$i]\">$jenis_pembayarans[$i]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Proses">
            <input type="reset" name="batal" value="Hapus"></td>
        </tr>
    </table>
</form>
</body>
</html>