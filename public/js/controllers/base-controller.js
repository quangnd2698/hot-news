const STATUS_SUCCESSFUL = 'successful';
const STATUS_FAIL = 'fail';

function BaseController($scope, $http, $rootScope) {

    $scope.page_count = 1;

    $scope.sortOptions = [
        { 'code': 'newest', 'name': 'Mới nhất' },
        { 'code': 'oldest', 'name': 'Cũ nhất' },
        { 'code': 'A-Z', 'name': 'Tên A-Z' },
        { 'code': 'Z-A', 'name': 'Tên Z-A' }
    ]
    $scope.showLoading = function () {
        Pace.stop();
        Pace.start();
    }

    $scope.hideLoading = function () {
        Pace.stop();
    }

    $scope.checkEnterKey = function (event) {
        if (event.keyCode === 13) {
            var element = angular.element(event.target);
            var searchBtn = element.parent().find('button');
            if (searchBtn) {
                searchBtn.triggerHandler('click');
            }
        }
    };

    $scope.buildUrl = function (url, has_app = false) {
        url = API_URL + '/' + url;
        var appId = $scope.getCurrentAppId();
        if (appId && has_app) {
            if (url.indexOf('?') > -1) {
                url += '&app_id=' + appId;
            } else {
                url += '?app_id=' + appId;
            }

        }
        return $scope.addTokenInUrl(url);
    }

    $scope.addTokenInUrl = function (url) {
        if (url && API_TOKEN) {
            var char = '?auth_key=';
            if (url.indexOf('?') > -1) {
                char = '&auth_key=';
            }
            url += char + API_TOKEN
        }
        return url;
    }


    $scope.showNotification = function (title, text, type, icon) {

        new PNotify({
            title: title,
            text: text,
            type: type,
            icon: 'glyphicon ' + icon,
            addclass: 'snotify',
            closer: true,
            delay: 1200
        });
    }

    $scope.buildFilter = function () {
        console.log($scope.filter);
        var query = '';
        if ($scope.filter) {
            for (const [key, value] of Object.entries($scope.filter)) {
                if (query == '') {
                    query += '?'
                } else {
                    query += '&';
                }
                if (typeof value === "object") {
                    if (value != null && value.code) {
                        query += key + '=' + value.code
                    }
                } else {
                    query += key + '=' + value
                }
            }
        }
        return query;
    }

    $scope.isJsonString = function (str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    $scope.htmlDecodeEntities = function (input) {
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes[0].nodeValue;
    }

    $scope.isValidLink = function (link) {
        var regex = /(^|\s)((https?:\/\/)[\w-]+(\.[\w-]+)+\.?(:\d+)?(\/\S*)?)/gi;
        return regex.test(link);
    }

    $scope.isValidEmail = function (email) {
        var regex = /^[\w\.-]+@[\w\.-]+\.\w{2,5}$/;
        var retVal = email != null && email.match(regex) != null;
        return retVal;
    }

    $scope.isValidPhone = function (phone) {
        if (phone == null) {
            return false;
        }
        //ELSE:
        var stdPhone = $scope.standardizePhone(phone);
        var regex = /^0(9\d{8}|1\d{9}|[2345678]\d{7,14})$/;
        return stdPhone.match(regex) != null;
    }

    $scope.bytesToSize = function (bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

    $scope.standardizePhone = function (phone) {
        if (phone == null) {
            return phone;
        }
        if (!isNaN(phone)) {
            phone = phone.toString();
        }
        //ELSE:
        return phone.replace(/[^0-9]/g, "");
    }

    $scope.getByCode = function (list, code) {
        var retVal = null;
        list.forEach(function (item) {
            if (item.code == code) {
                retVal = item;
            }
        });
        return retVal;
    };

    $scope.getByField = function (list, fieldName, value) {
        var retVal = null;
        list.forEach(function (item) {
            if (item[fieldName] == value) {
                retVal = item;
            }
        });
        return retVal;
    };

    $scope.moneyToString = function (price) {
        if (price == null || price.toString().match(/^\-?[0-9]+(\.[0-9]+)?$/) == null) {
            return "NA";
        }
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    $scope.validateEmail = function (email) {
        // Regular expression for email validation
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if the email matches the regex
        return regex.test(email);
    }

    $scope.isUrlValid = function (url) {
        var pattern = /^(https?:\/\/)?[\w\-]+(\.[\w\-]+)+[/#?]?.*$/i;
        return pattern.test(url);
    }

    // Function to get a cookie
    $scope.getCookie = function (name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Function to set a cookie
    $scope.setCookie = function (name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    $scope.getCurrentAppId = function () {
        var currentAppId = $scope.getCookie('currentAppId');
        if (currentAppId) {
            return parseInt(currentAppId);
        }
        return false;
    }

    $scope.formatDate = function (inputDate) {
        const date = new Date(inputDate);

        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');

        const formattedDate = `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        return formattedDate;
    }

}
