@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editer l'utilisateur : {{ $user->email }}</h1>
</div>
    
<form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group row">
        <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}" required autofocus>

            @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>

            @if ($errors->has('lastname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        </div>
    </div> 

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rôles') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="role">
                @foreach ($roles as $role)
                <option value="{{ $role->slug }}" 
                        @if ($user->role->slug === $role->slug) selected @endif>
                        {{ $role->name }}
                </option>
                @endforeach
            </select>

            @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>
    </div> 
    
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="active" value="active" @if ($user->is_active) checked @endif>
        <label class="form-check-label" for="active">Actif ?</label>
    </div>

    <button type="submit" class="btn">Editer</button>
</form>
@endsection
