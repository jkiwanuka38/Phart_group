<ul class="nav navbar-nav navbar-right">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
    <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
    <li>
        <a href="#" data-toggle="modal" data-target="#myModal" class="nav_cart">
            <i class="fa fa-shopping-cart" aria-hidden="true">
                @if (Cart::instance('default')->count() > 0)
                    <span class="badge"><span>{{ Cart::instance('default')->count() }}</span></span>
                @endif
            </i>
        </a>
    </li>
</ul>
