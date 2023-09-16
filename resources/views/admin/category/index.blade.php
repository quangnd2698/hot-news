@extends('admin.layouts.app')
@section('style')

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
    <script src="{{ asset('js/controllers/category-controller.js') }}"></script>
@endsection
