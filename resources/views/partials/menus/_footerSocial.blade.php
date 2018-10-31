<ul class="socail_icon">
   @foreach($items as $menu_item)
      <li><a href="{{ $menu_item->link() }}"><i class="fa {{ $menu_item->title }}" aria-hidden="true"></i></a></li>
   @endforeach
</ul>
