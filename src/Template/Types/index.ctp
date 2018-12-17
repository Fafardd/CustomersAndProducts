<?php
$urlToRestApi = $this->Url->build('/api/types', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Types/index', ['block' => 'scriptBottom']);
?>
<!DOCTYPE html>
	<html ng-app="app">
		<head>
			<meta charset="UTF-8">
			<title>Types index</title>
		</head>
		<body>
		<div ng-controller = "usersCtrl">

                <div id="logDiv" style="margin: 10px 0 20px 0;"><a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$('#loginForm').slideToggle();">Login</a></div>

                <div class="none formData" id="loginForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>email</label>
                            <input ng-model="email" type="text" class="form-control" id="email" name="email" style="width: 250px" />
                            <label>Password</label>
                            <input ng-model="password" type="password" class="form-control" id="password" name="password"  style="width: 250px"/>
							<div id="example1"></div> 
							<p style="color:red;">{{ captcha_status }}</p>
						</div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#loginForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="login()">Submit</a>
                    </form>
                </div>

                <div class="panel-body none formData" id="changeForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>New password</label>
                            <input ng-model="newPassword" type="password" class="form-control" id="form-password" name="form-password" style="width: 250px" />
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#changeForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="changePassword()">Submit</a>
                        <a href="javascript:void(0);" class="btn btn-warning" ng-click="logout()">Logout</a>
                    </form>
                </div>
                <br>
                <div>
                    <p style="color: green;">{{messageLogin}}</p>
                    <p style="color: red;">{{errorLogin}}</p>
                </div>
                <br>

		 </div>
		
			<div ng-controller="TypeCRUDController">
				<table>
					<tr>
						<td width="100">ID:</td>
						<td><input type="text" id="id" ng-model="type.id" /></td>
					</tr>
					<tr>
						<td width="100">Description:</td>
						<td><input type="text" id="description" ng-model="type.description" /></td>
					</tr>

				</table>
				<br /> <br /> 
				<a ng-click="updateType(type.id,type.description)">Update type</a> 
				<a ng-click="addType(type.name)">Add category</a> 
			<br /> <br />
			<p style="color: green">{{message}}</p>
			<p style="color: red">{{errorMessage}}</p>
			 
			<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
										<tr ng-repeat="type in types">
											<td>{{type.id}}</td>
											<td>{{type.description}}</td>
											
											<td>
												<a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="getType(type.id)"></a>
												<a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteType(type.id)"></a>
											</td>
										</tr>
						</table>
					   
			</div>
		</body>
	</html>