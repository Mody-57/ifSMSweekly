<?php
    require "fungsi.php";

    $qmahasiswa = "SELECT * FROM mahasiswa";

    $mahasiswas = tampildata($qmahasiswa); ///array associative

?>



<!doctype php>
<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Mahasiswa | INFORMATIKA</title>
  </head>
  <body>
    <h1 align="center">INFORMATIKA</h1>
    <center>
      <img
        src="https://w7.pngwing.com/pngs/802/825/png-transparent-redbubble-polite-cat-meme-funny-cat-meme-thumbnail.png"
        widht="50px"
      />
    </center>
    <table border="1" cellspacing="0" cellpadding="10" align="center">
      <tr>
        <td><a href="index.php">Home </a></td>
        <td><a href="profile.php">Profile </a></td>
        <td><a href="contact.php">Contact </a></td>
        <td><a href="mahasiswa.php">Data Mahasiswa </a></td>
      </tr>
    </table>
    <h2>Data Mahasiswa</h2>
    <a href="tambahdata.php">
      <button>Tambah Data</button>
    </a>

    <table border="1" callpadding="10px">
      <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Progam Studi</th>
        <th>Email</th>
        <th>No.hp</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
      <?php
        $i = 1;
       foreach($mahasiswas as $mhs)
        {
  

      ?>  
      <tr>
        <td align="center"><?= $i ?></td>
        <td><?php echo $mhs["nama"] ?></td>
        <td><?php echo $mhs["nim"] ?></td>
        <td><?= $mhs["prodi"] ?></td>
        <td><?= $mhs["email"] ?></td>
        <td><?= $mhs["no_hp"] ?></td>
        <td><img src="aset/image/<?= $mhs["foto"] ?>" width=50px></td>
        <td> 
          <a href="editdata.php"><button>Edit</button></a>
          <a href="hapusdata.php?id=<?= $mhs['id'] ?>" onclick="return confirm('YAKEUNNN?')"><button>Hapus</button></a>
        </td>
      </tr>
      <?php
          $i++;
         }
       ?> 
  </body>
</php>
