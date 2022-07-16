<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Pendaftaran Anggota</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php 
        include "config.php";

        function input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $username=input($_POST["username"]);
            $nama=input($_POST["nama"]);
            $alamat=input($_POST["alamat"]);
            $email=input($_POST["email"]);
            $no_hp=input($_POST["no_hp"]);

            //query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO anggota (username,nama,alamat,email,no_hp) VALUES ('$username','$nama','$alamat','$email','$no_hp')";

            //eksekusi
            $hasil=mysqli_query($link,$sql);

            //kondisi cek berhasil atau tidak
            if ($hasil){
                header("location: index.php");
            } else {
                echo "<div class='alert alert-danger'> Data gagal disimpan.</div>";
            }
        }
        ?>
        <br>
        <h4>Tambah Anggota</h4>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container-fluid">
            <a class="navbar-brand hover" href="index.php">Anggota Bisnis</a>
            </form>
            </div>
        </nav>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Username :</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat :</label>
                <textarea name="alamat" class="form-control"row="5" placeholder="Masukan Alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="text" name="email" class="form-control" placeholder="Masukan Email" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">No HP :</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>