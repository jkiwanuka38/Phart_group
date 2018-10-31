<ul class="nav navbar-nav navbar-right social_nav">
   @foreach($items as $menu_item)
      <li><a href="{{ $menu_item->link() }}"><i class="fa {{ $menu_item->title }}" aria-hidden="true"></i></a></li>
   @endforeach
   <li>
      <a href="" data-toggle="modal" data-target="#myModal">
           <i class="fa fa-shopping-cart" aria-hidden="true">
               @if (Cart::instance('default')->count() > 0)
                   <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
               @endif
           </i>
      </a>
   </li>
</ul>
