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
                <div class="card-columns">
                    @foreach($orders as $order)
                    <a href="#" class="text-dark cmd_modal">
                    <div class="card">
                        <div class="card-header">
                            Commande n°{{ $order->id }}
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Produits</th>
                                        <th scope="col">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->product->title }}</th>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row">Etat</th>
                                        <td>@if ($order->is_received) 
                                            <span class="mr-1 badge badge-info">Terminé</span> 
                                            @else
                                            <span class="mr-1 badge badge-warning">En Cours</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@component('test/dashboard_modal')
@endcomponent
@endsection