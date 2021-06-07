@props(['menu', 'class'])
<div class="accordion" id="accordionMenu">
    <div class="card">
        <div class="card-header" id="menu-{{ $menu->id }}">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse-{{ $menu->id }}" aria-expanded="true"
                    aria-controls="collapse-{{ $menu->id }}">
                    {{ $menu->name }}
                </button>
            </h2>
        </div>

        <div id="collapse-{{ $menu->id }}" {{ $attributes->merge(['class' => 'collapse ' . $class]) }}
            aria-labelledby="menu-{{ $menu->id }}" data-parent="#accordionMenu">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($menu->routes->all() as $submenus)
                        <li class="list-group-item"><a
                                href="{{ route($submenus->route) }}">{{ $submenus->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
