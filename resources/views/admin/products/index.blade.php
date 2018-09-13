@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Products</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                {{-- <th scope="col">Id_variété</th> --}}
                {{-- <th scope="col">price_filter_id</th> --}}
                {{-- <th scope="col">slug</th> --}}
                <th scope="col">Titre</th>
                <th scope="col">Prix</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actif</th>
                <th scope="col">Création</th>
                <th scope="col">Mis à jour le :</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                {{-- <td>{{ $product->variety_id }}</td> --}}
                {{-- <td>{{ $product->price_filter_id }}</td> --}}
                {{-- <td>{{ $product->slug }}</td> --}}
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->body }}</td>
                {{-- <td>{{ $product->is_active }}</td> --}}
                <td>{{ $product->picture }}</td>
                <td>
                    @if ($product->is_active) 
                    <span class="badge badge-info">Oui</span> 
                    @else
                    <span class="badge badge-warning">Non</span>
                    @endif
                </td>
                <td>{{ $product->created_at}}</td>
                {{-- <td>{{ $product->updated_at }}</td> --}}
                
                <td>{{ $product->updated_at }}</td>
                
                    <td>
                    <a href="{{ route('admin.products.show', $product) }}">{{ __('View') }}</a>
                    <a href="{{ route('admin.products.edit', $product) }}">{{ __('Edit') }}</a>
                    <a
                        href="{{ route('admin.products.destroy', $product) }}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}
                    </a>
   
                    <form id="delete-form" action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
