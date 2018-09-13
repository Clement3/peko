<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Catalogue
    </a>
    <ul class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
        @foreach($cat as $category)
        <li><a class="dropdown-item dropdown-toggle" href="#">{{ $category->name }}</a>
            <ul class="dropdown-menu">
            @foreach($category->varieties as $variety)
                <li><a class="dropdown-item" href="#">{{ $variety->name }}</a></li>
            @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</li>