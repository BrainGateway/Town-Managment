<!--begin::Aside Menu-->
<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
    data-kt-scroll-offset="0">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
        id="#kt_aside_menu" data-kt-menu="true">
        <div class="menu-item">
            <a class="menu-link" href="{{route('dashboard')}}">
                <span class="menu-icon">
                    <i class="bi bi-house fs-3"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </div>
        @php
        $path=request()->path();
        @endphp

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.25"
                                d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z"
                                fill="#7E8299" />
                            <path
                                d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z"
                                fill="#7E8299" />
                            <path
                                d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z"
                                fill="#7E8299" />
                            <path
                                d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z"
                                fill="#7E8299" />
                            <g opacity="0.25">
                                <path
                                    d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z"
                                    fill="#7E8299" />
                                <path
                                    d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z"
                                    fill="#7E8299" />
                            </g>
                        </svg>
                    </span>
                </span>
                <span class="menu-title">User Management</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
               
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">All Users</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'users/create') ? 'active' : '' }}"
                        href="{{ route('users.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Add User</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">All Roles</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'roles/create') ? 'active' : '' }}"
                        href="{{ route('roles.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Add Role</span>
                    </a>
                </div>
         
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'permissions') ? 'active' : '' }}"
                        href="{{ route('permissions.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">All Permissions</span>
                    </a>
                </div>
           
                <div class="menu-item">
                    <a class="menu-link  {{ ($path == 'permissions/create') ? 'active' : '' }}"
                        href="{{ route('permissions.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Add Permission</span>
                    </a>
                </div>
               
            </div>
        </div>
       
        
        @hasanyrole('Super Admin')

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('towns') || Request::is('towns/*') ? 'hover show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.25"
                                    d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z"
                                    fill="#7E8299" />
                                <path
                                    d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z"
                                    fill="#7E8299" />
                                <path
                                    d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z"
                                    fill="#7E8299" />
                                <path
                                    d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z"
                                    fill="#7E8299" />
                                <g opacity="0.25">
                                    <path
                                        d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z"
                                        fill="#7E8299" />
                                    <path
                                        d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z"
                                        fill="#7E8299" />
                                </g>
                            </svg>
                        </span>
                    </span>
                    <span class="menu-title">Town Management</span>
                    <span class="menu-arrow"></span>
                </span>
                @if(auth()->user()->roles->first()->hasPermissionTo('User'))
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link  {{ Request::is('towns') ? 'active' : '' }}" href="{{ route('towns.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Towns</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link  {{ Request::is('towns/create') ? 'active' : '' }}" href="{{ route('towns.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Town</span>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        @endhasrole

    </div>
    <!--end::Menu-->
</div>
<!--end::Aside menu-->
