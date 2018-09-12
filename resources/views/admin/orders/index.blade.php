@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Orders</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">Prix</th>
                <th scope="col">Créer le : </th>
                <th scope="col">Mis à Jour le :</th>
                <th scope="col">ID_Produit</th>
                <th scope="col">ID_Utilisateur</th>
                <th scope="col">État de la commande</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->price }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>{{ $order->product_id}}</td>
                <td>{{ $order->user_id}}</td>
                
                <td>
                    @if ($order->is_received) 
                    <span class="badge badge-info">Terminé</span> 
                    @else
                    <span class="badge badge-warning">En Cours</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.orders.edit', $order) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.orders.destroy', $order) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $orders->links() }}
@endsection
