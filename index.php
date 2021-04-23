<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <title>Data Mahasiswa</title>
  </head>
  <body id="home">
    <!-- Navbar Goes Here -->
    <nav class="navme navbar navbar-expand-lg navbar-dark pb-3 p-3 shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/logo.svg" alt="logo" />
                <span class="p-2">Gloouyu</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active me-5" aria-current="page" href="#">Home</a>
                    <li class="nav-item dropdown me-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mahasiswa
                        </a>
                        <ul class="dropdown-menu bg-transparent border border-info" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-info" href="#">Insert Mahasiswa</a></li>
                            <li><a class="dropdown-item text-info" href="#">Update Mahasiswa</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-info" href="#">Delete Mahasiswa</a></li>
                        </ul>
                    </li>
                    <a class="nav-link disabled" href="#">Nothing</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Table Goes Here -->
    <section class="tabel">
    <div class="container data-mahasiswa text-center">
        <div class="row mb-3">
          <div class="me col">
              <div class="mhs container mb-2">
              <h2 class="text-info text-center fw-bold">Data Mahasiswa</h2>
            </div>
          </div>
        </div>
        <table class="table table-dark table-striped table-bordered border-white shadow-sm">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Memanggil config.php yang sudah kita buat
                include 'config.php';
                //Membuat variabel untuk nomor mahasiswa yang akan di increment
                $no = 1;
                //Melakukan query
                $mahasiswa = mysqli_query($koneksi, "select * from mahasiswa");

                //Looping data mahasiswa
                while ($data = mysqli_fetch_array($mahasiswa)) {
                    ?>
                    <!-- Menampilkan data mahasiswa ke dalam tabel -->
                    <tr>
                        <!-- Increment nomor baris $no++ -->
                        <td><?php echo $no++; ?></td>
                        <!-- Menampilkan data -->
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>

                        <!-- Kolom ini untuk aksi data mahasiswa -->
                        <td>
                            <!-- Aksi Edit dan Delete, di sini menggunakan btn-sma agar tombolnya kecil -->
                            <!-- Link untuk masuk ke halaman edit -->
                            <!-- edit.php?id=<
                                ?php echo $data['id']; ?> Mengirimkan id dari data mahasiswa ke halaman edit -->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white" > 
                            <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
                            </svg> Edit</a>
                            
                            <!-- Link untuk delete berdasarkan id, akan keluar confirm terlebih dahulu -->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin menghapus data mahasiswa?')">
                            <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                                <path fill="#fff" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
                            </svg> Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </section>
    <!-- End of Table -->
    <!-- Footer -->
    <footer class="text-white text-center pb-2 p-2 fixed-bottom">
      <p class="">Created with <i class="bi bi-heart-fill text-danger"></i></p>
      <span class="d-block text-info">© Copyright 2021 <strong>Gloouyu</strong>. All Right Reserved</span>
      <small class="d-block text-info font-weight-light"><b class="font-weight-bold">Designed By</b> Bima Hayu Nugraha</small>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>