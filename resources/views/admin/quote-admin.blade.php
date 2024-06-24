@extends('layout.default')

@section('content')
<body>
    <div>
        <h1>Admin</h1>
    </div>

    <div class="container page-height-controller">
        <table class="table">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Quote #</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Lobster lbs</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Quote Details</th>
                        <th scope="col">Delete</th>
                    </tr>
            </thead>
            @foreach($quote as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->companyName}}</td>
                <td>{{$data->companyEmail}}</td>
                <td>{{$data->totalLiveLobsterPounds}}</td>
                <td>$ {{$data->finalCost}}</td>
                <td>
                    <a href="/admin/view/quote/{{$data->id}}" class="btn btn-primary details-btn">Details</a>
                </td>
                <td>
                     <a href="/delete/{{$data->id}}" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>
</body>
@stop