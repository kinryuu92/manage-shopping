$('.checkall').on('click', function () {
    $(this).parents().find('.checkbox-chilrent').prop('checked', $(this).prop('checked'));
})
