<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{!empty($metaTitle) ? $metaTitle . '- Tin nhanh' : 'Tin nhanh - tin tức mới nhất trong ngày'}}</title>
    <meta name=”description” content="{{ !empty($metaDescription) ? $metaDescription : 'Tin nhanh nơi tổng hợp các tin tức mới nhất, chính xác nhất trong ngày. Đừng bỏ lỡ bất kỳ thông tin nào nhé' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/ticker-style.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('site/assets/css/app.css')}}">
    @yield('style')
</head>
