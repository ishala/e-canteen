<script>
    $(document).ready(function() {
        $('.seat').click(function() {
            const seat = $(this);
            let seatNumber = seat.data("seat");

            if (!seat.hasClass("occupied")) {
                $(".seat").removeClass("selected");
                seat.addClass("selected");
                $("#selected-seat").text(`Kursi yang dipilih: ${seatNumber}`);
            }

            console.log(seatNumber);
            $('#seatNumber').text(seatNumber);
            $('#seat').val(seatNumber);
        });
    });
</script>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Meja Tersedia</h2>
            <div class="d-flex flex-wrap">
                <div class="seat" data-seat="1">1</div>
                <div class="seat" data-seat="2">2</div>
                <div class="seat" data-seat="3">3</div>
                <div class="seat" data-seat="4">4</div>
                <div class="seat" data-seat="5">5</div>
                <div class="seat" data-seat="6">6</div>
                <div class="seat" data-seat="7">7</div>
                <div class="seat" data-seat="8">8</div>
                <div class="seat" data-seat="9">9</div>
                <div class="seat" data-seat="10">10</div>
                <div class="seat" data-seat="11">11</div>
                <div class="seat" data-seat="12">12</div>
                <div class="seat" data-seat="13">13</div>
                <div class="seat" data-seat="14">14</div>
                <div class="seat" data-seat="15">15</div>
                <div class="seat" data-seat="16">16</div>
                <div class="seat" data-seat="17">17</div>
                <div class="seat" data-seat="18">18</div>
                <div class="seat" data-seat="19">19</div>
                <div class="seat" data-seat="20">20</div>
                <div class="seat" data-seat="21">21</div>
                <div class="seat" data-seat="22">22</div>
                <div class="seat" data-seat="23">23</div>
                <div class="seat" data-seat="24">24</div>
                <div class="seat" data-seat="25">25</div>
                <div class="seat" data-seat="26">26</div>
                <div class="seat" data-seat="27">27</div>
                <div class="seat" data-seat="28">28</div>
                <div class="seat" data-seat="29">29</div>
                <div class="seat" data-seat="30">30</div>
            </div>
        </div>

        <div class="col-md-6">
            <h2>Informasi Kursi</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Kursi</h5>
                    <p class="card-text">Anda memilih kursi nomor = <span id="seatNumber">tidak ada</span></p>
                </div>
            </div>
            <form action="{{ route('buyer.payment-process') }}" method="POST">
                @csrf
                {{-- bawa nilai seat --}}
                <input type="hidden" name="seatNumber" id="seat">
                {{-- bawa nilai id transaksi dari tampilan keranjang --}}
                <input type="hidden" name="cartIds" value="{{ $transaction }}">
                <button type="submit" class="btn btn-success next-btn">Lanjut Pembayaran</button>
            </form>
        </div>
    </div>
</div>
