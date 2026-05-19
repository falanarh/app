<ul {!! $options !!}>
    @foreach ($menu_nodes->loadMissing('metadata') as $key => $row)
        @php
            $hasChild = $row->has_child;
            $hasParent = $row->parent;
        @endphp
        <li @class(['nav-item', 'dropdown' => $hasChild, 'active' => $row->active])>
            <a @class(['nav-link' => ! $hasParent, 'dropdown-item' => $hasParent, 'dropdown-toggle' => $hasChild]) href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                {!! $row->icon_html !!}

                <span>{{ $row->title }}</span>
            </a>

            @if ($hasChild)
                {!! Menu::generateMenu(['menu' => $menu, 'menu_nodes' => $row->child, 'view' => 'main-menu', 'options' => ['class' => 'dropdown-menu']]) !!}
            @endif
        </li>
    @endforeach
</ul>
