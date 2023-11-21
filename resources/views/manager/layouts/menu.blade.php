<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $name }}-menu" aria-expanded="true" aria-controls="user-menu">
        <i class="fas fa-fw fa-{{ $icon }}"></i>
        <span>{{ $title }}</span>
    </a>
    <div id="{{ $name }}-menu" class="collapse {{ activeSideBar($name, $includes ?? []) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('manager.' . $name . '.index') }}">Danh sách</a>
            <a class="collapse-item" href="{{ route('manager.' . $name . '.create') }}">Thêm mới</a>
        </div>
    </div>
</li>
