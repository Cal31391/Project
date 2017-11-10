/*$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
    $("#input-b5").fileinput({ showCaption: false });
});*/


$(document).ready(function() {
    var list_group_item = $(".list-group-item-action");


    //figure this out sometime!!!!//
    $(".list-group-item-action").click(function() {
        if ($(this).hasClass('active')) {
            console.log("has class");
            $(this).removeClass('active');
        }

        $(this).addClass('active')
    })
});


var autoRespond = function() {
    var modal = $("#email-sent");

    $(modal).css({ display: "block" });

    $(modal).delay(3000).fadeOut(450);
}

var confirmDelete = function() {
    var modal = $("#delete-group-confirm");

    $(modal).css({ display: "block" });

    $("#modal-btn-yes").on("click", function() {
        $(modal).css({ display: "none" });
    });
    $("#modal-btn-no").on("click", function() {
        $(modal).css({ display: "none" });
    });
}

var unselectAll = function() {
    var list_group_item = $(".list-group-item-action");

    if ($(list_group_item).hasClass('active')) {
        $(list_group_item).removeClass('active');
    }
}

var selectAll = function() {
    var list_group_item = $(".list-group-item-action");

    if (!$(list_group_item).hasClass('active')) {
        $(list_group_item).addClass('active');
    }
}

var clearAll = function() {
    unselectAll();
}