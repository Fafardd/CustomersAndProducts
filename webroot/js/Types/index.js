var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'
    });
};
var app = angular.module('app',[]);

app.controller('usersCtrl', function ($scope, $compile, $http) {

    $scope.login = function () {

        if (grecaptcha.getResponse(widgetId1) === '') {
            $scope.captcha_status = 'Please verify captcha';
            return;
    }

        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
			.success(function (jsonData, status, headers, config) {

                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
				

                // Switch button for Logout
                $('#logDiv').html(
                    $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-out" id="login-btn" onclick="javascript:$(\'#changeForm\').slideToggle();">Logout/Modify</a>')($scope)
                );


                $('#loginForm').slideUp();

                //$scope.messageLogin = 'Welcome!';
                $scope.errorLogin = '';
            })

            .error(function (data, status, headers, config) {
                $scope.messageLogin = '';
                $scope.errorLogin = 'Invalid credentials';
            });

    }

    $scope.logout = function () {
        localStorage.setItem('token', "no token");

        $('#logDiv').html(
            $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$(\'#loginForm\').slideToggle();">Login</a>')($scope)
        );

        $('#changeForm').slideUp();
        $scope.messageLogin = 'You have logged out';
        $scope.errorLogin = '';

    }
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
            .success(function (response) {
                $('#changeForm').slideUp();
                $scope.messageLogin = 'Password successfully changed! ';
            })
            .error(function (response) {
                $scope.errorLogin = 'Impossible to change the password!';

            });
    };
});

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
$(document).ready(function () {
    localStorage.setItem('token', "no token");
    $('#changePass').hide();
});