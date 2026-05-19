<ul {!! $options !!}>
    @foreach ($menu_nodes->loadMissing('metadata') as $key => $row)
        @php
            $hasChild = $row->has_child;
            $hasParent = $row->parent;
        @endphp
        <li @class(['active' => $row->active])>
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                {!! $row->icon_html !!}

                <span>{{ $row->title }}</span>
            </a>

            @if ($hasChild)
                {!! Menu::generateMenu(['menu' => $menu, 'menu_nodes' => $row->child, 'view' => 'main-menu-mobile', 'options' => ['class' => 'submenu']]) !!}
            @endif
        </li>
    @endforeach
</ul>
