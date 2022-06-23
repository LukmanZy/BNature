<?php
  include 'koneksi.php';

  $query = "SELECT * FROM list_wisata;";
  $sql = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>table imput data</title>
  </head>
  <body>
    <div class="containerBG">
      <div class="atas">
        <h1 class="judulTable">DESTINASI</h1>
        <div class="kotak">
          <a href="index.php">
            <button class="btnInput" style="padding: 7px 18px;">Kembali </button>
          </a><br><br/>
        </div>
        <div class="kotak">
          <a href="formInput.php">
            <button class="btnInput">Input Data</button>
          </a><br/><br>
        </div>
      </div>
      <div class="containerTable">
        <table>
          <tr>
            <th>NO</th>
            <th>Nama Destinasi</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
          <?php
            $i = 1;
            while($result = mysqli_fetch_assoc($sql) ) :?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $result["nama"]?></td>
            <td><?= $result["deskripsi"]?></td>
            <td><img src="image/<?= $result["foto"]?>" width="100"></td>
            <td>
              <a href="formInput.php?ubah=<?= $result['id']; ?>">
                <button class="btnEdit">Edit</button>
              </a>
              <a href="proses.php?hapus=<?= $result["id"]; ?>" onclick="return confirm('yakin mau di hapus?')">
                <button class="btnHapus">Delete</button>
              </a>
            </td>
          </tr>
          <?php $i++?>
          <?php endwhile;?>
        </table>

      </div>
    </div>
  </body>
</html>
