@extends('layout.default')

@section('content')
<body>

<div>
    <h1>Quote Summary</h1>

    <div>
        <h3>Quote # </h3>
        <table>
            <tr>
                <th>Company Name</th>
        </tr>
        </table>
    </div>
    <p>{{ $information->companyName }}</p>
</div>
</body>


@stop