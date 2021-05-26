$('.checkbox_parent').on('click', function () {
    $(this).parents('.border-primary').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
});

$('.checkall').on('click', function () {
    $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    $(this).parents().find('.checkbox_parent').prop('checked', $(this).prop('checked'));
})
