@php
    $toolbarButtonMarginClass = "ms-1 ms-lg-3";
    $toolbarButtonHeightClass = "w-40px h-40px";
    $toolbarUserAvatarHeightClass = "symbol-40px";
    $toolbarButtonIconSizeClass = "svg-icon-1";
@endphp

{{--begin::Toolbar wrapper--}}
<div class="d-flex align-items-stretch flex-shrink-0">

    {{--begin::Notifications--}}
    <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}">
        {{--begin::Menu--}}
        <div class="btn btn-icon btn-active-light-primary position-relative {{ $toolbarButtonHeightClass  }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
            {!! getSvgIcon("icons/duotone/Communication/Group-chat.svg", $toolbarButtonIconSizeClass) !!}

            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
            </span>
        </div>
        {{ view('partials.header.partials.notification_menu') }}
        {{--end::Menu--}}
    </div>
    {{--end::Notifications--}}

    {{--begin::User--}}
    @if(Auth::check())
        <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}" id="kt_header_user_menu_toggle">
            {{--begin::Menu--}}
            <div class="cursor-pointer symbol {{ $toolbarUserAvatarHeightClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                <img src="{{ isset(auth()->user()->avatar_url) ? auth()->user()->avatar_url : 'media/avatars/blank.png' }}" alt="cartlow"/>
            </div>
            {{ view('partials.header.partials.user_menu') }}
            {{--end::Menu--}}
        </div>
    @endif
    {{--end::User --}}

    {{--begin::Heaeder menu toggle--}}
        <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary" id="kt_header_menu_mobile_toggle">
                {!! getSvgIcon("icons/duotone/Text/Toggle-Right.svg", "svg-icon-1") !!}
            </div>
        </div>
    {{--end::Heaeder menu toggle--}}
</div>
{{--end::Toolbar wrapper--}}
