@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Voir l'utilisateur : {{ $user->email }}</h1>
</div>
    
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->fullname() }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $user->created_at }}</h6>
                <p class="card-text">
                    <strong>E-mail :</strong> {{ $user->email }}</br>
                    <strong>Téléphone :</strong> {{ $user->phone }}
                </p>

                <a href="{{ route('admin.users.active', $user) }}" class="card-link">
                    @if ($user->is_active)
                    Activer
                    @else
                    Désactiver
                    @endif
                </a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <h3>Dernières commandes</h3>
        @if ($user->orders->isEmpty())
        <div class="alert alert-primary" role="alert">
            {{ $user->fullname() }} n'a pas encore fait de commande !
        </div> 
        @else       
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Créer le</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->price }} €</td>
                    <td>
                        @if ($order->is_received)
                        <span class="badge badge-success">Reçu</span> 
                        @else
                        <span class="badge badge-warning">En cours</span> 
                        @endif
                    </td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
