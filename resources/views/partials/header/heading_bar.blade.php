<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend"
             data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
                <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
						{!! getSvgIcon("icons/duotone/Text/Filter.svg", "svg-icon-5 svg-icon-gray-500 me-1") !!}
					</span>
                    <!--end::Svg Icon-->Filter</a>

                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->

                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select option" data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->

                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                    <span class="form-check-label">
                        Author
                    </span>
                                </label>
                                <!--end::Options-->

                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                    <span class="form-check-label">
                        Customer
                    </span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Notifications:</label>
                            <!--end::Label-->

                            <!--begin::Switch-->
                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
                                <label class="form-check-label">
                                    Enabled
                                </label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset
                            </button>

                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Button-->
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
               id="kt_toolbar_primary_button">Create</a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
