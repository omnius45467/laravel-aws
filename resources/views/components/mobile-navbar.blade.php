<footer class="hidden-md hidden-lg">
    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="visible-sm visible-xs" id="footer-body">
                <ul class="mobile-nav list-inline nav-items text-center">
                    <li>
                        {!! link_to_route('dashboard.index', '', [], array('class'=>'fa fa-home fa-2x mobile-icon')) !!}
                        <p class="icon-name">Dashboard</p>
                    </li>
                    <li>
                        {!! link_to_route('entities.index', '', [], array('class'=>'fa fa-building fa-2x mobile-icon'))
                        !!}
                        <p class="icon-name">Entities</p>
                    </li>

                    <li>
                        {!! link_to_route('reports.index', '', [], array('class'=>'fa fa-area-chart fa-2x mobile-icon'))
                        !!}
                        <p class="icon-name">Reports</p>
                    </li>

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a class="fa fa-cloud-upload fa-2x mobile-icon"
                               data-toggle="modal"
                               data-target="#uploadModal">
                            </a>

                            <p class="icon-name">Upload</p>
                        </li>
                        <li>
                            {!! link_to_route('activity.index', '', [], array('class'=>'fa fa-shield fa-2x
                            mobile-icon')) !!}
                            <p class="icon-name">Activity</p>
                        </li>
                        <li>
                            {!! link_to_route('users.index', '', [], array('class'=>'fa fa-group fa-2x mobile-icon'))
                            !!}
                            <p class="icon-name">Users</p>
                        </li>
                    @endif
                    <li class="sidebar-section settings-button">
                        <a class="fa fa-cogs fa-2x"
                           data-user-firstname="{{ $user->first_name }}"
                           data-user-lastname="{{ $user->last_name }}"
                           data-useremail="{{ $user->email }}"
                           data-userid="{{ $user->id }}"
                           data-toggle="modal"
                           data-target="#settingsModal">
                        </a>

                        <p class="icon-name">Settings</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>