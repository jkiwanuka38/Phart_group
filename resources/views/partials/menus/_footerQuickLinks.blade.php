<ul class="quick_link">
   @foreach($items as $menu_item)
      <li><a href="{{ $menu_item->link() }}"><i class="fa fa-chevron-right"></i>{{ $menu_item->title }}</a></li>
   @endforeach
</ul>
