<?php
include_once 'include/database.vaksin.php';

$koneksi2 = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$koneksi2) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$Nama            = "";
$Usia            = "";
$Tempat_Tinggal  = "";
$Vaksin          = "";
$Alasan          = "";
$Jenis           = "";
$Orang_Dirumah   = "";
$Orang_Vaksin    = "";
$Orang_Ketemu    = "";


$sukses     = "";
$error      = "";

if (isset($_POST['simpan'])) { //untuk create
    $Nama            = $_POST['Nama'];
    $Usia            = $_POST['Usia'];
    $Tempat_Tinggal  = $_POST['Tempat_Tinggal'];
    $Vaksin          = $_POST['Vaksin'];
    $Alasan          = $_POST['Alasan'];
    $Jenis           = $_POST['Jenis'];
    $Orang_Dirumah   = $_POST['Orang_Dirumah'];
    $Orang_Vaksin    = $_POST['Orang_Vaksin'];
    $Orang_Ketemu    = $_POST['Orang_Ketemu'];

    if ($Nama && $Usia && $Tempat_Tinggal && $Vaksin && $Alasan && $Jenis && $Orang_Dirumah && $Orang_Vaksin && $Orang_Ketemu) {
            $sql1   = "insert into datapenduduk(Nama,Usia,Tempat_Tinggal,Vaksin,Alasan,Jenis,Orang_Dirumah,Orang_Vaksin,Orang_Ketemu) values ('$Nama','$Usia','$Tempat_Tinggal','$Vaksin','$Alasan','$Jenis','$Orang_Dirumah','$Orang_Vaksin','$Orang_Ketemu')";
            $q1     = mysqli_query($koneksi2, $sql1);
            if ($q1) {
                $sukses     = "Terima Kasih Sudah Mengisi Survey";
            } else {
                $error      = "Gagal memasukkan data";
            }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vaksin Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 950px;
        }

        .card {
            margin-top: 25px;
        }

    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header" style="background-color: green; font-size : 25px; font-family: monospace;">
                <center><b>Data Vaksin Penduduk</b></center>
            </div>
            <div class="card-body" style="background-color: #CFF2CE; font-size : 15px; font-family: sans-serif;">
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
                    <div class="mb-5 row">
                        <label for="Nama" class="col-sm-2 col-form-label"><b>Nama</b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Nama" name="Nama" value="<?php echo $Nama ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Usia" class="col-sm-2 col-form-label"><b>Usia</b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Usia" name="Usia" value="<?php echo $Usia ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Tempat_Tinggal" class="col-sm-2 col-form-label"><b>Tempat Tinggal</b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Tempat_Tinggal" name="Tempat_Tinggal" value="<?php echo $Tempat_Tinggal ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Vaksin" class="col-sm-2 col-form-label"><b>Sudah Vaksin</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" style="background-color: #DEF6DE" name="Vaksin" id="Vaksin">
                                <option value="">- Pilih Status -</option>
                                <option value="Sudah" <?php if ($Vaksin == "Sudah") echo "selected" ?>>Sudah</option>
                                <option value="Belum" <?php if ($Vaksin == "Belum") echo "selected" ?>>Belum</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Alasan" class="col-sm-2 col-form-label"><b>Alasan jika sudah / belum </b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Alasan" name="Alasan" value="<?php echo $Alasan ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Jenis" class="col-sm-2 col-form-label"><b>Jenis Vaksin </b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Jenis" name="Jenis" value="<?php echo $Jenis ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Orang_Dirumah" class="col-sm-2 col-form-label"><b>Jumlah orang dirumah</b></label>
                        <div class="col-sm-10">
                            <input type="text" style="background-color: #DEF6DE" class="form-control" id="Orang_Dirumah" name="Orang_Dirumah" value="<?php echo $Orang_Dirumah ?>">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Orang_Vaksin" class="col-sm-2 col-form-label"><b>Orang dirumah yang sudah vaksin</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" style="background-color: #DEF6DE" name="Orang_Vaksin" id="Orang_Vaksin">
                                <option value="">- Pilih Jumlah -</option>
                                <option value="Tidak ada" <?php if ($Orang_Vaksin == "Tidak ada") echo "selected" ?>>Tidak ada</option>
                                <option value="Beberapa sudah vaksin" <?php if ($Orang_Vaksin == "Beberapa sudah vaksin") echo "selected" ?>>Beberapa sudah vaksin</option>
                                <option value="Sudah Semua" <?php if ($Orang_Vaksin == "Sudah Semua") echo "selected" ?>>Sudah Semua</option>
                            </select>

                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="Orang_Ketemu" class="col-sm-2 col-form-label"><b>Jumlah orang yang kamu bertemu dalam 1 minggu</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" style="background-color: #DEF6DE" name="Orang_Ketemu" id="Orang_Ketemu">
                                <option value="">- Pilih Jumlah -</option>
                                <option value="0-5" <?php if ($Orang_Ketemu == "0-5") echo "selected" ?>>0-5</option>
                                <option value="5-10" <?php if ($Orang_Ketemu == "5-10") echo "selected" ?>>5-10</option>
                                <option value="lebih dari 10" <?php if ($Orang_Ketemu == "lebih dari 10") echo "selected" ?>>lebih dari 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <p align="right"><input type="submit" style="background-color: green; border-color: green; font-size: 25px;" name="simpan" value="Submit" class="btn btn-primary" /></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>