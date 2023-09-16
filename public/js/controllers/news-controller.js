adminSystem.controller("NewsController", NewsController);

function NewsController($scope, $rootScope, $http, Upload) {

    this.prototype = new BaseController($scope, $http, $rootScope);

    $scope.news = {};
    $scope.filter = {};
    $scope.action = 'LIST';
    $scope.selectedImage = '';
    $scope.imageFile = {};
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

    $scope.items = [];


    $scope.find = function () {
        console.log($scope.filter);
        var url = '/admin/news/get-all';
        url += $scope.buildFilter();
        $http.get(url).then(function mySuccess(response) {
            console.log(response);
            if (response.data.status == STATUS_SUCCESSFUL) {
                console.log(1232);
                $scope.items = response.data.results.data;
            } else {
                $scope.showNotification('Error!', response.data.message, 'error', 'glyphicon-remove');
            }
        });
    }

    $scope.save = function () {
        // console.log($scope.imageFile);
        // // var validate = validateNews();
        $scope.news.image = $scope.imageFile;
        console.log($scope.news);
        if ($scope.news.id) {
            update($scope.news);
        } else {
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
        Upload.upload({
            url: url,
            data: params
        }).then(function mySuccess(response) {
            if (response.data.status && response.data.status == 'successful') {
                toastr.success('Thêm mới tin tức thành công');
                $scope.action = 'LIST';
                $scope.find();
            } else {
                toastr.error('Thêm mới tin tức thất bại.')
            }
        });
    }
    function update(news) {
        url = '/admin/news/' + news.id;
        Upload.upload({
            url: url,
            data: news
        }).then(function mySuccess(response) {
            if (response.data.status && response.data.status == 'successful') {
                toastr.success('Chỉnh sửa tin tức thành công');
                $scope.action = 'LIST';
                $scope.find();
            }
        });
    }

    $scope.delete = function (item, index) {
        var check = confirm('Bạn có muốn xóa tin tức "' + item.title + '" không?');
        if (check) {
            var url = '/admin/news/'+ item.id;
            $http.delete(url).then(function mySuccess(response) {
                console.log(response);
                if (response.data.status == STATUS_SUCCESSFUL) {
                    $scope.items.splice(index, 1);
                    toastr.success('Xóa tin tức thành công');
                } else {
                    toastr.error('Xóa tin tức thất bại.')
                }
            });
        }
    }

    $scope.changeAction = function (action) {
        $scope.action = action;
        $scope.news = {};
    }

    $scope.editNews = function (news) {
        $scope.changeAction('UPDATE');
        $scope.selectedImage = '';
        if (news.image_url) {
            $scope.selectedImage = news.image_url;
        }
        $scope.news = news
        
    }

    $scope.uploadFile = function() {
        var file = $scope.imageFile;
        var reader = new FileReader();

        reader.onload = function(e) {
          $scope.selectedImage = e.target.result;
          $scope.$apply();
        };
        reader.readAsDataURL(file);
      };

    this.init = function () {
        $scope.find();
    }
    this.init();
}
