<?php
    require 'fungsi.php';
    $id = $_GET["id"];
    $query = "SELECT * FROM MAHASISWA WHERE id=$id";

    $mhs = tampildata($query)[0]; /// wadah berisikan data spesifik




    if(isset($_POST["submit"])) {

        if(ubahdata($_POST, $_FILES,  $id) > 0) {
            echo "<script>

            alert('Data berhasil di ubah!');
            window.location.hrefs='mahasiswa.php';
            
            </script>";
        }

        else {
            echo "<script>

            alert('Data gagal di ubah!');
            window.loaction.href='mahasiswa.php';

            </script>";
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data | Informatika</title>
    <link rel="stylesheet" href="css/tambahdata.css">
</head>
<br>
    
    <div align="center">
    <h2>Ubah Data Mahasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table cellpadding="Spx">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?= $mhs['nama']?>" required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" value="<?= $mhs['nim']?>" required /></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" value="<?= $mhs['prodi']?>" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" value="<?= $mhs['email']?>" required /></td>
            </tr>
            <tr>
                <td><label for="no_hp">Nomor HP</label></td>
                <td>:</td>
                <td><input type="text" name="nohp" id="nohp" value="<?= $mhs['no_hp']?>" /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" value="<?= $mhs['foto']?>" /></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit"> Ubah </button>
                </td>
            </tr>
        </table>
    </form>

    <br></br>

    <a href ="mahasiswa.php"> Back </a>
    
     </div>
</body>
</html>