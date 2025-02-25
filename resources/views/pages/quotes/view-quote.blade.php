<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="#">My Quotes</a>
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="#">My Orders</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


        <span>
            Company Information
        </span>

        
@if(count($quotes) !==0 )
        

<table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8">
    <thead class="table-header-group">
    <tr class="table-row text-left">
         <th>Ouote #</th>
        <th>Date</th>
        <th>Lobster (lbs)</th>
        <th>Clam Meat (lbs)</th>
        <th>Shrimp(lbs)</th>
        <th>Price</th>
        <th>Actions</th> 
        <th>Delete</th>   
    </tr>

    </thead>
<tbody>

@foreach($quotes as $quote)
    <tr>
        <td>{{$quote->id}}</td>
        <td>{{ $quote->created_at}}</td>
        <td>{{ $quote->totalLiveLobsterPounds + $quote->totalFrozenLobsterPounds }}</td>
        <td>{{ $quote->clamMeatPounds }}</td>
        <td>{{ $quote->shrimpMeatPounds}}</td>
        <td>$ {{ $quote->finalCost}}</td>

        <td>
            <div>
                <a href="#">View Details</a>
                <a href="#">Download</a>
                <a href="#">Edit</a>
            </div>
        </td>
        <td>
            <div>
                <a href="#">Delete</a>
            </div>
        </td>
    </tr>

@endforeach
</tbody>
  
</table>

@else
<div class="mb-8 flex justify-center">
            <p class="text-2xl">No quotes found.</p>
        </div>     
@endif
          

         
        </div>
    </div>
</x-app-layout>
