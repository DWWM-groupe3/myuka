$( document ).ready(function() {
    $(".btn-start").click(function() {
        $(".btn-start").hide();
        $("#scan").toggle();
    });

    $("h1").addClass("animated bounce");
    $("#scan").addClass("animated shake");
    $("button").hover(function() {
        $(this).css("background-color", "grey");
    }, function() {
        $(this).css("background-color", "#6c53817e");
    });
    $("#nutrition-btn").click(function() {
        $("#nutrition-page").toggle();
    });
    $("#ingredient-btn").click(function() {
        $("#ingredient-page").toggle();
    });


    
});
