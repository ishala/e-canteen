<!DOCTYPE html>
<html>
  <head>
    <title>Button Popups</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
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

    <!--Rangga-->
    <section class="h-100" style="background-color: #eee">
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Daftar Keranjang</h3>
            </div>

            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div
                  class="row d-flex justify-content-between align-items-center"
                >
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="/assets/nasgor1.png"
                      class="img-fluid rounded-3"
                      alt="Cotton T-shirt"
                    />
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">Batagor</p>
                    <p>
                      <span class="text-muted">Topping: </span>None
                      <span class="text-muted">Tambahan: </span>None
                    </p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    >
                      <i class="fas fa-minus"></i>
                    </button>

                    <input
                      id="form1"
                      min="0"
                      name="quantity"
                      value="2"
                      type="number"
                      class="form-control form-control-sm"
                    />

                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"
                      ><i class="fas fa-trash fa-lg"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div
                  class="row d-flex justify-content-between align-items-center"
                >
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="/assets/nasgor1.png"
                      class="img-fluid rounded-3"
                      alt="Cotton T-shirt"
                    />
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">Kue Apem</p>
                    <p>
                      <span class="text-muted">topping: </span>None
                      <span class="text-muted">Tambahan: </span>None
                    </p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    >
                      <i class="fas fa-minus"></i>
                    </button>

                    <input
                      id="form1"
                      min="0"
                      name="quantity"
                      value="2"
                      type="number"
                      class="form-control form-control-sm"
                    />

                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"
                      ><i class="fas fa-trash fa-lg"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div
                  class="row d-flex justify-content-between align-items-center"
                >
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="/assets/nasgor1.png"
                      class="img-fluid rounded-3"
                      alt="Cotton T-shirt"
                    />
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">Nasi Bakar</p>
                    <p>
                      <span class="text-muted">Topping: </span>None
                      <span class="text-muted">Tambahan: </span>None
                    </p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    >
                      <i class="fas fa-minus"></i>
                    </button>

                    <input
                      id="form1"
                      min="0"
                      name="quantity"
                      value="2"
                      type="number"
                      class="form-control form-control-sm"
                    />

                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"
                      ><i class="fas fa-trash fa-lg"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div
                  class="row d-flex justify-content-between align-items-center"
                >
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="/assets/nasgor1.png"
                      class="img-fluid rounded-3"
                      alt="Cotton T-shirt"
                    />
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">Soto Kambing</p>
                    <p>
                      <span class="text-muted">Size: </span>M
                      <span class="text-muted">Color: </span>Grey
                    </p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    >
                      <i class="fas fa-minus"></i>
                    </button>

                    <input
                      id="form1"
                      min="0"
                      name="quantity"
                      value="2"
                      type="number"
                      class="form-control form-control-sm"
                    />

                    <button
                      class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"
                      ><i class="fas fa-trash fa-lg"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <button type="button" class="btn btn-warning btn-block btn-lg">
                  Buat Pesanan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
