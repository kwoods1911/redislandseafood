<body>
    <h1>Email from {{$name}}</h1>
    @component('mail::message')
    <span>Name: {{$name}}</span>
    <br>
    <span>{{ $email }}</span>
    <br>
    <p>{{$message}}</p>
    @endcomponent
</body>