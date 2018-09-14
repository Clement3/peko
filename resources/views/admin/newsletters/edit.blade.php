@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editer la newsletter : {{ $newsletter->id}}</h1>
</div>

<form method="POST" action="{{ route('admin.newsletters.update', ['newsletter' => $newsletter]) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="email">{{ __('E-mail') }}</label>
        <input id="email" type="email" 
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
            name="email" 
            value="{{ $newsletter->email }}" 
            required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Editer</button>
</form>
@endsection
