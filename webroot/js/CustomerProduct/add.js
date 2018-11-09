$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#type-id').on('change', function () {
        var typeId = $(this).val();
        if (typeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'type_id=' + typeId,
                success: function (products) {
                    $select = $('#product-id');
                    $select.find('option').remove();
                    $.each(products, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#product-id').html('<option value="">Select Type first</option>');
        }
    });
});


