<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('web/assets/images/logo.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Tanamas</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ url('web/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/owl.css') }}">
    <script src="https://use.fontawesome.com/f2fc9ac3b2.js"></script>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2>Tanamas <em>Industry</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(<?php echo url('web/assets/images/bg-1.jpg'); ?>);">
        <div class="container">
            <div class="text-content d-flex align-items-center justify-content-center" style="gap: 30px">
                <div class="">
                    <img src="\web\assets\images\logo.png" alt="">
                </div>
                <div class="">
                    <h4>Tanamas Industry Comunitas </h4>
                    <h2>Rattan and Woody furniture </h2>
                </div>
            </div>
        </div>
    </div>



    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Login to order</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form">
                        @if ($message = Session::get('success'))
                            <div class="alert bg-teal" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em>
                                {{ $message }}
                            </div>
                        @endif
                        @php $modelT = new App\Models\User(); @endphp
                        @php $check = $modelT->get_contact(); @endphp
                        {{-- @php$fix = str_split($check);
                                                                                                                                                                                                    unset($fix[0]);
                                                                                                                                                                                                    $fix1 = implode('', $fix);
                                                                                                                                                                                                    $fix2 = '62' . $fix1;
                                                                                                                                                                        @endphp ?> ?> ?> ?> --}}
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="name"
                                            placeholder="Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input class="form-control" required placeholder="Password" name="password"
                                            type="password" value="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        OR
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#AddCustomer">
                                            Register
                                        </button>

                                    </fieldset>
                                </div>
                                <div class="notice-pass">
                                    If forgot the password, please contact administator on email: <a
                                        href="mailto:export@tanamasindustry.com">export@tanamasindustry.com</a>
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="AddCustomer">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                </div>

                <form role="form" action="{{ url('register_customer') }}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Name Of User</label>
                                    <input class="form-control" name="name" placeholder="Name Of User">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <label>Email Of User</label>
                                    <input class="form-control" name="email" placeholder="Email Of User">
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Password</label>
                                    <input type="password" class="form-control see_create" name="password"
                                        value="" placeholder="Password Of User">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <label>Phone Number</label>
                                    <input class="form-control" name="phone_number" placeholder="Phone Of User">
                                </fieldset>
                            </div>
                        </div>

                        <br>
                        <h5>Bill Address</h5>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Street Address</label>
                                    <input type="text" class="form-control see_create" name="bill_street_address"
                                        value="" placeholder="Streer Address">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <label>City</label>
                                    <input class="form-control" name="bill_city" placeholder="City">
                                </fieldset>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Province</label>
                                    <input type="text" class="form-control see_create" name="bill_province"
                                        value="" placeholder="Province">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <label>Postal Code</label>
                                    <input class="form-control" name="bill_postal_code" placeholder="Postall Code">
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <label>Country</label>
                                    <input type="text" class="form-control see_create" name="bill_country"
                                        value="" placeholder="Country">
                                </fieldset>
                            </div>
                        </div>

                        <br>
                        <h5>Shipping Address</h5>
                        <br>

                        <div class="row">
                            {{-- radio button same as bill address --}}
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true"
                                        id="isSameBillAddress" name="is_same_bill_address">
                                    <label class="form-check-label" for="isSameBillAddress">
                                        Address same as bill address
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div id="shippingAddress">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Street Address</label>
                                        <input type="text" class="form-control see_create"
                                            name="ship_street_address" value="" placeholder="Streer Address">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <label>City</label>
                                        <input class="form-control" name="ship_city" placeholder="City">
                                    </fieldset>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Province</label>
                                        <input type="text" class="form-control see_create" name="ship_province"
                                            value="" placeholder="Province">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Postal Code</label>
                                        <input class="form-control" name="ship_postal_code"
                                            placeholder="Postall Code">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <label>Country</label>
                                        <input type="text" class="form-control see_create" name="ship_country"
                                            value="" placeholder="Country">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('login') }}" class="btn btn-info">Login</a>
                        OR
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright © 2022 Tanamas Industry Comunitas</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('web/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Additional Scripts -->
    <script src="{{ url('web/assets/js/custom.js') }}"></script>
    <script src="{{ url('web/assets/js/owl.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#isSameBillAddress").click(function() {
                if ($(this).is(":checked")) {
                    $("#shippingAddress").hide();
                } else {
                    $("#shippingAddress").show();
                }
            });
        });
    </script>
</body>

</html>
