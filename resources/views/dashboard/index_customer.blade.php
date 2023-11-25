@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">User Customer</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List User Customer</h1>
            </div>
        </div><!--/.row-->

        @if ($message = Session::get('success'))
            <div class="alert bg-teal" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ $message }}
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#AddCustomer">
                        Add User Customer
                    </button></p>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-b" id="tableok">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Of user</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Bill Address</th>
                                    <th>Ship Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($users as $user)
                                    @php
                                        $bill_address = $user->billing_address->street_address . ', ' . $user->billing_address->city . ', ' . $user->billing_address->province . ', ' . $user->billing_address->country . ', ' . $user->billing_address->postal_code;

                                        $ship_address = $user->shipping_address->street_address . ', ' . $user->shipping_address->city . ', ' . $user->shipping_address->province . ', ' . $user->shipping_address->country . ', ' . $user->shipping_address->postal_code;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $bill_address }}</td>
                                        <td>{{ $ship_address }}</td>
                                        <td width="15%">
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#Editcustomer-{{ $user->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Deletecustomer-{{ $user->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @php $no++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.panel-->
    </div> <!--/.main-->

    <!-- The Modal -->
    <div class="modal" id="AddCustomer">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New user</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" action="{{ url('customer_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name Of User</label>
                            <input class="form-control" name="name" placeholder="Name Of User">
                        </div>

                        <div class="form-group">
                            <label>Email Of User</label>
                            <input class="form-control" name="email" placeholder="Email Of User">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control see_create" name="password" value=""
                                placeholder="Password Of User">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" name="phone_number" placeholder="Phone Of User">
                        </div>

                        <br>
                        <h5>Bill Address</h5>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Street Address</label>
                                    <input type="text" class="form-control see_create" name="bill_street_address"
                                        placeholder="Streer Address">
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
                                        placeholder="Province">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <label>Postal Code</label>
                                    <input class="form-control" name="bill_postal_code" placeholder="Postall Code"
                                        </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <label>Country</label>
                                    <input type="text" class="form-control see_create" name="bill_country"
                                        placeholder="Country">
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
                                        id="isSameBillAddress{{ $user->id }}" name="is_same_bill_address">
                                    <label class="form-check-label" for="isSameBillAddress{{ $user->id }}">
                                        Address same as bill address
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div id="shippingAddress{{ $user->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Street Address</label>
                                        <input type="text" class="form-control see_create" name="ship_street_address"
                                            placeholder="Streer Address">
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
                                            placeholder="Province">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Postal Code</label>
                                        <input class="form-control" name="ship_postal_code" placeholder="Postall Code">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <label>Country</label>
                                        <input type="text" class="form-control see_create" name="ship_country"
                                            placeholder="Country">
                                    </fieldset>
                                </div>
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

    @foreach ($users as $user)
        <div class="modal" id="Editcustomer-{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit user</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('customer_update/' . $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name Of User</label>
                                <input class="form-control" value="{{ $user->name }}" name="name"
                                    placeholder="Name Of User">
                            </div>

                            <div class="form-group">
                                <label>Email Of User</label>
                                <input class="form-control" value="{{ $user->email }}" name="email"
                                    placeholder="Email Of User">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control see_update" name="password"
                                    placeholder="Password Of User">

                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="phone_number" placeholder="Phone Of User"
                                    value="{{ $user->phone_number }}">
                            </div>

                            <br>
                            <h5>Bill Address</h5>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Street Address</label>
                                        <input type="text" class="form-control see_create" name="bill_street_address"
                                            value="{{ $user->billing_address->street_address }}"
                                            placeholder="Streer Address">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <label>City</label>
                                        <input class="form-control" name="bill_city" placeholder="City"
                                            value="{{ $user->billing_address->city }}">
                                    </fieldset>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Province</label>
                                        <input type="text" class="form-control see_create" name="bill_province"
                                            value="{{ $user->billing_address->province }}" placeholder="Province">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <label>Postal Code</label>
                                        <input class="form-control" name="bill_postal_code" placeholder="Postall Code"
                                            value="{{ $user->billing_address->postal_code }}">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <label>Country</label>
                                        <input type="text" class="form-control see_create" name="bill_country"
                                            value="{{ $user->billing_address->country }}" placeholder="Country">
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
                                            id="isSameBillAddress{{ $user->id }}" name="is_same_bill_address"
                                            {{ $user->shipping_address_id == $user->billing_address_id ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isSameBillAddress{{ $user->id }}">
                                            Address same as bill address
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div id="shippingAddress{{ $user->id }}"
                                {{ $user->shipping_address_id == $user->billing_address_id ? 'hidden' : '' }}>
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>Street Address</label>
                                            <input type="text" class="form-control see_create"
                                                name="ship_street_address"
                                                value="{{ $user->shipping_address->street_address }}"
                                                placeholder="Streer Address">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>City</label>
                                            <input class="form-control" name="ship_city" placeholder="City"
                                                value="{{ $user->shipping_address->city }}">
                                        </fieldset>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>Province</label>
                                            <input type="text" class="form-control see_create" name="ship_province"
                                                value="{{ $user->shipping_address->province }}" placeholder="Province">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>Postal Code</label>
                                            <input class="form-control" name="ship_postal_code"
                                                value="{{ $user->shipping_address->postal_code }}"
                                                placeholder="Postall Code">
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <label>Country</label>
                                            <input type="text" class="form-control see_create" name="ship_country"
                                                value="{{ $user->shipping_address->country }}" placeholder="Country">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="Deletecustomer-{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete user</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to
                            this data! this action cannot be canceled</h5>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="{{ url('customer_delete/' . $user->id) }}" class="btn btn-info">Yes</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ url('web/vendor/jquery/jquery.min.js') }}"></script>

        <script>
            $(document).ready(function() {

                $('#isSameBillAddress' + {{ $user->id }}).click(function() {
                    if ($(this).is(":checked")) {
                        $("#shippingAddress" + {{ $user->id }}).hide();
                    } else {
                        $("#shippingAddress" + {{ $user->id }}).show();
                    }
                });
            });
        </script>
    @endforeach
@endsection
