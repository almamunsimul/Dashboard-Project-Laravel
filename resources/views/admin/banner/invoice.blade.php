<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Colorful Table</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            padding: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }

        /* Table Title */
        .table-title {
            background: linear-gradient(90deg, #ff5722, #ff9800);
            color: #ffffff;
            font-size: 22px;
            padding: 15px;
            text-align: center;
        }

        /* Table Header */
        th {
            background-color: #3f51b5;
            color: #ffffff;
            padding: 12px;
            border: 1px solid #ddd;
            text-transform: uppercase;
        }

        /* Table Data */
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Zebra Rows */
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) td {
            background-color: #ffffff;
        }

        /* Result Colors */
        .pass {
            color: green;
            font-weight: bold;
        }

        .fail {
            color: red;
            font-weight: bold;
        }

        /* Hover Effect */
        tr:hover td {
            background-color: #e3f2fd;
        }
    </style>
</head>

<body>

    <table>
        <!-- Table Name -->
        <tr>
            <th colspan="5" class="table-title">
                All Banner Information
            </th>
        </tr>

        <!-- Table Header -->
        <tr>
            <th>Banner Title</th>
            <th>Banner SubTitle</th>
            <th>Banner Button</th>
            <th>Banner Image</th>
        </tr>

        <!-- Table Rows -->
        @forelse($bandata as $data)
            <tr>
                <td>{{ Str::limit($data->ban_title, 30) }}</td>
                <td>{{ Str::limit($data->ban_subtitle, 50) }}</td>
                <td><a href="{{ $data->ban_url }}" target="_blank" class="btn btn-secondary">{{ $data->ban_btn }}</td>
                {{-- <td>
                  @if (!empty($data->ban_image))
                  @php
                      $path=public_path('uploads/banner/'.$data->ban_image);
                      $base64= file_exists($path)? base64_encode(file_get_contents($path)):'';
                  @endphp
                  <img width="100" src="data:image/png; base64, {{$base64}}" class="img-fluid" alt="">
                  @else

                  @php
                      $path=public_path('uploads/default/default.png');
                      $base64= file_exists($path)? base64_encode(file_get_contents($path)):'';
                  @endphp
                  <img width="100" src="data:image/png; base64, {{$base64}}" class="img-fluid" alt="">
                  @endif

                </td> --}}

                <td>
                    @php
                        $path = $data->ban_image
                            ? public_path('uploads/banner/' . $data->ban_image)
                            : public_path('uploads/default/default.png');
                    @endphp

                    @if (file_exists($path))
                        <img width="100" src="{{ $path }}" alt="">
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td>No Banner Found</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
