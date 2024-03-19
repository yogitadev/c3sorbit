<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
    <div class="card mb-5 mb-xl-8">
        <div class="card-body">
            <div class="d-flex flex-center flex-column py-5">

                <div class="symbol symbol-100px mb-7">
                    <div class="symbol-label display-4 fw-bold bg-primary text-inverse-primary">
                        {{ Auth::user()->getShortName() }}</div>
                </div>
                <span
                    class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $profile_item->getFullName() }}</span>
                <div class="mb-1">
                    <div class="badge badge-lg badge-light-primary d-inline">{{ $profile_item->admin_type }}</div>
                </div>
            </div>
            <div class="separator"></div>
            <div id="kt_user_view_details" class="collapse show">
                <div class="fs-6">

                    <div class="fw-bolder mt-5">Account ID</div>
                    <div class="text-gray-600">{{ $profile_item->unique_id }}</div>

                    <div class="fw-bolder mt-5">Username</div>
                    <div class="text-gray-600">{{ $profile_item->username }}</div>

                    <div class="fw-bolder mt-5">Email</div>
                    <div class="text-gray-600">
                        <a href="mailto:{{ $profile_item->email }}"
                            class="text-gray-600 text-hover-primary">{{ $profile_item->email }}</a>
                    </div>

                    <div class="fw-bolder mt-5">Last Login</div>
                    <div class="text-gray-600">
                        <div class="text-gray-600">{{ $profile_item->last_login_at }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
