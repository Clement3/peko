@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Créer un produit</h1>
</div>

@include('partials/_alert')

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
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
            rows="3">{{ old('body') }}</textarea>

        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>    

    <div class="form-group">
        <label for="variety">Variété</label>
        <select class="form-control{{ $errors->has('variety') ? ' is-invalid' : '' }}" 
            name="variety"
            id="variety">
            @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->varieties as $variety)
                <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                @endforeach
            </optgroup>
            @endforeach
        </select>

        @if ($errors->has('variety'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('variety') }}</strong>
            </span>
        @endif        
    </div>

    <div class="form-row">
        <div class="col-md-4 col-sm-12">
            <label for="price">{{ __('Prix') }}</label>
            <input id="price" type="text" 
                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" 
                name="price" 
                value="{{ old('price') }}" 
                required>
            
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-m4 col-sm-12">
            <label for="filter">{{ __('Filtre') }}</label>
            <select class="form-control{{ $errors->has('filter') ? ' is-invalid' : '' }}" 
                id="filter"
                name="filter">
                @foreach ($filters as $filter)
                <option value="{{ $filter->id }}">{{ $filter->name }} - {{ $filter->quantity }} kg</option>
                @endforeach
            </select>

            @if ($errors->has('filter'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('filter') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="price_kilo">{{ __('Prix au kilo') }}</label>
            <input id="price_kilo" type="text" 
                class="form-control{{ $errors->has('price_kilo') ? ' is-invalid' : '' }}" 
                name="price_kilo" 
                value="{{ old('price_kilo') }}" 
                required>
            
            @if ($errors->has('price_kilo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price_kilo') }}</strong>
                </span>
            @endif
        </div>        
    </div>

    <div class="form-group">
        <label for="quantity">{{ __('Stock') }}</label>
        <input id="quantity" type="text" 
            class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" 
            name="quantity" 
            value="{{ old('quantity') }}" 
            required>
        
        @if ($errors->has('quantity'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
        @endif
    </div>

    <div class="custom-file mt-3">
        <input type="file" class="custom-file-input" id="picture" name="picture">
        <label class="custom-file-label" for="picture">Image du produit</label>
        @if ($errors->has('picture'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('picture') }}</strong>
            </span>
        @endif         
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3">Créer le produit</button>
</form>

@endsection
