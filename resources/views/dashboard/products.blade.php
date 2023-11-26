@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Product</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Product</h1>
            </div>
        </div>
        <!--/.row-->

        @if ($message = Session::get('success'))
            <div class="alert bg-teal" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ $message }}
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#Addproduct">
                        Add Product
                    </button></p>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-b" id="tableok">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Name Of Product</th>
                                    <th>Type Of Product</th>
                                    <th>Style Number</th>
                                    <th>Color</th>
                                    <th>Dimension</th>
                                    <th>Price (USD)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $product->vendor->name_categorie }}</td>
                                        <td>{{ $product->name_product }}</td>
                                        <td>{{ $product->type_product }}</td>
                                        <td>{{ $product->style_number }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->dimension }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#Editproduct-{{ $product->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Deleteproduct-{{ $product->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @php $no++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
        <!--/.main-->

        <!-- The Modal -->
        <div class="modal" id="Addproduct">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('product_add') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Product Name</label>
                                    <input required class="form-control" name="name_product">
                                </div>

                                <div class="col-md-6">
                                    <label>Categorie Name</label>
                                    <select style="width: 100%" class="form-control js-example-basic-single"
                                        name="categorie_id">
                                        @foreach ($categories as $vd)
                                            <option value="{{ $vd->id }}">{{ $vd->name_categorie }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Type Of Product</label>
                                    <select style="width: 100%" class="form-control js-example-basic-single"
                                        name="type_product">
                                        <option value="Wood">Wood</option>
                                        <option value="Rattan">Rattan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Price (USD)</label>
                                    <input required type="text" class="form-control" name="price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Style Number</label>
                                    <input required type="text" class="form-control" name="style_number">
                                </div>


                                <div class="col-md-6">
                                    <label>Color</label>
                                    <input required type="text" class="form-control" name="color">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Image Of Product <small style="color: red">Recomended size height 366px width
                                            650px</small> </label>
                                    <input required type="file" class="form-control" name="img_product">
                                </div>

                                <div class="col-md-6">
                                    <label>Dimension</label>
                                    <input required class="form-control" name="dimension" >
                                </div>
                            </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($products as $product)
            <div class="modal" id="Editproduct-{{ $product->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Product</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form role="form" action="{{ url('product_update/' . $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product Name</label>
                                        <input required class="form-control" value="{{ $product->name_product }}"
                                            name="name_product" placeholder="Product Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Categorie Name</label>
                                        <select style="width: 100%" class="form-control js-example-basic-single"
                                            name="categorie_id">
                                            <option value="0">Choose Categorie</option>
                                            @foreach ($categories as $vd)
                                                <option value="{{ $vd->id }}"
                                                    {{ $product->categorie_id == $vd->id ? 'selected' : '' }}>
                                                    {{ $vd->name_categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type Of Product</label>
                                        <select style="width: 100%" class="form-control js-example-basic-single"
                                            name="type_product">
                                            <option value="0">Choose Type Of Product</option>
                                            <option value="Kayu"
                                                {{ $product->type_product == 'Kayu' ? 'selected' : '' }}>
                                                Kayu</option>
                                            <option value="Plastic"
                                                {{ $product->type_product == 'Rotan' ? 'selected' : '' }}>Rotan</option>
                                        </select>
                                    </div>


                                    <div class="col-md-6">
                                        <label>Price (USD)</label>
                                        <input required type="text" class="form-control"
                                            value="{{ $product->price }}" name="price">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Style Number</label>
                                        <input required type="text" class="form-control"
                                            value="{{ $product->style_number }}" name="style_number">
                                    </div>


                                    <div class="col-md-6">
                                        <label>Color</label>
                                        <input required type="text" class="form-control"
                                            value="{{ $product->color }}" name="color">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Image Of Product
                                            <small style="color: red">Recomended size height 366px width 650px</small>
                                        </label>
                                        <span class="col-md-12" style="padding: 0">If Have Been Change Imgae , click
                                            update For see update item!</span>

                                        <input type="file" class="form-control" name="img_product">
                                        <input type="hidden" name="old_img_product"
                                            value="{{ $product->img_product }}">

                                        <img src="{{ $product->img_product }}" style="width: 30%">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Dimension</label>
                                        <input required class="form-control" name="dimension" placeholder="dimension"
                                            value="{{ $product->dimension }}">
                                    </div>
                                </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal" id="Deleteproduct-{{ $product->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Product</h4>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h5>Are you sure you want to delete data, if the data is deleted it will also delete data
                                related to this data! this action cannot be canceled</h5>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="{{ url('product_delete/' . $product->id) }}" class="btn btn-info">Yes</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
