<?php
session_start();

$koneksi = mysqli_connect("localhost:3306","root","sisca1234","smweekly");

function tampildata($query) // proses data uang kita minta
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query); // lemari sesuai perintah kita

    // siapkan wadahnya
    $rows =[];

    // ambil data
    while($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row; //taruh di wadah
        }

    return $rows;
}

/// ambil data (fetch) dari lemari
///while($mhs = mysqli_fetch_assoc($result))
///    {
///        var_dump($mhs);
///    }

/// mysqli_fetch_row array numeric index
///$mhs = mysqli_fetch_row($result);
///var_dump($mhs[1]);

/// mysqli_fetch_assoc array asosiatif index
///$mhs = mysqli_fetch_object($result);
///var_dump($mhs["nama"]);

/// mysqli_fetch_array
///bisa semua

/// mysqli_fetch_object
///$mhs = mysqli_fetch_object($result);
///var_dump($mhs->nama);

function tambahdata($data, $files) 
{
    global $koneksi;

        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $email = htmlspecialchars($data["email"]);
        $nohp = htmlspecialchars($data["nohp"]);
        $namafoto = $files["name"];
        $newnamafoto = date ('dmYhis_').$namafoto;
        $tmpfoto = $files ["tmp_name"];

        $path = "aset/image/$newnamafoto";
        
        if (move_uploaded_file($tmpfoto,$path)){
             $query = "INSERT INTO mahasiswa (nama,nim,prodi,email,no_hp,foto)
             VALUES ('$nama','$nim','$prodi','$email','$nohp','$newnamafoto')";

        mysqli_query($koneksi,$query);

        }

       return mysqli_affected_rows ($koneksi);


}

function hapusdata($id)
{
    global $koneksi;

    $query = "DELETE FROM mahasiswa WHERE id=$id";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function ubahdata($data, $files, $id)
{
    global $koneksi;

    $nama  = htmlspecialchars($data["nama"]);
    $nim   = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $nohp  = htmlspecialchars($data["nohp"] ?? '');

    // Foto
    $foto = '';

    if ($files["foto"]["error"] == 0) {

        $namaFoto = $files["foto"]["name"];
        $tmpFoto  = $files["foto"]["tmp_name"];

        $fotoBaru = date('dmYHis_') . $namaFoto;

        move_uploaded_file(
            $tmpFoto,
            "aset/image/" . $fotoBaru
        );

        $foto = ", foto='$fotoBaru'";
    }

    $query = "UPDATE mahasiswa SET
                nama='$nama',
                nim='$nim',
                prodi='$prodi',
                email='$email',
                no_hp='$nohp'
              WHERE id='$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function register($data)
{
    global $koneksi;

    $username = strtolower (stripcslashes($data["username"]));
    $password1 = mysqli_real_escape_string($koneksi, $data["password1"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    if ($password1 != $password2)

        {
            echo "<script>
                alert('Konfirmasi password salah!');
            </script>";
        }
        $result= mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result))
            {
            echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
            return false;
            }






        $password_has = password_hash($password1, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username,password)
        VALUES ('$username', '$password_hash')";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);
}
    function login($data)
    {
        global $koneksi;

        $username = strtolower(stripcslashes ($data["username"]));
        $password = $data["password"];

        $query = "SELECT * FROM user WHERE username='$username'";

        mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) == 1)
            {
                ///username ada
            $row = mysqli_fetch_assoc ($result);

               if ( password_verify($password,$row ["password"] ))
                {
                    ///password benar
                    $_SESSION["login"] = true;
                    header("Location: mahasiswa.php");
                    exit;
                }
            }

            return $error = true;
    }


?>