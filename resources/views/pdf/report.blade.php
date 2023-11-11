<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .tittleReport {
            text-align: center;
        }

        h3 {
            text-transform: uppercase;
        }

        table {
            width: 100%;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #535353;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="tittleReport">
        <h3>PT. Tanamas Industry Comunitas</h3>
        <h4>Laporan Penjualan</h4>
        <h5>Periode {{ $monthName }} {{ $year }}</h5>
    </div>


    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Code transaction</th>
                <th>Name of customers</th>
                <th>Name of product</th>
                <th>Amount</th>
                <th>Out date</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($transactions as $car)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $car->code_transaction }}</td>
                    <td>{{ $car->user->name }}</td>
                    <td>{{ $car->car->name_product }}</td>
                    <td>{{ number_format($car->amount) }}</td>
                    <td>{{ $car->transaction_date }}</td>
                </tr>
                @php $no++; @endphp
            @endforeach
        </tbody>
    </table>

</body>

</html>
