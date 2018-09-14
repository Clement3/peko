@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Voir l'étiquette produit :</h1>
</div>

    {{-- <ul>
        <li>{{$label->social_reason}}</li>
        <li>{{$label->siret}}</li>
        <li>{{$label->company_name}}</li>
        <li>{{$label->tva_intracommunity}}</li>
    </ul> --}}

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $label->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $label->created_at }}</h6>
                <p class="card-text">
                    <strong>Image :</strong> {{ $label->picture }} </br>  
                    <strong>Descriptif :</strong> {{ $label->body }} </br>
                    <strong>Recette :</strong> {{ $label->recipe }}
                </p>
            </div>
        </div>
    </div>
 
@endsection
