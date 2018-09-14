@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Panneau d'administration</h1>
</div>

<div class="container">
    <div class="row">
        <div class="card w-100">
            <div class="card-header">Commande en cours</div>
            <div class="card-body">
            @include('partials/_alert')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Prix : </th>
                                <th scope="col">Produits : </th>
                                <th scope="col">Créer le : </th>
                                <th scope="col">Client : </th>
                                <th scope="col">Adresse : </th>
                                <th scope="col">État</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ totalPrice($order->products) }}€ TTC</td>
                                <td>{{ sizeof($order->products) }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $order->user->firstname }} {{ $order->user->lastname }}</td>
                                <td>{{ $order->user->address->address }}, {{ $order->user->address->postal_code }}, {{ $order->user->address->city }}</td>
                                
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
            </div>
        </div>
    </div>
</div>
@endsection