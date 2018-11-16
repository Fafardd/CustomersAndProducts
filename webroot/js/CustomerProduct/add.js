var app = angular.module('linkedlists', []);

app.controller('typesController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.types = response.data;
    });
});