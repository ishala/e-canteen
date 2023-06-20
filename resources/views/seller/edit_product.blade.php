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
    <title>Edit Detail Produk</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
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
        <h2>Edit Detail Produk</h2>
      </div>
      <div class="container px-4 px-lg-5 my-5 mt-3">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-4">
            <img
              class="card-img-top mb-5 mb-md-0"
              src="/assets/jajan7.jpg"
              alt="..."
            />
            <img
              class="card-img-top mt-5 mb-md-0"
              src="/assets/jajan7.jpg"
              alt="..."
            />
          </div>
          <div class="col-md">
            <form>
              <div class="form-group">
                <label for="productName" class="fw-bold mb-2">Nama Produk</label>
                <div class="col-md-7 mb-2">
                  <input
                    type="text"
                    class="form-control"
                    id="productName"
                    placeholder="Masukkan Nama Produk"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="productPrice" class="fw-bold">Harga</label>
                <div class="col-md-7 mb-2">
                  <input
                    type="text"
                    class="form-control"
                    id="productPrice"
                    placeholder="Masukkan Harga"
                  />
                </div>
              </div>
              <div
                class="col-md"
                style="
                  position: absolute;
                  width: 320px;
                  height: 90px;
                  left: 1010px;
                  top: 280px;
                "
              >
                <div class="form-group">
                  <label for="productCategory" class="fw-bold">Kategori</label>
                  <select class="form-control" id="productCategory">
                    <option value="2">Makanan</option>
                    <option value="3">Topping</option>
                    <option value="4">Minuman</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="productDescription" class="fw-bold">Deskripsi</label>
                <textarea
                  class="form-control"
                  id="productDescription"
                  rows="4"
                  placeholder="Masukkan Deskripsi Produk"
                ></textarea>
              </div>
              <div class="" style="position: relative; left: 670px;">
                <button type="submit" class="btn btn-light mt-5 rounded-pill text-danger">
                  Hapus
                </button>
                <button type="submit" class="btn btn-danger mt-5 rounded-pill">
                  Edit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
