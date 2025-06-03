<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Auction Winner Certificate</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            padding: 30px;
            background: #fff;
        }
        .container {
            border: 2px solid #28a745;
            border-radius: 10px;
            padding: 20px;
        }
        h1 {
            color: #28a745;
            text-align: center;
        }
        .details {
            margin-top: 30px;
        }
        .details th, .details td {
            text-align: left;
            padding: 8px 12px;
        }
        .details th {
            background-color: #f1f1f1;
            width: 200px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Auction Winner Certificate</h1>
        <p>Congratulations, <strong>{{ $bid->user->name }}</strong>!</p>
        <p>You have won the auction for <strong>{{ $auction->title }}</strong>.</p>

        <table class="details">
            <tr>
                <th>Auction Title:</th>
                <td>{{ $auction->title }}</td>
            </tr>
            <tr>
                <th>Winning Amount:</th>
                <td>${{ number_format($bid->amount, 2) }}</td>
            </tr>
            <tr>
                <th>Auction End Date:</th>
                <td>{{ \Carbon\Carbon::parse($auction->end_date)->format('F j, Y, g:i A') }}</td>
            </tr>
            <tr>
                <th>Winner Email:</th>
                <td>{{ $bid->user->email }}</td>
            </tr>
        </table>

        <div class="footer">
            <p>Thank you for participating in Skynet Auctions!</p>
            <p>Generated on {{ \Carbon\Carbon::now()->format('F j, Y, g:i A') }}</p>
        </div>
    </div>
</body>
</html>
