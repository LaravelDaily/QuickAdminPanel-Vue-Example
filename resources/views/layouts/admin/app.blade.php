<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/md/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/md/img/vue.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>
        {{ trans('panel.site_title') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <meta name="moment_date_format" content="{{ config('project.moment_date_format') }}" />
    <meta name="moment_time_format" content="{{ config('project.moment_time_format') }}" />
    <meta name="moment_datetime_format" content="{{ config('project.moment_datetime_format') }}" />

    <meta name="app-locale" content="{{ App::getLocale() }}" />

    {{-- Fonts and icons --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&family=Material+Icons&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/adminapp/css/app.css') }}">
</head>

<body>
    <div id="app"></div>

    {{-- Core JS Files --}}
    <script src="{{ url('/md/js/core/jquery.min.js') }} "></script>
    <script src="{{ url('/md/js/core/popper.min.js') }} "></script>
    <script src="{{ url('/md/js/core/bootstrap-material-design.min.js') }} "></script>
    <script src="{{ url('/md/js/plugins/perfect-scrollbar.jquery.min.js') }} "></script>
    <script src="{{ url('/md/js/plugins/bootstrap-notify.js') }} "></script>

    {{-- Plugin for the momentJs --}}
    <script src="{{ url('/md/js/plugins/moment.min.js') }} "></script>

    {{-- Notifications Plugin --}}
    <script src="{{ url('/md/js/plugins/bootstrap-notify.js') }} "></script>

    {{-- Datetime Picker --}}
    <script src="{{ url('/md/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ mix('/adminapp/js/app.js') }}" type="text/javascript" charset="utf-8"></script>
</body>

</html>