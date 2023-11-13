    @include('web.header')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(<?php echo url('web/assets/images/heading-6-1920x500.jpg'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{ strtoupper($product->name_product) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <br>
                        <img src="{{ $product->img_product }}" alt="" class="img-fluid wc-image">
                    </div>
                    <br>
                </div>

                <div class="col-md-6">
                    <form action="#" method="post" class="form">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Type</span>

                                    <strong class="pull-right">{{ strtoupper($product->type_product) }}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Categorie</span>

                                    <strong
                                        class="pull-right">{{ strtoupper($product->vendor->name_categorie) }}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Desc</span>

                                    <strong class="pull-right">{{ strtoupper($product->desc) }}</strong>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Price</span>

                                    <strong class="pull-right">{{ number_format($product->day_price) }}</strong>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Qty</span>

                                    <div class="d-flex pull-right align-items-center" style="height: 25px">
                                        <input type="number" class="form-control pull-right" style="text-align: right;" id="qty" name="qty" value="1" min="1">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Total Price</span>

                                    <strong class="pull-right"
                                        id="total-price">{{ number_format($product->day_price) }}</strong>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @php $modelT = new App\Models\User(); @endphp
    @php $check = $modelT->get_contact_details(); @endphp
    @php $bank = $modelT->get_bank(); @endphp
    @php $cek_pay = $modelT->cek_pay($product->id); @endphp
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        @auth
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal"
                                data-target="#exampleModal">
                                Order Now
                            </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order Now</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="contact-form">
                                            <form target="_blank" action="{{ url('transaction_add') }}" method="POST"
                                                id="contact">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <p>{{ Auth::user()->name }}</p>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <p>{{ Auth::user()->email }}</p>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <p> {{ Auth::user()->phone_number }}</p>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <fieldset>

                                                            <p>{{ Auth::user()->address }}</p>

                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <p>Product : {{ $product->name_product }}</p>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <fieldset>

                                                            <p>Price : {{ number_format($product->day_price) }}</p>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <p id="qty-book">Quantity : 1</p>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <fieldset>

                                                            <p id="total-book">Total Price :
                                                                {{ number_format($product->day_price) }}</p>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <p align="center"><strong><u>Information for payment</u></strong></p>
                                                @foreach ($bank as $b)
                                                    <p>Bank / An / Number : {{ $b->name_bank }} / {{ $b->an }}
                                                        /
                                                        {{ $b->no_rek }}</p>
                                                @endforeach
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="amount" value="{{ $product->day_price }}">
                                                <input type="hidden" name="quantity" id="qty-input" value="1">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @if ($cek_pay == 1)
                                            <p align="center">You Have Benn Order This product!</p>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">close</button>
                                        @else
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" onclick="submitForm()" style="cursor: pointer;"
                                                id="submit_form" class="btn btn-primary">Order Now</button>

                                            <img id="muter_beh" style="display: none"
                                                src="{{ url('admin/images/muter.gif') }}" class="img-circle w-56"
                                                style="margin-bottom: -7rem">
                                        @endif
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModalR">
                            Order Now
                        </button>
                    @endauth
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You are not logged in , register first</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form">
                        <form role="form" action="{{ url('register_customer') }}" method="POST">
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
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Address Of User">

                        </textarea>
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


    @include('web.footer')

    <script>
        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        jQuery(document).ready(function($) {
            let qty = 1;

            $("#qty").on('change', function() {
                qty = $(this).val();
                if (qty < 1) {
                    qty = 1;
                    $("#qty").val(qty);
                }
                var total = addCommas(qty * {{ $product->day_price }});
                $("#total-price").html(total);
                $("#qty-book").html('Quantity : ' + qty);
                $("#total-book").html('Total Price : ' + total);
                $("#qty-input").val(qty);
                adjustInputWidth(qty);
            });
        });
    </script>
