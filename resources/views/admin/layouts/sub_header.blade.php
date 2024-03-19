<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ $title }}
            <!--begin::Separator-->
            <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <span class="text-muted fs-7 fw-bold mt-2"></span>
            <!--end::Description-->
            @isset($breadcrumb_arr)
                @if (!is_null($breadcrumb_arr) && count($breadcrumb_arr) > 0)
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 ms-2">
                        <li class="breadcrumb-item pe-3">
                            <a href="{{ route('admin-dashboard') }}" class="text-muted text-hover-primary">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        @foreach ($breadcrumb_arr as $key => $value)
                            @if ($value == '')
                                <li class="breadcrumb-item pe-3 text-dark">{{ $key }}</li>
                            @else
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ $value }}"
                                        class="text-muted text-hover-primary">{{ $key }}</a>
                                </li>
                            @endif
                            @if ($loop->index < count($breadcrumb_arr) - 1)
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                </li>
                            @endif
                        @endforeach


                    </ul>
                @endif
            @endisset
        </h1>
        <!--end::Title-->
    </div>
    <!--end::Page title-->

</div>
