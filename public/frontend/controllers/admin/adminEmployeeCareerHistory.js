'use strict';

admin.controller('adminEmployeeCareerHistory', function($scope, $http, $location, $uibModal, pathParser, $log) {

    $scope.animationsEnabled = true;
    pathParser.setPath($location.path());
    $scope.data = {
        titleTemplate: "Employee Career History"
    };

    $scope.title = $scope.data.titleTemplate;

    $scope.init = function() {
        //if (pathParser.isEditPage()) {
        //    $http.get('/' + pathParser.getBase().join('/') + '/' + pathParser.getItemId() + '/selectedOptions').
        //        success(function(data) {
        //            angular.forEach(data, function(tag, index) {
        //                $scope.selected[tag.target].push(tag);
        //            });
        //        });
        //}
    };

    $scope.init();
    $scope.items = [];
    $scope.open = function (params) {
        $log.info(params);
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: (params.target === 'career') ? '/frontend/views/admin/employeeCareerHistory.html' : '/frontend/views/admin/employeeEducationHystory.html',
            controller: (params.target === 'career') ? 'adminEmployeeCareerHistoryCtrl' : 'adminEmployeeEducationHistoryCtrl',
            size: params.size,
            resolve: {
                items: function() {return $scope.items;},
                options: function () {
                    return {
                        title: $scope.data.titleTemplate
                    };
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $log.info($scope);
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});

admin.directive('ngReallyClick', ['$uibModal',
    function($modal) {

        var ModalInstanceCtrl = function($scope, $modalInstance) {
            $scope.ok = function() {
                $modalInstance.close();
            };

            $scope.cancel = function() {
                $modalInstance.dismiss('cancel');
            };
        };

        return {
            restrict: 'A',
            scope:{
                ngReallyClick:"&",
                item:"="
            },
            link: function(scope, element, attrs) {
                element.bind('click', function() {
                    var message = attrs.ngReallyMessage || "Are you sure ?";
                    var title = attrs.ngReallyTitle || "Remove item";
                    /*
                     //This works
                     if (message && confirm(message)) {
                     scope.$apply(attrs.ngReallyClick);
                     }
                     //*/

                    //*This doesn't works
                    var modalHtml = '<div class="modal-header clearfix"><h3 class="modal-title">' + title + '</h3></div><div class="modal-body">' + message + '</div>';
                    modalHtml += '<div class="modal-footer"><button class="btn btn-success" ng-click="ok()">OK</button><button class="btn btn-danger" ng-click="cancel()">Cancel</button></div>';

                    var modalInstance = $modal.open({
                        template: modalHtml,
                        controller: ModalInstanceCtrl
                    });

                    modalInstance.result.then(function() {
                        scope.ngReallyClick({item:scope.item}); //raise an error : $digest already in progress
                    }, function() {
                        //Modal dismissed
                    });
                    //*/

                });

            }
        }
    }
]);
