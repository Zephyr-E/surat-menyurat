    $('.ellipsis-expand').click(function () {
        if (!$(this).prev().hasClass('expand')) {
            $(this).prev().css('text-overflow', 'clip')
            $(this).prev().css('white-space', 'normal')
            $(this).prev().css('word-break', 'break-all')
            $(this).prev().css('margin-bottom', '20px')
            $(this).prev().addClass('expand')
            $(this).text('lebih sedikit')
        } else if ($(this).prev().hasClass('expand')) {
            $(this).prev().removeAttr('style')
            $(this).prev().removeClass('expand')
            ellipsisText()
        }
    })
