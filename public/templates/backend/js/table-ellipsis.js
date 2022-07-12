$('.table td.ellipsis').click(function () {
    if (!$(this).hasClass('expand')) {
        $(this).css('text-overflow', 'clip')
        $(this).css('white-space', 'normal')
        $(this).css('word-break', 'break-all')
        $(this).css('cursor', 'zoom-out')
        $(this).css('cursor', '-webkit-zoom-out')
        $(this).addClass('expand')
    } else if ($(this).hasClass('expand')) {
        $(this).removeAttr('style')
        $(this).removeClass('expand')
    }
})
