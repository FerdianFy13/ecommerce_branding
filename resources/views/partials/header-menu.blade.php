@foreach($items as $menu_item)
    <li class="nav-item"><a class="nav-link" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
@endforeach