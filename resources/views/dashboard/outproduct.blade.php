@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Transactions</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List of Transactions</h1>
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
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-b" id="tableok">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code Transaction</th>
                                    <th>Name Of Customers</th>
                                    <th>Name Of Product</th>
                                    <th>Amount</th>
                                    <th>Out date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $transaction->code_transaction }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $transaction->product->name_product }}</td>
                                        <td>{{ number_format($transaction->amount) }}</td>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>
                                            {{ $transaction->status_transaction }}
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
    </div>
    </div><!-- /.panel-->
    </div>
    <!--/.main-->
@endsection
