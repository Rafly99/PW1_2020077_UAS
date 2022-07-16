<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
<body>
    <div class="container">
        <br>
        <h4>Input Data Anggota</h4>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container-fluid">
            <a class="navbar-brand"     >Anggota Bisnis</a>
            <a href="create.php" class="btn btn-outline-primary" role="button">Tambah Data</a>
            </form>
            </div>
        </nav>
        <?php

        include "config.php";

        //cek nilai
        if (isset($_GET['id_anggota'])){
            $id_anggota=htmlspecialchars($_GET["id_anggota"]);

            $sql="DELETE FROM anggota WHERE id_anggota='$id_anggota' ";
            $hasil=mysqli_query($link,$sql);

            //berhasil atau tidak
            if ($hasil){
                header("location:index.php");
            }else {
                echo "<div class='alert alert-danger'> Data gagal dihapus.</div>";
            }
        }
        ?>
        <table class="table table-bordered table-hover">
            <br>
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <?php
            include "config.php";
            $sql="select * from anggota order by id_anggota desc";
            $hasil=mysqli_query($link,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)){
                $no++;

                ?>
                <tbody>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data["username"];?></td>
                        <td><?php echo $data["nama"];?></td>
                        <td><?php echo $data["alamat"];?></td>
                        <td><?php echo $data["email"];?></td>
                        <td><?php echo $data["no_hp"];?></td>
                        <td>
                            <a href="update.php ?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" 
                            role="button" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</a> 
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
