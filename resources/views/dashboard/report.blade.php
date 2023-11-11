@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Report</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Export Report to PDF</h1>
            </div>
        </div>
        <!--/.row-->

        {{-- @if ($message = Session::get('success'))
            <div class="alert bg-teal" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ $message }}
            </div>
        @endif --}}
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="print_report" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="month" class="col-sm-2 col-form-label">Month</label>
                            <div class="col-sm-4">
                                <select name="month" id="month" class="form-control">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">Desecember</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Year</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="year" name="year" value="2022">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Export</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div><!-- /.panel-->
    </div>
    <!--/.main-->
@endsection();
