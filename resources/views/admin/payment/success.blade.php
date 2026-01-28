<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-box {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .checkmark {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #43e97b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #fff;
        }

        .success-box h2 {
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .success-box p {
            color: #555;
            margin-bottom: 25px;
        }

        .details {
            text-align: left;
            margin-bottom: 20px;
        }

        .details div {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #ddd;
            font-size: 15px;
        }

        .details div:last-child {
            border-bottom: none;
        }

        .details span {
            color: #333;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #43e97b;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #2ecc71;
        }
    </style>
</head>
<body>

    <div class="success-box">
        <div class="checkmark">✔</div>

        <h2>Payment Successful</h2>
        <p>Your payment has been processed successfully.</p>

        <div class="details">
            <div>
                <span>Transaction ID</span>
                <span>{{$data->trxID}}</span>
            </div>
            <div>
                <span>Payment ID</span>
                <span>{{$data->amount}}</span>
            </div>
            <div>
                <span>Amount</span>
                <span>{{$data->paymentID}}</span>
            </div>
        </div>

        <a href="{{route('dashboard')}}" class="btn">Back to Home</a>
    </div>

</body>
</html>
