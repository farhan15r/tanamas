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
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $transaction->code_transaction }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->product->name_product }}</td>
                    <td>{{ number_format($transaction->amount) }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                </tr>
                @php $no++; @endphp
            @endforeach
        </tbody>
    </table>

</body>

</html>
