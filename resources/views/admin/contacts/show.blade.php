@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap fle
x-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Message de {{ $contact->email}}</h1>
</div>

<div class="row">
     
    <div class="col-sm-6">
        <div class="card">
            <div class="card-message">
                <h5 class="card-email">Message</h5>
                <h6 class="card-subemail mb-2 text-muted">{{ $contact->created_at }}</h6>
                <p class="card-text">
                    <strong>Nom du contact :</strong> {{ $contact->fullname }} </br>
                    <strong>Objet :</strong> {{ $contact->object }}</br>
                    <strong>Message :</strong> {{ $contact->message }}
                </p>
            </div>
        </div>
    </div>
 
    
    
    <div class="col-sm-6">
        <div class="card">
            <div class="card-message">
                    <h1 class="panel-title">Envoyer votre réponse ici:</h1>
                <form method="POST" action="{{ route('admin.pages.store') }}">
                    @csrf
                
                    <div class="form-group">
                        <p class="card-text">
                            <strong>Email du contact :</strong> {{ $contact->email }}
                        </p>
                    </div>
                
                    <div class="form-group">
                        <label for="object">{{ __('Objet:') }}</label>
                        <input id="object" type="text" 
                            class="form-control{{ $errors->has('object') ? ' is-invalid' : '' }}" 
                            name="object" 
                            value="{{ old('object') }}" 
                            required>
                        
                        @if ($errors->has('object'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('object') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="message">{{ __('Votre message:') }}</label>
                        <textarea id="message" type="text" 
                            class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" 
                            name="message" 
                            value="{{ old('message') }}" 
                            required>
                        </textarea>
                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                                                
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
