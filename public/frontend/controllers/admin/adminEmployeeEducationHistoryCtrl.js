'use strict';

admin.controller('adminEmployeeEducationHistoryCtrl', function ($scope, $http, $uibModalInstance, items, options, pathParser, $log) {

    $scope.data = items;
    $scope.title = options.title;

    $scope.select = function () {
        $uibModalInstance.close($scope.data);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});