var app = angular.module('app',[]);

app.controller('TypeCRUDController', ['$scope','TypeCRUDService', function ($scope,TypeCRUDService) {
	  
    $scope.updateType = function () {
        TypeCRUDService.updateType($scope.type.id,$scope.type.description)
          .then(function success(response){
              $scope.message = 'Type data updated!';
              $scope.errorMessage = '';
              $scope.type.id = '';
              $scope.type.description = '';
              $scope.getAllTypes();
          },
          function error(response){
              $scope.errorMessage = 'Error updating Product Type!';
              $scope.message = '';
          });
    }
    
    $scope.getType = function ($id) {

        TypeCRUDService.getType($id)
          .then(function success(response){
              $scope.type = response.data.data;
              $scope.type.id = $id;
              $scope.message='';
              $scope.errorMessage = '';
              $scope.getAllTypes();
              
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Type not found!';
              }
              else {
                  $scope.errorMessage = "Error getting Type!";
              }
          });
    }
    
    $scope.addType = function () {
        if ($scope.type != null && $scope.type.description) {
            TypeCRUDService.addType($scope.type.description)
              .then (function success(response){
                  $scope.message = 'Type added!';
                  $scope.errorMessage = '';
                  $scope.type.id = '';
                  $scope.type.description = '';
                  $scope.getAllTypes();
              },
              function error(response){
                  $scope.errorMessage = 'Error adding Type!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a description!';
            $scope.message = '';
        }
    }
    
    $scope.deleteType = function ($id) {
        TypeCRUDService.deleteType($id)
          .then (function success(response){
              $scope.message = 'Product Type deleted!';
              $scope.type = null;
              $scope.errorMessage='';
              $scope.getAllTypes();
          },
          function error(response){
              $scope.errorMessage = 'Error deleting Type!';
              $scope.message='';
          })
    }
    
    $scope.getAllTypes = function () {
        TypeCRUDService.getAllTypes()
          .then(function success(response){
              $scope.types = response.data.data;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting Types!';
          });
    }
    $scope.getAllTypes();
}]);

app.service('TypeCRUDService',['$http', function ($http) {
	
    this.getType = function getType(typeId){
        return $http({
          method: 'GET',
          url: urlToRestApi+'/'+typeId,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
	}
	
    this.addType = function addType(description){
        return $http({
          method: 'POST',
          url: urlToRestApi,
          data: {description:description},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }
	
    this.deleteType= function deleteType(id){
        return $http({
          method: 'DELETE',
          url: urlToRestApi+'/'+id ,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.updateType = function updateType(id,description){
        return $http({
          method: 'PATCH',
          url: urlToRestApi+'/'+id,
          data: {description:description},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.getAllTypes = function getAllTypes(){
        return $http({
          method: 'GET',
          url: urlToRestApi,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}

        });
    }

}]);