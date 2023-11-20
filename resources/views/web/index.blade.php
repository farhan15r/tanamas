@include('web.header')


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

<div class="products">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                @php $modelT = new App\Models\User(); @endphp
                @foreach ($products as $product)
                    @php $data = $modelT->cek_booked($product->id); @endphp
                    <div class="col-md-4 my-5">
                        <div class="card ml-auto mr-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $product->img_product }}" alt="">
                            <div class="card-body">
                                <h5 align="center" class="card-title">{{ $product->name_product }}</h5>

                                <p align="center"><a href="{{ url('product_detail/' . $product->id) }}"
                                        class="btn btn-info btn-sm">Detail</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="Booked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This car have been booked</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-form">
                    <p>This Product have been booked , and wil bee ready again if the booked before not pay the invoice
                        !</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Sold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This Product have been sold</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-form">
                    <p>This Product have been sold</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.footer')
