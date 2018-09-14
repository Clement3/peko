@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Voir le produit :</h1>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Produit</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $product->created_at }}</h6>
                <p class="card-text">
                    <strong>Nom produit :</strong> {{ $product->title }} </br>
                    <strong>Image :</strong> {{ $product->picture }}</br>
                    <strong>Description :</strong> {{ $product->body }}
                </p>

                <a href="{{ route('admin.products.show', $product) }}" class="card-link">
                    @if ($product->is_active)
                   Ajouter au panier
                    @else
                    Désactiver
                    @endif
                </a>
            </div>
        </div>
    </div>
            </tbody>
        </table>
        
    </div>
</div>
@endsection
