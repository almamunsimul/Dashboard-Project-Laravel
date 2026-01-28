<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 95%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #4facfe;
            box-shadow: 0 0 5px rgba(79, 172, 254, 0.5);
        }

        .form-group textarea {
            resize: none;
            height: 80px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #4facfe;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #00c6ff;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Payment Details</h2>

        <form method="POST" action="{{ route('bkash.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Amount</label>
                <input type="number" placeholder="Enter amount" name="amount">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Enter your name" name="name">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="tel" placeholder="Enter phone number" name="phone">
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea placeholder="Enter address" name="address"></textarea>
            </div>

            <button class="submit-btn">Submit</button>
        </form>
    </div>

</body>
</html>
