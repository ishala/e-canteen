<script>
    $(document).ready(function() {
            $('#editBtn').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#product');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('seller.update-product', ['product' => $product]) }}");
                // Kirimkan formulir secara manual
                form.submit();
            });
            $('#deleteBtn').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#product');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('seller.delete-product', ['product' => $product]) }}");
                // Kirimkan formulir secara manual
                form.submit();
            });
        });
</script>

<form action="{{ route('seller.add-product') }}" method="POST" id="product" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="oldPicture" value="{{ $product->picture }}">
<section class="py-5 pt-1">
    <h2 class="text-center fs-2">Edit Produk</h2>
    <div class="container d-flex flex-row wadah">
        <div class="d-flex flex-column">
            <div class="box p-1 mt-5">
                <img src="{{ asset('storage/' . $product->picture) }}" alt="" id="gambar">
            </div>
            <div class="mt-3">
                <input class="form-control" type="file" id="formFile" name="picture">
            </div>
        </div>
        <div class="container col-7 px-4 px-lg-5 my-5 mt-3 submitter d-flex flex-row">
                <div class="formulir">
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <div class="d-flex flex-row">
                        <div class="mb-3 col-9 name">
                            <label for="name" class="form-label fw-bold">Nama Produk:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" />
                        </div>
                        <div class="mb-3 ms-2 col-3 category">
                            <label for="category" class="form-label fw-bold">Kategori:</label>
                            <select class="form-select" id="category" name="category">
                                <option value="1" {{ $product->category == 1 ? 'selected' : '' }}>Makanan</option>
                                <option value="2" {{ $product->category == 2 ? 'selected' : '' }}>Minuman</option>
                                <option value="3" {{ $product->category == 3 ? 'selected' : '' }}>Topping</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Harga:</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ number_format($product->price, 0, ',', '.') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Deskripsi:</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button type="submit" class="btn btn-warning text-dark " id="editBtn">
        Edit
    </button>
    <button type="submit" class="btn btn-danger text-white " id="deleteBtn">
        Delete
    </button>
</section>
