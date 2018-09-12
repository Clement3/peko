@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Voir l'utilisateur : {{ $user->email }}</h1>
</div>
    
<div class="row">
    <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $user->fullname() }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $user->created_at }}</h6>
                <p class="card-text">
                    <strong>E-mail :</strong> {{ $user->email }}</br>
                    <strong>Téléphone :</strong> {{ $user->phone }}
                </p>
                @if ($user->is_active)
                <a href="#" class="card-link">Désactiver</a>
                @else
                <a href="#" class="card-link">Activer</a>
                @endif
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
    <div class="col-sm-9">

    </div>
</div>
@endsection
