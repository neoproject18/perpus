<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
 <thead>
  <tr>
    <th>NO</th>
    <th>JUDUL BUKU</th>
    <th>PENULIS</th>
    <th>PENERBIT</th>
    <th>TAHUN TERBIT</th>
    <th>KATEGORI</th>
    <th>JUMLAH</th>
  </tr>
</thead>
<tbody> 
  <?php $no=1; foreach($listdata as $value): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $value['judul_buku'] ?></td>
    <td><?= $value['penulis'] ?></td>
    <td><?= $value['penerbit'] ?></td>
    <td><?= $value['tahun_terbit'] ?></td>
    <td><?= $value['nama_kategori'] ?></td>
    <td><?= $value['jumlah'] ?></td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>

