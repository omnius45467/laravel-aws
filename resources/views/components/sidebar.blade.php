<!-- Sidebar -->
<div id="sidebar-wrapper">
    <nav>
        <ul class="sidebar-nav">
            @if(Auth::user()->entities->count() > 1)
                <li class="dropdown">
                    <h4 class="dropdown-toggle entityName"
                        type="button"
                        id="sidebarDropdown"
                        data-toggle="dropdown"
                        aria-expanded="true"
                            >
                        {{Auth::user()->entities->first()->name}}
                        <span class="caret"></span>
                    </h4>

                    <ul class="sidebar-dropdown-menu dropdown-menu"
                        role="menu"
                        aria-labelledby="sidebarDropdown">
                        @foreach(Auth::user()->entities as $entity)
                            <li role="presentation" class="dropdown-entity-item">
                                <a role="menuitem"
                                   tabindex="-1"
                                   href="/entities">
                                    {{$entity->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
            <li class="sidebar-section dashboard-button">
                {!! link_to_route('dashboard.index', 'Dashboard', [], array('class'=>'fa fa-home')) !!}
            </li>

            <li class="sidebar-section entities-button">

                {!! link_to_route('entities.index', 'Entities', [], array('class'=>'fa fa-building')) !!}
            </li>
            <li class="sidebar-section report-button">

                {!! link_to_route('reports.index', 'Reports', [], array('class'=>'fa fa-area-chart')) !!}
            </li>
            @if(Auth::user()->hasRole('admin'))
                <li class="sidebar-section upload-button">
                    <a class="fa fa-cloud-upload"
                       data-toggle="modal"
                       data-target="#uploadModal">
                        Upload
                    </a>
                </li>
                <li class="sidebar-section activity-button">

                    {!! link_to_route('activity.index', 'Activity', [], array('class'=>'fa fa-shield')) !!}
                </li>
                <li class="sidebar-section users-button">

                    {!! link_to_route('users.index', 'Users', [], array('class'=>'fa fa-group')) !!}
                </li>
                <li class="sidebar-section settings-button">
                    <a class="fa fa-cogs"
                       data-user-firstname="{{ $user->first_name }}"
                       data-user-lastname="{{ $user->last_name }}"
                       data-useremail="{{ $user->email }}"
                       data-userid="{{ $user->id }}"

                       data-toggle="modal"
                       data-target="#settingsModal">
                        Settings
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
<!-- /#sidebar-wrapper -->