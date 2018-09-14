@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Créer un produit</h1>
</div>

@include('partials/_alert')

<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">{{ __('Titre') }}</label>
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
        <label for="body">{{ __('Description') }}</label>
        <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
            id="body" 
            name="body"
            rows="3">
            {{ old('body') }}
        </textarea>

        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>    

    <div class="form-group">
        <label for="categories">Catégories</label>
        <select name="variety" class="form-control{{ $errors->has('variety') ? ' is-invalid' : '' }}" id="categories">
            @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->varieties as $variety)
                <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                @endforeach
            </optgroup>
            @endforeach
        </select>
    </div>
</form>

@endsection
