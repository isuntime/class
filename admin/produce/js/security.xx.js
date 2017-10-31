function view_select(str) {
    $("." + str).css({ "color": "#ffffff", "background-color": "#2b95ff" })
    $("#" + str).fadeIn(100);
    $("#" + str).mouseleave(function() {
        $("#" + str).fadeOut(100);
        $("." + str).css({ "color": "#444444", "background-color": "#aaaaaa" })
    });
    $("#" + str + " li").each(function(index) {
        $(this).click(function() {
            var new_font = $(this).text();
            $("." + str).text(new_font);
            $("." + str).css({ "color": "#444444", "background-color": "#aaaaaa" })
            $("#" + str).fadeOut(100);
        });
    });
}
