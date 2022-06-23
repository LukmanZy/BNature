
<?php 
  include 'koneksi.php';
  
  $id = "";
  $nama = "";
  $deskripsi = "";
  
  if (isset ($_GET['ubah'])) {
    $id = $_GET['ubah'];
    
    $query = "SELECT * FROM list_wisata WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    
    $result = mysqli_fetch_assoc($sql);
    
    $nama = $result['nama'];
    $deskripsi = $result['deskripsi'];
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Input Data</title>
  </head>
  <body>
    <div class="containerBGInput">
      <div class="atas">
      <?php if(isset($_GET['ubah']) ) :?>
        <h1 class="judulTable">UPADATE DATA</h1>
        <?php else:?>
          <h1 class="judulTable">INPUT DATA</h1>
      <?php endif?>
        <div class="kotak">
          <a href="table.php">
            <button class="btnInput">Back</button>
          </a><br>
      </div>
      <div class="containerTable">
        <table>
          <form action="proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $id;?>" name="id">
            <tr>
              <td>
                <label for="nama">Nama Wisata</label>
              </td>
              <td>
                <input type="text" name="nama" id="nama" placeholder="Nama temapat wisata" required value="<?= $nama; ?>"/>
              </td>
            </tr>
            <tr>
              <td>
                <label for="deskripsi">Deskripsi tempat</label>
              </td>
              <td>
                <input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi dan alamat" required value="<?= $deskripsi; ?>"/>
              </td>
            </tr>
            <tr>
              <td>
                <label for="foto" >Foto</label>
              </td>
              <td>
                <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> type="file" name="foto" id="foto" accept="image/*" />
              </td>
            </tr>
            <tr>
                <td colspan="2">
                  <?php if(isset($_GET['ubah']) ) :?>
                      <button class="" type="submit" name="aksi" value="edit">Simpan Perubahan</button>
                    <?php else:?>
                      <button class="" type="submit" name="aksi" value="add">Tambahkan perubahan</button>
                      <?php endif?>
                </td>
            </tr>
          </form>
        </table>
      </div>
    </div>
  </body>
</html>
