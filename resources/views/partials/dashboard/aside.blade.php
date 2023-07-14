<!--begin::Aside-->
<div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{route('dashboard.index')}}" class="w-100">
            <img alt="Logo" src="{{(asset('dashboard-assets/media/logos/demo3.svg'))}}" class="h-20px logo theme-light-show" />
            <img alt="Logo" src="{{(asset('dashboard-assets/media/logos/demo3-dark.svg'))}}" class="h-20px logo theme-dark-show" />
        </a><!--end::Logo-->
    </div><!--end::Brand-->


    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto"
                id="#kt_aside_menu" data-kt-menu="true">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{prefixHoverShow('employees')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Team')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.employees.index')}}">
                            @can('view_employees')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.employees.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Employees") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{prefixHoverShow('roles')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Management')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        @can('view_roles')
                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.roles.index')}}">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.roles.index') }}" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Roles") }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        @endcan
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{prefixHoverShow('patients').prefixHoverShow('home-visits').prefixHoverShow('invoices').prefixHoverShow('packages')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Reception')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('patients').prefixHoverShow('invoices')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Patients") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_patients')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.patients.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.patients.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("All patients") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_patients')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.patients.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.patients.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Register New Account") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan

                                @can('create_invoices')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.invoices.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{route('dashboard.invoices.create')}}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('Open an existing file') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('home-visits')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Home visits") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_home_visits')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.home-visits.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.home-visits.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Home visits") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_home_visits')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.home-visits.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.home-visits.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Add home visit") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                             class="menu-item menu-accordion {{prefixHoverShow('packages')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Packages") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                            @can('view_packages')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.packages.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.packages.index') }}"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                       data-bs-placement="right">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">{{ __("All Packages") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.packages.seasonal-packages')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.packages.seasonal-packages') }}"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                       data-bs-placement="right">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">{{ __("seasonal package") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            @endcan
                            @can('create_packages')
                               <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.packages.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.packages.create') }}"
                                       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                       data-bs-placement="right">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">{{ __("Add new package") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div><!--end:Menu item-->
                            @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    @can('view_invoices')
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion ">
                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.invoices.index')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <a class="menu-title"
                                    href="{{ route('dashboard.invoices.index') }}">{{ __("invoices") }}</a>
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                    @endcan


                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{prefixHoverShow('doctors').prefixHoverShow('laboratories').prefixHoverShow('medical-centers').prefixHoverShow('sectors')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Transferring party')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('doctors')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Doctors") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_doctors')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.doctors.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.doctors.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("The Doctors") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan

                                @can('create_patients')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.doctors.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.doctors.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("view.doctors.add_new") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->


                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('laboratories')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("laboratories") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_laboratories')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.laboratories.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.laboratories.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("All laboratories") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_laboratories')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.laboratories.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.laboratories.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Add laboratories") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('medical-centers')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Medical centers") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_hospitals')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.medical-centers.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.medical-centers.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Medical centers") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_hospitals')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.medical-centers.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.medical-centers.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("New medical center") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('sectors')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Sectors") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_sectors')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.sectors.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.sectors.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Sectors") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_sectors')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.sectors.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.sectors.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("New sector") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{prefixHoverShow('main-analysis').prefixHoverShow('sub-analysis').prefixHoverShow('waiting-labs').prefixHoverShow('waiting-labs-archive').prefixHoverShow('results')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Laboratory')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('main-analysis').prefixHoverShow('sub-analysis')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Main analysis") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                @can('view_main_analysis')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.main-analysis.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.main-analysis.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Main analysis") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_main_analysis')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.main-analysis.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.main-analysis.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Add new main analysis") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan
                                @can('create_sub_analysis')
                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.sub-analysis.create')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.sub-analysis.create') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Add new sub analysis") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                @endcan

                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <div class="menu-sub menu-sub-accordion">
                        @can('view_results')
                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.results.index')}}">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.results.index') }}" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("All Results") }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        @endcan
                    </div>
                    <!--end:Menu sub-->

                    @can('view_waiting_labs')
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{prefixHoverShow('waiting-labs').prefixHoverShow('waiting-labs-archive').prefixHoverShow('waiting-labs.pending').prefixHoverShow('waiting-labs.finished')}}">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Waiting Labs") }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">


                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.waiting-labs.index')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.waiting-labs.index') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("All Waiting Labs") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->


                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.waiting-labs.finished')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.waiting-labs.finished') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Finished Analysis") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.waiting-labs.pending')}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.waiting-labs.pending') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Pending Analysis") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item {{prefixShow('dashboard.waiting-labs-archive')}}">

                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('dashboard.waiting-labs-archive') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __("Archives") }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->


                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                        @endcan


                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{prefixHoverShow('settings').prefixHoverShow('vacation-types').prefixHoverShow('allowance-types').prefixHoverShow('deduction-and-additions').prefixHoverShow('nationalities').prefixHoverShow('branches')}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('Settings')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.settings.index')}}">
                            @can('view_settings')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.settings.index') }}" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("General Setting") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.settings.company-information')}}">
                            @can('view_settings')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.settings.company-information') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Company information setting") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.settings.tax')}}">
                            @can('view_settings')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.settings.tax') }}" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Tax setting") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.vacation-types.index')}}">
                            @can('view_vacation_types')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.vacation-types.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Vacation types") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <div class="menu-item {{prefixShow('dashboard.allowance-types.index')}}">
                            @can('view_allowance_types')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.allowance-types.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Allowance types") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--end:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.deduction-and-additions.index')}}">
                            @can('view_deduction_and_additions')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.deduction-and-additions.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("deduction / addition") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.nationalities.index')}}">
                            @can('view_nationalities')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.nationalities.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Nationalities") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item {{prefixShow('dashboard.branches.index')}}">
                            @can('view_branches')
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('dashboard.branches.index') }}" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __("Branches") }}</span>
                            </a>
                            <!--end:Menu link-->
                            @endcan
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                @can('view_promo_code')
                <!-- Promo code -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item {{prefixShow('dashboard.promoCode.index')}}">

                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('dashboard.promoCode.index') }}" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{ __("Promo Codes") }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div><!-- Promo code -->
                @endcan

                @can('view_marketers')
                <!-- Marketer-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item {{prefixShow('dashboard.marketers.index')}}">

                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('dashboard.marketers.index')}}"
                            title="Show all Doctors Transferring" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{ __("Marketers") }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div><!-- Marketer -->
                @endcan

                @can('settings_affiliate')
                <!-- affiliate-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item {{prefixShow('dashboard.affiliate.settings')}}">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('dashboard/affiliate/settings') }}" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{ __("Affiliate Settings") }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div><!-- affiliate -->
                @endcan
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">

        <!--begin::User panel-->
        <div class="d-flex flex-stack">
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center">
                <!--begin::Avatar-->
                <div class="symbol symbol-circle symbol-40px">
                    <img alt="Profile picture" src="{{asset('/dashboard-assets/media/svg/avatars/034-boy-14.svg')}}" />
                </div>
                <!--end::Avatar-->

                <!--begin::User info-->
                <div class="ms-2">
                    <!--begin::Name-->
                    <a href="#"
                        class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1">{{auth('employee')->user()->name}}</a>
                    <!--end::Name-->

                    <!--begin::Major-->
                    <span
                        class="text-muted fw-semibold d-block fs-7 lh-1">{{auth('employee')->user()->roles->first()->name}}</span>
                    <!--end::Major-->
                </div>
                <!--end::User info-->
            </div>
            <!--end::Wrapper-->

            <!--begin::User menu-->
            <div class="ms-1">
                <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-end">
                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                fill="currentColor" />
                            <path
                                d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--begin::User account menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <img alt="Profile picture"
                                    src="{{asset('/dashboard-assets/media/svg/avatars/034-boy-14.svg')}}" />
                            </div>
                            <!--end::Avatar-->

                            <!--begin::Username-->
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">{{auth('employee')->user()->name}}
                                    <span
                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{auth('employee')->user()->roles->first()->name}}</span>
                                </div>
                                <a href="#"
                                    class="fw-semibold text-muted text-hover-primary fs-7">{{auth('employee')->user()->email}}</a>
                            </div>
                            <!--end::Username-->
                        </div>
                    </div>
                    <!--end::Menu item-->


                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    {{-- <div class="menu-item px-5">
                        <a href="../../demo3/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                    </div> --}}
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    {{-- <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                        <a href="#" class="menu-link px-5">
                            <span class="menu-title">My Subscription</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/billing.html" class="menu-link px-5">Billing</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/statements.html" class="menu-link px-5">Payments</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3">
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                        <span class="form-check-label text-muted fs-7">Notifications</span>
                                    </label>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div> --}}
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                        <a href="#" class="menu-link px-5">
                            <span class="menu-title position-relative">{{__('Language')}}
                                @if(getLocale() == 'en')
                                <span
                                    class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{__('English')}}
                                    <img class="w-15px h-15px rounded-1 ms-2"
                                        src="/dashboard-assets/media/flags/united-states.svg" alt="" /></span></span>
                            @else
                            <span
                                class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{__('Arabic')}}
                                <img class="w-15px h-15px rounded-1 ms-2"
                                    src="/dashboard-assets/media/flags/saudi-arabia.svg" alt="" /></span></span>
                            @endif
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('change-language','en')}}"
                                    class="menu-link d-flex px-5 @if(getLocale() == 'en') active @endif ">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="/dashboard-assets/media/flags/united-states.svg"
                                            alt="" />
                                    </span>{{__('English')}}</a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('change-language','ar')}}"
                                    class="menu-link d-flex px-5 @if(getLocale() == 'ar') active @endif ">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="/dashboard-assets/media/flags/saudi-arabia.svg"
                                            alt="" />
                                    </span>{{__('Arabic')}}</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-5 my-1">
                        <a href="{{ route('dashboard.edit-profile') }}"
                            class="menu-link px-5">{{__('Account Settings')}}</a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <form id="logout-form" method="post" action="{{ route('employee.logout') }}">
                            @csrf
                            <a href="javascript:" onclick="$('#logout-form').submit()"
                                class="menu-link px-5">{{__("Sign Out")}}</a>
                        </form>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::User account menu-->
            </div>
            <!--end::User menu-->
        </div>
        <!--end::User panel-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
