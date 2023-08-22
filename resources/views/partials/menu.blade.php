<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can(\App\Http\Resources\PermissionResource::USER_MANAGEMENT_ACCESS)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can(\App\Http\Resources\PermissionResource::PERMISSION_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can(\App\Http\Resources\PermissionResource::ROLE_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can(\App\Http\Resources\PermissionResource::USER_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can(\App\Http\Resources\PermissionResource::LOCATION_ACCESS)
                <li class="nav-item">
                    <a href="{{ route("admin.locations.index") }}" class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.location.title') }}
                    </a>
                </li>
            @endcan
            @can(\App\Http\Resources\PermissionResource::EVENT_TYPE_ACCESS)
                <li class="nav-item">
                    <a href="{{ route("admin.event-types.index") }}" class="nav-link {{ request()->is('admin/event-types') || request()->is('admin/event-types/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.eventType.title') }}
                    </a>
                </li>
            @endcan
            @can(\App\Http\Resources\PermissionResource::VENUE_ACCESS)
                <li class="nav-item">
                    <a href="{{ route("admin.venues.index") }}" class="nav-link {{ request()->is('admin/venues') || request()->is('admin/venues/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.venue.title') }}
                    </a>
                </li>
            @endcan
            @can(\App\Http\Resources\PermissionResource::CONTACT_ACCESS)
                <li class="nav-item">
                    <a href="{{ route("admin.contact.index") }}" class="nav-link {{ request()->is('admin/contact') || request()->is('admin/contact/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.contact.title') }}
                    </a>
                </li>
            @endcan
            @can(\App\Http\Resources\PermissionResource::NEWS_MANAGEMENT_ACCESS)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.newsManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can(\App\Http\Resources\PermissionResource::AUTHORS_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.authors.index") }}" class="nav-link {{ request()->is('admin/authors') || request()->is('admin/authors/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.authors.title') }}
                                </a>
                            </li>
                        @endcan
                        @can(\App\Http\Resources\PermissionResource::TAGS_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.tags.title') }}
                                </a>
                            </li>
                        @endcan
                        @can(\App\Http\Resources\PermissionResource::NEWS_ACCESS)
                            <li class="nav-item">
                                <a href="{{ route("admin.news.index") }}" class="nav-link {{ request()->is('admin/news') || request()->is('admin/news/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.news.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
