<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>Data Table</h1>

<table id="customers">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Info</th>
        <th scope="col">Phone</th>
        <th scope="col">Photo</th>
    </tr>
    <tr>
    @php
        $no = 1;
    @endphp
    @foreach($data as $row)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->name }}</td>
            <td>{{ $row->jeniskelamin }}</td>
            <td>{{ $row->notelpon }}</td>
            <td>
                <img src="{{ asset('photos/' . $row->foto) }}" alt="" style="width: 40px;">
            </td>
        </tr>
        @endforeach
    </tr>

</table>

</body>
</html>


