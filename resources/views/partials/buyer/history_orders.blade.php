<div>
    <div class="container mt-4 h-50 w-25 rounded-pill shadow-sm">
        <p class="title"><b>Riwayat Pesanan</b></p>
    </div>

    @foreach ($transactions as $transact)    
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col gambar image-with-text">
                <img src="/assets/nasgor1.png" class="mt-5">
                <div class="d-flex flex-column mt-5">
                    <div class="row">
                        <p class="fs-4">{{ $transact->product->name }}</p>
                    </div>
                    <div class="row">
                        <p>{{ $transact->seller->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <p style="margin-top:80px; font-size:20px;">{{ $createdDate }}</p>
            </div>
            <div class="col btn">
                <p style="margin-right:280px; font-size:20px;"
                @if($transact->status == 'done') class="text-success fw-bold" @endif
                @if($transact->status == 'offering') class="text-primary fw-bold" @endif
                class="text-danger fw-bold"
                >{{ strtoupper($transact->status) }}</p>
                <button type="button" class="btn btn-outline-danger rounded-pill">Pesan Lagi</button>
            </div>
        </div>
    </div>
    <hr class="garis" width="50%">
    @endforeach

</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
