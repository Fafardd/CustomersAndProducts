<!DOCTYPE html>
<?php
$urlToRestApi = $this->Url->build('/api/types', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Types/index', ['block' => 'scriptBottom']);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="basic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="crud.js"></script>
        <title>Crud PHP Ajax Example</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default types-content">
                    <div class="panel-heading">Types <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel">Add Type</h2>
                        <form class="form" id="typeForm">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="typeAction('add')">Add Type</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="typeForm">
                        <h2 id="actionLabel">Edit Type</h2>
                        <form class="form" id="typeForm">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="name" id="nameEdit"/>
                            </div>
                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="typeAction('edit')">Update Category</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody id="typeData">
                            <?php
                                foreach ($types as $type): 
                                    ?>
                                    <tr>
                                        <td><?php echo $type['id']; ?></td>
                                        <td><?php echo $type['description']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editType('<?php echo $type['id']; ?>')"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? typeAction('delete', '<?php echo $type['id']; ?>') : false;"></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>
</html>
