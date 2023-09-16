@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/news.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/froala_editor.pkgd.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/froala_editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/image.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/table.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/video.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('froala/css/plugins/file.css') }}">
    <!-- daterange picker -->
    <script src="{{ asset('adminlte3/plugins/moment/moment.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid" ng-controller="NewsController" ng-cloak>
        <div class="card" ng-if="action == 'LIST'">
            <div class="card-header">
                <div class="page-title">
                    <h3 class="card-title">Danh sách tin tức</h3>
                    <div class="action-group card-tools">
                        <button class="btn btn-success" ng-click="changeAction('CREATE')">Thêm mới</button>
                    </div>
                </div>

                @include('admin.news.filter')
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('admin.news.list')
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        @include('admin.news.edit')
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/controllers/news-controller.js') }}"></script>
    <script src="{{ asset('froala/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/code_beautifier.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/draggable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/image.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/image_manager.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/quote.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('adminlte3/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2()
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            $('#reservation').daterangepicker();
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                   
                    $('#daterange-btn .time-filter').val(start.format('DD/MM/YYYY') + ' - ' + end.format(
                        'DD/MM/YYYY'));

                    $('.time-range-title').html(start.format('DD/MM/YYYY') + ' - ' + end.format(
                        'DD/MM/YYYY'))
                }
            )
        })
    </script>
@endsection
