@extends('panel.sa.layouts.app')

@section('title', $pageTitle = 'مدیریت کاربران')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/panel/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    <div class="content-body">
        <section>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration confined-datatable">
                                            <thead>
                                            <tr>
                                                <th>نام و نام خانوادگی</th>
                                                <th>موبایل</th>
                                                <th>نقش</th>
                                                <th>جنسیت</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                            <tr>
                                                <th>نام و نام خانوادگی</th>
                                                <th>موبایل</th>
                                                <th>نقش</th>
                                                <th>جنسیت</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/panel/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            const csrf = $("meta[name='csrf']").attr('content');
            $('.confined-datatable').DataTable({
                ajax: {
                    url: '{{ route('panel.sa.users.list') }}',
                    dataSrc: 'results',
                    type: "POST",
                    data: {
                        _token: csrf,
                    }
                },
                processing: true,
                serverSide: true,
                columns: [
                    { data: 'full_name' },
                    { data: 'mobile' },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            let badges = ``;
                            $.each(data.role, function () {
                                badges = badges + `<span class="badge badge-info">${this}</span>`;
                            });
                            return badges;
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            if (data.gender == "خانم")
                                return `<span class="badge badge-info">${data.gender}</span>`;
                            else if (data.gender == "آقا")
                                return `<span class="badge badge-warning">${data.gender}</span>`;
                            else
                                return `<span class="badge badge-dark">${data.gender}</span>`;

                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.status === "فعال")
                                return `<span class="badge badge-success">${data.status}</span>`;
                            else if (data.status === "غیر فعال")
                                return `<span class="badge badge-danger">${data.status}</span>`;
                            else
                                return `<span class="badge badge-dark">${data.status}</span>`;

                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            let edit_url = "{{ route('panel.sa.users.edit', 0) }}";
                            edit_url = (new URL(edit_url)).pathname;
                            edit_url = edit_url.replaceAll('0', data.username);
                            return `<a href="${edit_url}" title="ویرایش" class="btn btn-primary btn-icon"><i class="fa fa-edit"></i></a>`;
                        }
                    }
                ],
                language: {
                    url: '{{ asset('assets/panel/custom/js/datatable/fa.json') }}',
                },
            });
        });
    </script>
@endsection
