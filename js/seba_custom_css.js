(function ($) {

    let updateCSS = function(){
        $("#seba_css").val(editor.getSession().getValue());
    }

    $('#save-custom-css-form').submit(updateCSS);
})(jQuery)
let editor = ace.edit("CSS_editor_custom");
editor.setTheme("ace/theme/merbivore");
editor.getSession().setMode("ace/mode/css");