@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editer l'étiquette :</h1>
</div>

<form method="POST" action="{{ route('admin.labels.update', ['label' => $label]) }}">
    @csrf
    @method('PUT')

    {{-- <div class="form-group">
        <label for="variety">{{ __('Variété') }}</label>
        <input id="variety" type="text" 
            class="form-control{{ $errors->has('variety') ? ' is-invalid' : '' }}" 
            name="variety" 
            value="{{ $label->variety->name }}" 
            required>

        @if ($errors->has('variety'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('variety') }}</strong>
            </span>
        @endif
    </div> --}}

    
    <div class="form-group">
            <label for="name">{{ __('Nom') }}</label>
            <input id="name" type="text" 
                class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
                name="name" 
                value="{{ $label->name }}" 
                required>
            
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
                <label for="body">{{ __('Description') }}</label>
                <input id="body" type="text" 
                    class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
                    name="body" 
                    value="{{ $label->body }}" 
                    required>
                
                @if ($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                    <label for="recipe">{{ __('Recette') }}</label>
                    <input id="recipe" type="text" 
                        class="form-control{{ $errors->has('recipe') ? ' is-invalid' : '' }}" 
                        name="recipe" 
                        value="{{ $label->recipe }}" 
                        required>
                    
                    @if ($errors->has('recipe'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('recipe') }}</strong>
                        </span>
                    @endif
                </div>
    
    <button type="submit" class="btn btn-primary">Editer</button>
</form>
@endsection
