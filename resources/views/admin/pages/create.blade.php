@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Créer une page</h1>
</div>

@include('partials/_alert')

<form method="POST" action="{{ route('admin.pages.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">{{ __('title') }}</label>
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
        <label for="body">{{ __('body') }}</label>
        <textarea id="body" type="text" 
            class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
            name="body" 
            value="{{ old('body') }}" 
            required>
        </textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="is_active">{{ __('Actif') }}</label>
        <input id="is_active" type="checkbox" 
            class="form-check-label {{ $errors->has('is_active') ? ' is-invalid' : '' }}" 
            name="is_active" 
            value="1"
            required>

        @if ($errors->has('is_active'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Actif') }}</strong>
            </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Créer la page</button>
</form>



@endsection
