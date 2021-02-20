<html>
<head>
  <style>
    @page {
      margin: 0cm 0cm;
    }

    body {
      margin-top: 1cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 1cm;
    }

    header {
      position: fixed;
      margin-left: 2cm;
      margin-right: 2cm;
      top: 1cm;
    }

    footer {
      position: fixed; 
      bottom: 1cm; 
      left: 2cm; 
      right: 2cm;
      height: 2cm;
      font-size: 10px;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    main {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    .title {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }

    #table {
      border-collapse: collapse;
      width: 100%;
      line-height: 100%;
    }

    #table td, #table th {
      border: 1px solid #000;
      padding: 8px;
    }

    #table th {
      text-align: center;
      background-color: #e1e3e9;
      color: #000;
    }
  </style>
</head>
<body>
  <header></header>
  <footer></footer>
  <main>
    <div class="row">
      <div class="title">
        <h2>Laporan Tahun <?= $tahun ?></h2>
      </div>
      <div class="table">
        <table width="100%" id="table">
          <thead>
            <tr>
              <th width="10%">No.</th>
              <th width="30%">Bulan</th>
              <th width="30%">Jumlah Member Baru</th>
              <th width="30%">Jumlah Peminjaman Buku</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($list_laporan as $value): ?>
            <tr>
              <td align="center"><?= $value->id_bulan ?></td>
              <td><?= $value->bulan ?></td>
              <td align="center"><?= $value->jml_member ?></td>
              <td align="center"><?= $value->jml_peminjaman ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>


