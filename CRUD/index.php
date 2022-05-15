<?php
include 'config.php';

$semester       = "";
$semester1      = "";
$semester2      = "";
$semester3      = "";
$semester4      = "";
$semester5      = "";
$semester6      = "";
$semester7      = "";
$semester8      = "";
$matakuliah     = "";
$dosen          = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $semester   = $r1['semester'];
    $matakuliah = $r1['matakuliah'];
    $dosen      = $r1['dosen'];

    if ($semester == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $semester   = $_POST['semester'];
    $matakuliah = $_POST['matakuliah'];
    $dosen      = $_POST['dosen'];

    if ($semester && $matakuliah && $dosen) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update mahasiswa set semester='$semester',matakuliah = '$matakuliah',dosen='$dosen' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into mahasiswa(semester,matakuliah,dosen) values ('$semester','$matakuliah','$dosen')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrak Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?> -->
    <a class="mx-3 my-3 px-3 btn btn-dark" href="logout.php">Logout</a>
    <div class="mx-auto">
        <!-- Input data -->
        <div class="card">
        <div class="card-header text-white bg-secondary">
                Kontrak Mata Kuliah
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="semester" id="semester">
                                <option value="">- Pilih Semester -</option>
                                <option value="Semester 1" <?php if ($semester1 == "Semester 1") echo "selected" ?>>Semester 1</option>
                                <option value="Semester 2" <?php if ($semester2 == "Semester 2") echo "selected" ?>>Semester 2</option>
                                <option value="Semester 3" <?php if ($semester3 == "Semester 3") echo "selected" ?>>Semester 3</option>
                                <option value="Semester 4" <?php if ($semester4 == "Semester 4") echo "selected" ?>>Semester 4</option>
                                <option value="Semester 5" <?php if ($semester5 == "Semester 5") echo "selected" ?>>Semester 5</option>
                                <option value="Semester 6" <?php if ($semester6 == "Semester 6") echo "selected" ?>>Semester 6</option>
                                <option value="Semester 7" <?php if ($semester7 == "Semester 7") echo "selected" ?>>Semester 7</option>
                                <option value="Semester 8" <?php if ($semester8 == "Semester 8") echo "selected" ?>>Semester 8</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="matakuliah" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="matakuliah" id="matakuliah">
                                <option value="">- Pilih Mata Kuliah -</option>
                                <option value="saintek" <?php if ($dosen == "saintek") echo "selected" ?>>saintek</option>
                                <option value="soshum" <?php if ($dosen == "soshum") echo "selected" ?>>soshum</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dosen" class="col-sm-2 col-form-label">Dosen</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dosen" id="dosen">
                                <option value="">- Pilih Dosen -</option>
                                <option value="saintek" <?php if ($dosen == "saintek") echo "selected" ?>>saintek</option>
                                <option value="soshum" <?php if ($dosen == "soshum") echo "selected" ?>>soshum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                List Mata Kuliah
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from mahasiswa order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $semester   = $r2['semester'];
                            $matakuliah = $r2['matakuliah'];
                            $dosen   = $r2['dosen'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $semester ?></td>
                                <td scope="row"><?php echo $matakuliah ?></td>
                                <td scope="row"><?php echo $dosen ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>
