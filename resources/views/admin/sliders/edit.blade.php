@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editer le carrousel :</h1>
</div>

<form method="POST" action="{{ route('admin.sliders.update', $slider) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="title">{{ __('Title') }}</label>
        <input id="title" type="text" 
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
            name="title" 
            value="{{ $slider->title }}" 
            required>
        
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="body">{{ __('Body') }}</label>
        <input id="body" type="text" 
            class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" 
            name="body" 
            value="{{ $slider->body }}" 
            required>
        
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>
   
    <button type="submit" class="btn btn-primary">Editer</button>
</form>
@endsection
