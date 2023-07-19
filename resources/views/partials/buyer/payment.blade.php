<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" col-lg-6 col-md-8">
            <div class="card p-3">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="heading text-center">Metode Pembayaran</h2>
                    </div>
                </div>
                <div class="row justify-content-center mb-4 radio-group">
                    <div class="col-sm-3 col-5">
                        <div class="radio mx-auto" data-value="dana"> <img class="fit-image"
                                src="https://i.pinimg.com/originals/2b/1f/11/2b1f11dec29fe28b5137b46fffa0b25f.png"
                                width="105px" height="55px"></div>
                        <h6 style="margin-left: 20px;">Dana</h6>
                    </div>
                    <div class="col-sm-3 col-5">
                        <div class="radio mx-auto" data-value="ovo"> <img class="fit-image"
                                src="https://media.suara.com/pictures/336x188/2022/09/26/32697-logo-e-wallet-ovo-apple-app-store.jpg"
                                width="105px" height="55px"></div>
                        <h6 style="margin-left: 30px;">OVO</h6>
                    </div>
                    <div class="col-sm-3 col-5">
                        <div class="radio mx-auto" data-value="shopeepay"> <img class="fit-image"
                                src="https://blog.bangbeli.com/wp-content/uploads/2023/01/logo-sopipey.jpg"
                                width="10px" height="55px"></div>
                        <h6 style="margin-left: 15px;">Shoopee</h6>
                    </div>
                    <div class="col-sm-3 col-5">
                        <div class="radio mx-auto" data-value="banktransfer"> <img class="fit-image"
                                src="https://www.seekpng.com/png/detail/133-1339436_bank-wire-transfer-icon.png"
                                width="65px" height="55px"> </div>
                        <h6 style="margin-right: 10px;">Bank Transfer</h6>
                    </div> <br>
                </div>

                <form action="{{ route('buyer.confirm-orders-process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaction" id="" value="{{ $transaction }}">
                    <input type="hidden" name="seatNumber" id="" value="{{ $seatNumber }}">
                    <input type="hidden" name="payment" id="payment">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-danger">Bayar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.radio').click(function() {
            let payment = $(this).data('value');
            console.log(payment);

            if (!$(this).hasClass('selected')) {
                $('.radio').removeClass('selected');
                $(this).addClass('selected');
            }

            $('#payment').val(payment);
        });
    });
</script>
