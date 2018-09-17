@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Commande N°{{ $order->id }}</h1>
</div>

<div class="container">
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="font-weight-bold display-2">Facture</h1>
                        </div>
                        <div class="col-6">
                            <img class="float-right" src="{{ asset('image/logo/Aux-Paniers-de-Peko - Logo.png') }}" width="150" alt="">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-weight-bold">AUX PANIER DE PEKO</h5>
                            <p>Adresse</p>
                            <p>Ville</p>
                            <p>Numero</p>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-3">
                            <h5 class="font-weight-bold">FACTURER A :</h5>
                            <p>{{ $order->user->lastname }} {{ $order->user->firstname }}</p>
                            <p>{{ $order->user->address->address }}</p>
                            <p>{{ $order->user->address->city }}, {{ $order->user->address->postal_code }}</p>
                        </div>
                        <div class="col-3">
                            <h5 class="font-weight-bold">ENVOYER A :</h5>
                            <p>{{ $order->user->lastname }} {{ $order->user->firstname }}</p>
                            <p>{{ $order->user->address->address }}</p>
                            <p>{{ $order->user->address->city }}, {{ $order->user->address->postal_code }}</p>
                        </div>
                        <div class="col-3">
                            <h5 class="font-weight-bold">FACTURE N° :</h5>
                            <h5 class="font-weight-bold">DATE :</h5>
                            <h5 class="font-weight-bold">COMMANDE N° :</h5>
                        </div>
                        <div class="col-3 text-right">
                            <p>N/A</p>
                            <p>{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p>{{ $order->id }}</p>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">QTE</th>
                                            <th class="text-center" scope="col">DESIGNATION</th>
                                            <th class="text-center" scope="col">PRIX UNIT. HT</th>
                                            <th class="text-center" scope="col">MONTANT HT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $product->quantity }}</th>
                                            <td class="text-center">{{ $product->product->title }}</td>
                                            <td class="text-center">{{ number_format($product->product->price_kilo, 2) }}</td>
                                            <td class="text-center">{{ facturePrice($product) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <p>Total HT</p>
                            <p>TVA</p>
                            <h5 class="font-weight-bold">TOTAL</h5>
                        </div>
                        <div class="col-2 text-right">
                            <p>{{ number_format(totalPrice($order->products), 2) }}€</p>
                            <p>19.6%</p>
                            <h5 class="font-weight-bold">{{ number_format(addTva(totalPrice($order->products)),2) }}€</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
