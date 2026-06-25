<?php

    require 'fungsi.php';

    $id = $_GET["id"];

    if(hapusdata($id) > 0)
        {
            echo "<script>

            alert('Data berhasil di hapus!');
            window.loaction.hrefs='mahasiswa.php';
            
            </script>"; 
        }

    else {
            echo "<script>

            alert('Data gagal di hapus!');
            window.loaction.hrefs='mahasiswa.php';

            </script>";
        }
?>