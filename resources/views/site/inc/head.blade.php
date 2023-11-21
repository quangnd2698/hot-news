<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ !empty($metaTitle) ? $metaTitle . '- Tiêu điểm 365' : 'Tiêu điểm 365 - Tin tức mới nhất trong ngày' }}
    </title>
    <meta name="description"
        content="{{ !empty($metaDescription) ? $metaDescription : 'Tin nhanh nơi tổng hợp các tin tức mới nhất, chính xác nhất trong ngày. Đừng bỏ lỡ bất kỳ thông tin nào nhé' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="title" content="{{ !empty($metaTitle) ? $metaTitle . '- Tiêu điểm 365' : 'Tiêu điểm 365 - Tin tức mới nhất trong ngày' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:image" content="{{(!empty($news) && !empty($news->image_url)) ? $news->image_url : '/site/assets/img/favicon.png'}}" />
    <meta property="og:title" content="{{ !empty($metaTitle) ? $metaTitle . '- Tiêu điểm 365' : 'Tiêu điểm 365 - Tin tức mới nhất trong ngày' }}"/>
    <meta property="og:description" content="{{ !empty($metaDescription) ? $metaDescription : 'Tin nhanh nơi tổng hợp các tin tức mới nhất, chính xác nhất trong ngày. Đừng bỏ lỡ bất kỳ thông tin nào nhé' }}">
    <meta name="keywords" content="{{ !empty($metaTitle) ? $metaTitle : ''}} Tin hot trong ngày, tin tức trong ngày, tin hot trong ngay, tin moi trong ngay, Tiêu điểm 365, tieudiem365, tieudiem365.site, tieu diem 365">
    <link rel="shortcut icon" type="image/x-icon" href="/site/assets/img/favicon.png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2479266761406973"
        crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-09RYDK4DJR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-09RYDK4DJR');
    </script>

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/app.css') }}">
    @yield('style')
</head>
