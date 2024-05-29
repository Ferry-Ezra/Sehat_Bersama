<?php
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

// Ambil data pembayaran dari database
include '../koneksi.php';
$sql = "SELECT p.ID_pembayaran, p.Tanggal_pembayaran, ps.Nama, p.Jumlah, p.Metode_pembayaran, p.Keterangan
        FROM tb_pembayaran p
        JOIN tb_pasien ps ON p.ID_pasien = ps.ID_pasien";
$result = $conn->query($sql);

// Mulai pembuatan HTML untuk PDF
$html = '<center><h3>Data Pembayaran</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Metode Pembayaran</th>
                <th>Keterangan</th>
            </tr>';
$no = 1;
while ($row = $result->fetch_assoc()) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $row["Tanggal_pembayaran"] . "</td>
                <td>" . $row["Nama"] . "</td>
                <td>" . $row["Jumlah"] . "</td>
                <td>" . $row["Metode_pembayaran"] . "</td>
                <td>" . $row["Keterangan"] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";

// Buat objek DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Render HTML ke dalam PDF
$dompdf->setPaper('A4', 'landscape'); // Atur ukuran kertas dan orientasi
$dompdf->render();

// Tampilkan atau unduh PDF
$dompdf->stream('laporan_pembayaran.pdf'); // Tampilkan PDF langsung di browser
// $dompdf->stream('laporan_pembayaran.pdf', array("Attachment" => false)); // Unduh PDF ke perangkat pengguna
?>
