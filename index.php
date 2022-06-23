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
    <!-------------------------- Style css ----------------------------->
    <link rel="stylesheet" href="style.css" />
    <!-------------------------- fontAwesome ----------------------------->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!------------------------- Title Website -------------------------->
    <title>Wisata Alam Bandung</title>
  </head>
  <body>
    <!-------------------------- Header ------------------------------>
    <header>
      <a href="#home">
        <img src="image/log.png" alt="logo" width="200" />
      </a>
      <div class="navigation">
        <div class="navigation-item">
          <a href="#home">Home</a>
          <a href="#destinasi">Destinations</a>
          <a href="#about">About</a>
          <a href="table.php">Tambah Destinasi</a>
        </div>
      </div>
    </header>

    <section class="home" id="home">
      <img class="imageSlider" src="image/banner1.jpg" alt="" />
      <div class="contentHome">
        <h1>WONDERFUL <span>BANDUNG</span></h1>
        <p>Bandung memiliki sejuta pesona yang selalu membuat wisatawan terpana. Bagaimana tidak? Mulai dari tempat wisata berbasis alam, destinasi rekreasi kekinian, hingga kuliner dan tren fesyen bisa Sobat Pesona temui semua di Ibu Kota Jawa Barat ini. Saking idealnya, Bandung seringkali menjadi destinasi tujuan rekreasi singkat di hari libur maupun akhir pekan. Baik bersama teman, keluarga, atau sendirian, selalu ada tempat seru dan menyenangkan yang bisa ditelusuri di Kota Bandung.</p>
        <a href="#destinasi" class="btnExplore">Explore</a>
      </div>
    </section>
    <!-------------------------- Isi Beranda --------------------------->
    <div class="conta">
      <div class="containerDestinasi" id="destinasi">
        <h1 class="name">Destination list</h1>
        <div class="isiPilihanDestinasi">

        <?php 
        while($result = mysqli_fetch_assoc($sql)) :?>
          <div class="card">
            <img src="image/<?= $result["foto"];?>" alt="destinasi" />
            <div class="info">
              <h1><?= $result["nama"]?></h1>
              <p><?= $result["deskripsi"] ?></p>
            </div>
          </div>
          <?php endwhile?>

        </div>
      </div>
    </div>
    <!-------------------------- about us ---------------------------->
    
    <div class="container">
      <div class="caption">
        <center><img src="image/log.png" alt="logo" width="250" /></center>
        <p>adalah website yang menyediakan informasi destinasi wisata alam yang terletak di Bandung Provinsi Jawa Barat. Website ini cocok untuk anda yang suka healing-healing</p>
        <ul class="socials">
          <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-youtube"></i></a>
          </li>
        </ul>
      </div>
      <img src="image/logo (4).png" alt="logo" width="500" />
    </div>
  </div>
  <div class="aboutUs" id="about">
    <h2>About us</h2>
    <p>Website ini dibuat untuk memenuhi nilai UAS dari mata kuliah Web Programing</p>
    <ul class="socials contact">
      <li>
        <a href="#"><i class="fa fa-envelope"></i>hlukman6969@gmail.com</a>
      </li>
      <li>
        <a href="#"><i class="fa fa-envelope"></i>abdullahzaky2000@gmail.com</a>
      </li>
    </ul>
  </div>
  
  <!-------------------------- Footer ---------------------------->
  <footer>
    <div class="footerBottom">
      <p>copyright &copy;2022 WebPrograming. designed by <span>Abdullah Zaky Al Luthfi & Lukman Hakim</span></p>
    </div>
  </footer>
    
    <!-------------------------- JavaScript ---------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <!-------------------------- Icons ----------------------------->
    <script src="https://kit.fontawesome.com/714828ef8f.js" crossorigin="anonymous"></script>
  </body>
</html>
