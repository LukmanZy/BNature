<?php 
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'bnature';
  
  $conn = mysqli_connect($host, $user, $pass, $db);
  if($conn){
    echo "
      <script>
        alert('data berhasil tehubung!');
      </script>
    ";
  }
  mysqli_select_db($conn, $db);
?>