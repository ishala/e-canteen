<style>

</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Kursi Tersedia</h2>
            <div class="d-flex flex-wrap">
                <div class="seat" onclick="toggleSeat(this)" data-seat="1">1</div>
                <div class="seat occupied" data-seat="2">2</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="3">3</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="4">4</div>
                <div class="seat occupied" data-seat="5">5</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="6">6</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="7">7</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="8">8</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="9">9</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="10">10</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="11">11</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="12">12</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="13">13</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="14">14</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="15">15</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="16">16</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="17">17</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="18">18</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="19">19</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="20">20</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="21">21</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="22">22</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="23">23</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="24">24</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="25">25</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="26">26</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="27">27</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="28">28</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="29">29</div>
                <div class="seat" onclick="toggleSeat(this)" data-seat="30">30</div>
            </div>
        </div>

        <div class="col-md-6">
            <h2>Informasi Kursi</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Kursi</h5>
                    <p class="card-text">Anda memilih kursi nomor = (Nomor Kursi)</p>
                </div>
            </div>
            <a href="{{ route('buyer.confirm-orders') }}">
                <button class="btn btn-success next-btn">Lanjut Pembayaran</button>
            </a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const seats = document.querySelectorAll(".seat");

    seats.forEach((seat) => {
        seat.addEventListener("click", () => {
            if (!seat.classList.contains("occupied")) {
                seats.forEach((otherSeat) => {
                    otherSeat.classList.remove("selected");
                });
                seat.classList.add("selected");
                const seatNumber = seat.dataset.seat;
                document.getElementById(
                    "selected-seat"
                ).innerText = `Kursi yang dipilih: ${seatNumber}`;
            }
        });
    });

    function toggleSeat(seat) {
        if (seat.classList.contains("penuh")) {
            return;
        }

        seat.classList.toggle("selected");
    }
</script>

