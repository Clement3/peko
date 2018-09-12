<div class="row">
    <div class="card-group">
        @foreach($products as $data)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card border border-black">
                <img class="card-img-top" src="http://www.tomatofifou.fr/images/stories/virtuemart/product/tomate_de_vers_23%20ao%C3%BBt%202015.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    <p class="card-text">{{ substr($data->body, 0, 70) }}...</p>
                    <p class="card-text font-weight-bold">{{ $data->price }}€</p>
                    <a href="/products/{{ $data->slug }}" class="btn btn-primary">Voir le détail</a>
                </div>
            </div>
        </div>
        @endforeach
        {{ $products->links() }}
    </div>
</div>