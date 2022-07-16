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
        if (isset($_GET['id_anggota'])){
            $id_anggota = input($_GET["id_anggota"]);

            $sql = "SELECT * FROM anggota WHERE id_anggota='$id_anggota'";
            $hasil=mysqli_query($link,$sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $id_anggota =htmlspecialchars($_POST["id_anggota"]);
            $username =input($_POST["username"]);
            $nama =input($_POST["nama"]);
            $alamat =input($_POST["alamat"]);
            $email =input($_POST["email"]);
            $no_hp =input($_POST["no_hp"]);

            $sql="UPDATE anggota SET
                username='$username',
                nama='$nama',
                alamat='$alamat',
                email='$email',
                no_hp='$no_hp' 
                WHERE id_anggota=$id_anggota";

            $hasil=mysqli_query($link,$sql);

            if ($hasil){
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal diubah.</div>";
            }
        }

        ?>
        <br>
        <h4>Update Data  Anggota</h4>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Anggota Bisnis</a>
            </form>
            </div>
        </nav>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Username :</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data["username"]; ?>" placeholder="Masukan Username" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat :</label>
                <textarea name="alamat" class="form-control" row="5" placeholder="Masukan Alamat" required><?php echo $data['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukan Email" required />
            </div>
            <div class="mb-3">
                <label class="form-label">No HP :</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="Masukan No HP" required/>
            </div>
            <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Update</button> 
        </form>
        </div>
    </body>
    </html>