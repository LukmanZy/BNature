<?php
    include 'koneksi.php';

    if ( isset($_POST['aksi']) ){
        if( $_POST['aksi'] == "add" ){


            $nama = $_POST['nama'];
            $deskripsi = $_POST['deskripsi'];
            $foto = $_FILES['foto']['name'];

            $dir = "image/";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto);

            $query = "INSERT INTO list_wisata VALUES (null, '$nama', '$deskripsi', '$foto')";
            $sql = mysqli_query ($conn, $query);

            if ($sql){
                header("location: index.php");
            }else{
                echo "$query";
            }
        }else if( $_POST['aksi'] == "edit"){
            
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $deskripsi = $_POST['deskripsi'];

            $queryShow = "SELECT * FROM list_wisata WHERE id = '$id'";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);
            if($_FILES['foto'] ['name'] == ""){
                $foto = $result['foto'];
            }else{
                $foto = $_FILES['foto']['name'];
                unlink("image/".$result['foto']);
                move_uploaded_file($_FILES['foto']['tmp_name'], '../image/'.$_FILES['foto']['name']);
            }

            $query = " UPDATE list_wisata SET nama='$nama', deskripsi='$deskripsi', foto='$foto' WHERE id='$id'; ";
            $sql = mysqli_query($conn, $query);
            
            echo "
            <script>
                document.location.href = 'index.php';
            </script>
            ";
        }
    }

    if ( isset($_GET['hapus']) ){
        $id = $_GET['hapus'];

        $queryShow = "SELECT * FROM list_wisata WHERE id = '$id'";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("image/".$result['foto']);


        $query = "DELETE FROM list_wisata WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);

        if ($sql){
            header("location: index.php");
        }else{
            echo "$query";
        }
    }


?>