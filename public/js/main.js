/*
 * main scripts
*/
;(function($) {
    'use strict'

    /* active menu */
    $(function(){
        $('.nav a').filter(function(){
            return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    });

    /* modal bootstrap */
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    /* froala editor */
    $(function() {
        $('textarea').froalaEditor({
            toolbarButtons: ['bold', 'italic', 'underline', '|', 'formatOL', 'formatUL', '|', 'insertImage',
                'insertLink', 'insertTable', '|', 'undo', 'redo', '|', 'html']
        })
    });

})(jQuery);

