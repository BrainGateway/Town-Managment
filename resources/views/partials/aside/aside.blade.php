{{--begin::Aside--}}
<div
    id="kt_aside"
    class="aside aside-dark aside-hoverable"
    data-kt-drawer="true"
    data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
    data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle"
>

    {{--begin::Brand--}}
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        {{--begin::Logo--}}
        <a href="{{ route('dashboard') }}">
            <img alt="Logo" src="{{ asset('img/cartlow-logo-r.png') }}" class="h-35px logo" />
        </a>
        {{--end::Logo--}}
            {{--begin::Aside toggler--}}
            <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                 data-kt-toggle="true"
                 data-kt-toggle-state="active"
                 data-kt-toggle-target="body"
                 data-kt-toggle-name="aside-minimize"
            >

                {!! getSvgIcon("icons/duotone/Navigation/Angle-double-left.svg", "svg-icon-1 rotate-180") !!}
            </div>
            {{--end::Aside toggler--}}

    </div>
    {{--end::Brand--}}

    {{--begin::Aside menu--}}
    <div class="aside-menu flex-column-fluid">
        {{ view('partials.aside.menu') }}
    </div>
    {{--end::Aside menu--}}

</div>
{{--end::Aside--}}
