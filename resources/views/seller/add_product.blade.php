<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Produk</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css"
    />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styl.css" rel="stylesheet" />

    <!--Style-->
    <style>
      .image {
        align-items: center;
        width: 450px;
        height: 300px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
      }
    </style>
  </head>

  <body>
    <!-- Navigation-->
    <nav
      class="navbar navbar-expand"
      style="background-color: #ebffec; height: 70px"
    >
      <div class="container-fluid">
        <img
          src="/assets/Logo1.png"
          alt="Logo"
          style="width: 130px; height: auto"
        />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Discount</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Section-->
    <section class="py-5 pt-1">
      <div class="container mt-4">
        <h2>Tambahkan Produk</h2>
      </div>
      <div class="container px-4 px-lg-5 my-5 mt-3">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="image">
            <div class="form-group">
              <label for="gambar"></label>
              <input
                type="file"
                class="form-control-file"
                id="gambar"
                name="gambar"
                style="align-items: center;"
              />
            </div>
          </div>
          <div class="col-md">
            <form>
              <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama_produk"
                  name="nama_produk"
                />
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input
                  type="text"
                  class="form-control"
                  id="harga"
                  name="harga"
                />
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea
                  class="form-control"
                  id="deskripsi"
                  name="deskripsi"
                  rows="3"
                ></textarea>
              </div>
              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select class="form-select" id="kategori" name="kategori">
                  <option value="Pakaian">Topping</option>
                  <option value="Makanan">Makanan</option>
                  <option value="Minuman">Minuman</option>
                </select>
              </div>
              <button type="submit" class="btn btn-danger" id="tambahBtn">
                Tambah
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script>
      document
        .getElementById("tambahBtn")
        .addEventListener("click", function () {
          Swal.fire({
            title: "Berhasil Ditambahkan",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
        });
    </script>
  </body>
</html>
