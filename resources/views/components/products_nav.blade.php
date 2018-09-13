<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Catalogue
    </a>
    <ul class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
        <li class="dropdown-item"><a href="/catalogue">Tout les produits</a></li>
        @foreach($cat as $category)
        <li><a class="dropdown-item dropdown-toggle" href="#">{{ $category->name }}</a>
            <ul class="dropdown-menu">
            @foreach($category->varieties as $variety)
                <li class="align-middle d-inline"><a class="align-middle dropdown-item" href="/catalogue/{{ $category->slug }}/{{ $variety->slug }}"><img src="{{ asset('image/categorie/'.$variety->picture) }}" style="width: 40px; height: 40px; margin-right: 20px;">{{ $variety->name }}</a></li>
            @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</li>