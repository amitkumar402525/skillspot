$(document).ready(function() {
    $('.customSelect').each(function() {
        var $select = $(this);
        var allowTags = $select.data('tags') === true; // Convert attribute value to boolean
        var maxSelection = $select.data('max-selection') || 4; // Default to 4 if not specified
        var placeholderText = $select.data('placeholder') || 'Select an option'

        $select.select2({
            width: 'resolve',
            theme: 'classic',
            allowClear: true,
            tags: allowTags,
            maximumSelectionLength: maxSelection,
            tokenSeparators: [','],
            placeholder: placeholderText
        });
    });
    // $('.customSelect').select2({
    //     width: 'resolve', // need to override the changed default
    //     theme: "classic",
    //     maximumSelectionLength: 4,
    //     allowClear: true
    // });
    // $('.customSelectAdd').select2({
    //     width: 'resolve', // need to override the changed default
    //     theme: "classic",
    //     maximumSelectionLength: 4,
    //     allowClear: true,
    //     tags: true,
    //     placeholder: "Select or add a category",
    //     tokenSeparators: [',', ' ']
    // });
    // $('.jobCategoriesSelect').select2({
    //     width: 'resolve', // need to override the changed default
    //     theme: "classic",
    //     maximumSelectionLength: 4,
    //     allowClear: true,
    //     tags: true,
    //     placeholder: "Select or add a category",
    //     tokenSeparators: [',', ' ']
    // });

});