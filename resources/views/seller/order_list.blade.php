<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />

    <style>
      .product-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #dee2e6;
      }

      .product-item img {
        max-width: 250px;
        margin-left: 1rem;
        margin-right: 1rem;
        margin-top: auto;
        border-radius: 10px;
      }

      .navbar-nav li {
        position: relative;
        transition: all 0.3s ease;
      }

      .navbar-nav li:hover::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #1abc9c;
        visibility: visible;
        transform: scaleX(1);
        transition: all 0.3s ease;
      }
    </style>
    <title>Detail Pesanan</title>
  </head>

  <body>
    <!-- Navigation-->
    <nav
      class="navbar navbar-expand d-flex flex-row-reverse"
      style="background-color: #ebffec; height: 70px"
    >
      <div class="container-fluid">
        <img
          src="../Bahan/Logo (1) 1.png"
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
          <ul class="navbar-nav mr-auto"></ul>
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
        <div>
          <a href="#">
            <img
              src="../Bahan/user.png"
              alt="Profile Picture"
              style="width: 45px; height: 45px; border-radius: 50px"
          /></a>
        </div>
      </div>
    </nav>

    <!--Switch Menu-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarNav"
        >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../html/detail_pesanan.html"
                >Detail Pesanan</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/sedang_dipesan.html"
                >Sedang Diproses</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--List Keranjang-->

    <div class="container mt-5">
      <div class="row mt-4">
        <div class="col-12 col-md-6 col-lg-8">
          <div class="product-item">
            <img src="../Bahan/jajan5.jpg" alt="Product 1" />
            <div>
              <h5>Nama Product</h5>
              <p class="text-muted">Kategori Product</p>
              <h5>Rp.10.000</h5>
              <button class="btn btn-danger">Hapus</button>
            </div>
          </div>
          <div class="product-item">
            <img src="../Bahan/jajan5.jpg" alt="Product 2" />
            <div>
              <h5>Nama Product</h5>
              <p class="text-muted">Kategori Product</p>
              <h5>Rp.10.000</h5>
              <button class="btn btn-danger">Hapus</button>
            </div>
          </div>
          <div class="product-item">
            <img src="../Bahan/jajan5.jpg" alt="Product 3" />
            <div>
              <h5>Nama Product</h5>
              <p class="text-muted">Kategori Product</p>
              <h5>Rp.10.000</h5>
              <button class="btn btn-danger">Hapus</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ringkasan Belanja</h5>
              <p class="card-text">Total Produk: 3</p>
              <p class="card-text">Total Harga: Rp.30.000</p>
              <button class="btn btn-success btn-block">Buat Pesanan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
