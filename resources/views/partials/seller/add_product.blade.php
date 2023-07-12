<form action="{{ route('seller.add-product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="py-5 pt-1">
        <h2 class="text-center fs-2">Tambahkan Produk</h2>
        <div class="container d-flex flex-row wadah">
            <div class="d-flex flex-column">
                <div class="box p-1 mt-5">
                    <img src="/assets/empty-picture.png" alt="" id="gambar">
                </div>
                <div class="mt-3">
                    <input class="form-control" type="file" id="formFile" name="picture">
                </div>
            </div>
            <div class="container col-7 px-4 px-lg-5 my-5 mt-3 submitter d-flex flex-row">
                <div class="formulir">
                    <div class="d-flex flex-row">
                        <div class="mb-3 col-9 name">
                            <label for="name" class="form-label fw-bold">Nama Produk:</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>
                        <div class="mb-3 ms-2 col-3 category">
                            <label for="category" class="form-label fw-bold">Kategori:</label>
                            <select class="form-select" id="category" name="category">
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                                <option value="3">Topping</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Harga:</label>
                        <input type="text" class="form-control" id="price" name="price" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Deskripsi:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger" id="tambahBtn">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </section>

</form>
