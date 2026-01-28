<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6ff;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 700px;
            width: 90%;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 30px;
        }


        .invoice-title {
            text-align: center;
            font-size: 28px;
            color: #1e3c72;
            margin-bottom: 20px;
            text-transform: uppercase;
            border-bottom: 3px solid #1e3c72;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background-color: #1e3c72;
            color: #ffffff;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #bfc7d1;   /* outer border */
        }

        .invoice-table td {
            padding: 10px 15px;
            /* border-bottom: 1px solid #ddd; */
            border: 1px solid #d5dbe3;   /* inner borders */
            vertical-align: top; /* ⭐ THIS FIXES BREAKING */
        }

        .invoice-table .label {
            width: 100px;          /* fixed left column */
            font-weight: bold;
            white-space: nowrap;  /* prevent breaking */
        }

        .invoice-table .value {
            word-wrap: break-word;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        table tr:nth-child(even) {
            background-color: #f2f6ff;
        }

        table tr:hover {
            background-color: #e0eaff;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="invoice-container">

        <div class="invoice-title">
            Banner Information
        </div>

        <table class="invoice-table">
            <tr>
                <th class="label">Label</th>
                <th class="value">Details</th>
            </tr>
            <tr>
                <td class="label">Banner Title</td>
                <td class="value">{{$data->ban_title}}</td>
            </tr>
            <tr>
                <td class="label">Banner SubTitle</td>
                <td class="value">{{$data->ban_subtitle}}</td>
            </tr>
            <tr>
                <td class="label">Banner Button</td>
                <td class="value"><a href="{{$data->ban_url}}" target="_blank" class="btn btn-secondary">{{$data->ban_btn}}</a></td>
            </tr>
            <tr>
                <td class="label">Banner Creator</td>
                <td>{{$data->CreatorInfo->name}}</td>
            </tr>
            <tr>
                <td class="label">Banner Editor</td>
                <td class="value"> 
                    @if (!empty ($data->EditorInfo->name))
                      {{$data->EditorInfo->name}}
                    @else
                      Not Edited Yet
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Banner Image</td>
                <td class="value"> 
                    @php
                        $path = $data->ban_image
                            ? public_path('uploads/banner/' . $data->ban_image)
                            : public_path('uploads/default/default.png');
                    @endphp

                    @if (file_exists($path))
                        <img width="300" src="{{ $path }}" alt="">
                    @endif
                </td>
            </tr>
        </table>

        <div class="footer">
            Thank you for visiting us!
        </div>

    </div>

</body>
</html>
