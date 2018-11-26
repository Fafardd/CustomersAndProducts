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