
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/panel/vendors/css/notify.min.css') }}" />
<style>
    .sn-notify-icon {
        position: absolute;
        left: 12px;
    }
</style>
<!-- JS -->
<script src="{{ asset('assets/panel/vendors/js/notify.min.js') }}"></script>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            new Notify ({
                status: 'error',
                title: 'خطا در اجرای عملیات!',
                text: '{{ $error }}',
                effect: 'fade',
                speed: 1000,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 6000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'left top',
                customWrapper: '',
            });
        </script>
    @endforeach
@endif

@if(session()->has('message'))
    <script>
        new Notify ({
            status: 'success',
            title: 'اجرای عملیات موفقیت آمیز!',
            text: '{{ session()->get('message') }}',
            effect: 'fade',
            speed: 1000,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 6000,
            notificationsGap: null,
            notificationsPadding: null,
            type: 'outline',
            position: 'left top',
            customWrapper: '',
        });
    </script>
@endif
