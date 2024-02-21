@extends('panel.sa.layouts.app')

@section('title', $pageTitle = 'مدیریت کاربران')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/panel/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="alert">
                    <a href="#!" onclick="chooseTab(this)" data-tab="edit" class="btn btn-icon btn-outline-bitbucket">
                        ویرایش مشخصات
                        <i class="fa fa-user mr-1"></i>
                    </a>

                    <a href="#!" onclick="chooseTab(this)" data-tab="roles" class="btn btn-icon btn-outline-bitbucket">
                        تخصیص نقش
                        <i class="fa fa-check mr-1"></i>
                    </a>

                    <button class="btn btn-icon btn-outline-bitbucket" onclick="submitResetPasswordForm()">
                        بازنشانی رمز عبور
                        <i class="fa fa-key mr-1"></i>
                    </button>
                </div>
            </div>
            @if(!in_array(request('tab', ""), ['edit', 'roles']))
                <div class="col-12 mb-2">
                    <div class="alert alert-warning">
                        لطفا برای ادامه، یکی از عملیات های موجود را انتخاب کنید.
                    </div>
                </div>
            @endif
        </div>
        @includeWhen(request('tab') == "edit", 'panel.sa.users.main-edit', ['user' => $user])
        @includeWhen(request('tab') == "roles", 'panel.sa.users.roles', ['user' => $user])
    </div>
@endsection

@section('script')
    <script>
        function submitResetPasswordForm() {
            if (confirm('آیا از بازنشانی رمز عبور اطمینان دارید؟'))
                $('#reset-password-form').submit();
        }

        function chooseTab(e) {
            let tab = $(e).attr('data-tab');
            let currentUrl = new URL(window.location.href);
            window.location.href = currentUrl.pathname + "?tab=" + tab
        }

        $(document).ready(function () {
            $('.btn-outline-bitbucket').each(function () {
                let currentUrl = new URLSearchParams(window.location.search);
                let tab = currentUrl.get('tab');
                if (tab === $(this).attr('data-tab')) {
                    $(this)
                        .addClass('btn-bitbucket')
                        .removeClass('btn-outline-bitbucket');
                }
            });
        });
    </script>
@endsection
