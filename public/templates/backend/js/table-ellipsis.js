$('.table td').click(function () {
    if (!$(this).hasClass('expand')) {
        $(this).css('text-overflow', 'clip')
        $(this).css('white-space', 'normal')
        $(this).css('word-break', 'break-all')
        $(this).addClass('expand')
    } else if ($(this).hasClass('expand')) {
        $(this).removeAttr('style')
        $(this).removeClass('expand')
    }
})
