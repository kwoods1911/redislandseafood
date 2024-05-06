


<div id="#">@ Copyright 2017 Red Island Seafood</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="collapse navbar-collapse" id="navbarNav">
    <!-- If user is an Admin then display information -->
    <ul class="navbar-nav">
        <li>
            @auth
            <!-- if user is admin then show quotes link -->
                @php
                if(auth()->user()->is_admin){
                    echo '<a href="/admin">View Quotes</a>';
                }
                @endphp
            @endauth
        </li>
    </ul>
</div>
    
</nav>

