<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ویرایش مشخصات</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form ajax-submission" method="POST" action="{{ route('panel.sa.users.update', $user->username) }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="f_name" class="form-control" placeholder="نام" name="f_name" value="{{ $user->f_name }}">
                                            <label for="f_name">نام</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="l_name" class="form-control" placeholder="نام خانوادگی" name="l_name" value="{{ $user->l_name }}">
                                            <label for="l_name">نام خانوادگی</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="username" class="form-control" placeholder="نام کاربری (کد ملی)" name="username" value="{{ $user->username }}">
                                            <label for="username">نام کاربری (کد ملی)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="number" id="mobile" class="form-control" name="mobile" placeholder="موبایل" value="{{ $user->mobile }}">
                                            <label for="mobile">موبایل</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="number" id="mobile_verify_code" class="form-control" name="mobile_verify_code" placeholder="کد تایید موبایل" value="{{ $user->mobile_verify_code }}">
                                            <label for="mobile_verify_code">کد تایید موبایل</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="status" id="status" class="form-control">
                                                <option value="" disabled hidden selected>وضعیت</option>
                                                <option value="active" @selected($user->status === "active")>فعال</option>
                                                <option value="inactive" @selected($user->status === "inactive")>غیر فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" disabled hidden selected>جنسیت</option>
                                                <option value="man" @selected($user->gender === "man")>آقا</option>
                                                <option value="woman" @selected($user->gender === "woman")>خانم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">ذخیره اطلاعات</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="ajax-submission" action="{{ route('panel.sa.users.reset-password', $user->username) }}" method="POST" id="reset-password-form">
                            @csrf
                            @method('PATCH')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
