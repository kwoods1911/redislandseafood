<body>
    <h1>Hello {{$name}}</h1>
    @component('mail::message')
    <p>Below is you message we will reply to the message within 24 hours !</p>
    <span>Name: {{$name}}</span>
    @endcomponent
</body>