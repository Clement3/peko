@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editer les pages : {{ $page->id }}</h1>
</div>

<form method="POST" action="{{ route('admin.pages.update', ['page' => $page]) }}">
    @csrf
    {{-- @method('PUT') --}}

    <div class="form-group">
        <label for="firstname">{{ __('Firstname') }}</label>
        <input id="firstname" type="text" 
            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
            name="firstname" 
            value="{{ $user->firstname }}" 
            required>
        
        @if ($errors->has('firstname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('firstname') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="lastname">{{ __('Lastname') }}</label>
        <input id="lastname" type="text" 
            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
            name="lastname" 
            value="{{ $user->lastname }}" 
            required>
        
        @if ($errors->has('lastname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="email">{{ __('E-mail') }}</label>
        <input id="email" type="email" 
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
            name="email" 
            value="{{ $user->email }}" 
            required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

     <div class="form-group">
        <label for="role">{{ __('Rôle') }}</label>
        <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" id="role" name="role" required>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}" 
                    @if ($user->role->id === $role->id) selected @endif>
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

    <div class="form-group form-check">
        <input type="checkbox" 
            class="form-check-input{{ $errors->has('active') ? ' is-invalid' : '' }}" 
            id="active" 
            name="active" 
            value="1" 
            @if ($user->is_active) checked @endif>
        <label class="form-check-label" for="active">Actif ?</label>
        
        @if ($errors->has('active'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('active') }}</strong>
            </span>
        @endif        
    </div>

    <button type="submit" class="btn btn-primary">Editer</button>
</form>
@endsection
