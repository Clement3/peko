@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Créer un slider</h1>
</div>

<form method="POST" action="{{ route('admin.sliders.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">{{ __('Title') }}</label>
        <input id="title" type="text" 
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
            name="title" 
            value="{{ old('title') }}" 
            required>
        
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="body">{{ __('Body') }}</label>
        <textarea id="body" type="text" 
            class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
            name="body" 
            required>{{ old('body') }}</textarea>
        
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group form-check">
        <input type="checkbox" 
            class="form-check-input{{ $errors->has('active') ? ' is-invalid' : '' }}" 
            id="active" 
            name="active" 
            value="1" 
            >
        <label class="form-check-label" for="active">Actif ?</label>
        
        @if ($errors->has('active'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('active') }}</strong>
            </span>
        @endif        
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection
