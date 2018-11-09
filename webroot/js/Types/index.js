function getTypes() {
    $.ajax({
        type: 'POST',
        url: 'typeAction.php',
        data: 'action_type=view&' + $("#typeForm").serialize(),
        success: function (html) {
            $('#typeData').html(html);
        }
    });
}

function typeAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var typeData = '';
    if (type == 'add') {
        typeData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        typeData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        typeData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'typeAction.php',
        data: typeData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Type data has been ' + statusArr[type] + ' successfully.');
                getTypes();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editType(id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'typeAction.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#descriptionEdit').val(data.description);
        }
    });
}