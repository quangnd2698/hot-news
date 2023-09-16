adminSystem.controller("NewsController", NewsController);

function NewsController($scope, $rootScope, $http) {

    this.prototype = new BaseController($scope, $http, $rootScope);

    $scope.news = {};
    $scope.action = 'LIST';
    $scope.filter = {};
    $scope.categories = [
        {
            name: 'Chính trị',
            id: '1',
            slug: 'chinh-tri'
        },
        {
            name: 'Xã hội',
            id: '2',
            slug: 'xa-hoi'
        },
        {
            'name': 'Thể thao',
            'id': '3',
            'slug': 'the-thao'
        }
    ];
    $scope.myHtml = "<h1>Hello World</h1>";
    $scope.froalaOptions = {
        imageUploadParam: 'image',

        // Set the image upload URL.
        imageUploadURL: '/api/upload-image',

        imageUploadParams: {
            type: 'news'
        },

        // Set request type.
        imageUploadMethod: 'POST',

        // Set max image size to 5MB.
        imageMaxSize: 1024 * 1024,

        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png'],
    }


    $scope.find = function () {
        console.log($scope.filter);
        var url = $scope.buildFilter('/admin/news/get-all');
        $http.get(url).then(function mySuccess(response) {
            if (response.data.status == STATUS_SUCCESSFUL) {
                console.log(response);
            } else {
                $scope.showNotification('Error!', response.data.message, 'error', 'glyphicon-remove');
            }
        });
    }

    $scope.save = function () {
        console.log(22222);
        console.log($scope.news);
        var validate = validateNews();
        if ($scope.news.id) {
            update($scope.news);
        } else {
            console.log(12321);
            create($scope.news);
        }
    }

    function validateNews() {
        var check = true;
        var message = '';
        if ($scope.news.title == '' || $scope.news.title == null) {
            message = 'The application name is required!';
            check = false;
        }
        return {
            'status': check,
            'message': message
        }
    }

    function create(params) {
        url = '/admin/news';
        $http.post(url, params).then(function mySuccess(response) {
            if (response.status && response.status == 'successful') {
                toastr.success('Thêm mới tin tức thành công');
                $scope.find();
                $scope.action = 'LIST';
            } else {
                toastr.error('Thêm mới tin tức thất bại.')
            }
        });
    }
    function update(news) {
        url = 'admin/news/' + news.id;
        $http.put(url).then(function mySuccess(response) {
            if (response.status && response.status == 'successful') {
                $scope.find();
                $scope.action = 'LIST';
            }
        });
    }

    $scope.changeAction = function (action) {
        console.log(1231);
        $scope.action = action;
    }

    this.init = function () {
        console.log(12312);
        $scope.find();
    }
    this.init();
}
