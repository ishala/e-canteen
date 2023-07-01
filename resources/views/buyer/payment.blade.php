<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $style }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>{{ $title }}</title>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand" style="background-color: #ebffec; height: 70px">
        <div class="container-fluid">
            <img src="../pembayaran/images/Logo.png" alt="Logo" style="width: 130px; height: auto" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" col-lg-6 col-md-8">
                <div class="card p-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="heading text-center">Metode Pembayaran</h2>
                        </div>
                    </div>
                    <form class="form-card">
                        <div class="row justify-content-center mb-4 radio-group">
                            <div class="col-sm-3 col-5">
                                <div class="radio selected mx-auto" data-value="dana"> <img class="fit-image"
                                        src="https://i.pinimg.com/originals/2b/1f/11/2b1f11dec29fe28b5137b46fffa0b25f.png"
                                        width="105px" height="55px"></div>
                                <h6>Dana</h6>
                            </div>
                            <div class="col-sm-3 col-5">
                                <div class="radio mx-auto" data-value="ovo"> <img class="fit-image"
                                        src="https://media.suara.com/pictures/336x188/2022/09/26/32697-logo-e-wallet-ovo-apple-app-store.jpg"
                                        width="105px" height="55px"></div>
                                <h6>Ovo</h6>
                            </div>
                            <div class="col-sm-3 col-5">
                                <div class="radio mx-auto" data-value="shopeepay"> <img class="fit-image"
                                        src="https://blog.bangbeli.com/wp-content/uploads/2023/01/logo-sopipey.jpg"
                                        width="120px" height="55px"></div>
                                <h6>shopeepay</h6>
                            </div>
                            <div class="col-sm-3 col-5">
                                <div class="radio mx-auto" data-value="banktransfer"> <img class="fit-image"
                                        src="https://www.seekpng.com/png/detail/133-1339436_bank-wire-transfer-icon.png"
                                        width="65px" height="55px"> </div>
                                <h6>Bank Transfer</h6>
                            </div> <br>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="alamat email"
                                        placeholder="xxxx@gmail.com"> <label>Email</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" id="cr_no" name="card-no"
                                        placeholder="0000 0000 0000 0000" minlength="19" maxlength="19"> <label>Card
                                        Number or Handphone Number</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group"> <input type="text" id="exp" name="expdate"
                                                placeholder="MM/YY" minlength="5" maxlength="5"> <label>Expiry
                                                Date</label> </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group"> <input type="password" name="cvv"
                                                placeholder="●●●" minlength="3" maxlength="3"> <label>CVV</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12"> <input type="submit" value="Bayar Sekarang"
                                    class="btn btn-pay placeicon"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            //For Card Number formatted input
            var cardNum = document.getElementById('cr_no');
            cardNum.onkeyup = function(e) {
                if (this.value == this.lastValue) return;
                var caretPosition = this.selectionStart;
                var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
                var parts = [];
                for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
                    parts.push(sanitizedValue.substring(i, i + 4));
                }
                for (var i = caretPosition - 1; i >= 0; i--) {
                    var c = this.value[i];
                    if (c < '0' || c > '9') {
                        caretPosition--;
                    }
                }
                caretPosition += Math.floor(caretPosition / 4);
                this.value = this.lastValue = parts.join('-');
                this.selectionStart = this.selectionEnd = caretPosition;
            }
            //For Date formatted input
            var expDate = document.getElementById('exp');
            expDate.onkeyup = function(e) {
                if (this.value == this.lastValue) return;
                var caretPosition = this.selectionStart;
                var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
                var parts = [];
                for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
                    parts.push(sanitizedValue.substring(i, i + 2));
                }
                for (var i = caretPosition - 1; i >= 0; i--) {
                    var c = this.value[i];
                    if (c < '0' || c > '9') {
                        caretPosition--;
                    }
                }
                caretPosition += Math.floor(caretPosition / 2);
                this.value = this.lastValue = parts.join('/');
                this.selectionStart = this.selectionEnd = caretPosition;
            }
            // Radio button
            $('.radio-group .radio').click(function() {
                $(this).parent().parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
        })
    </script>
</body>

</html>
