@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Produits</h1>
</div>

@include('partials/_alert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Prix au kilo</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Variété</th>
                <th scope="col">Stock</th>
                <th scope="col">Activé</th>
                <th scope="col">Créer le</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }} €</td>
                <td>{{ $product->price_kilo }} €</td>
                <td>{{ $product->variety->category->name }}
                <td>{{ $product->variety->name }}</td>
                <td>{{ $product->quantity }} Kg</td>
                <td>
                    @if ($product->is_active) 
                    <span class="badge badge-info">Oui</span> 
                    @else
                    <span class="badge badge-warning">Non</span>
                    @endif
                </td>
                <td>{{ $product->created_at}}</td>                
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

{{ $products->links() }}

@endsection
