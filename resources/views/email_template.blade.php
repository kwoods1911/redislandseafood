<body>
    <h1>Email from {{$name}}</h1>
    @component('mail::message')

    <span>Name: {{$name}}</span>
    <span>{{ $email }}</span>
    <p>{{$message}}</p>
    @endcomponent
</body>