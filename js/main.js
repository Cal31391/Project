/*$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
    $("#input-b5").fileinput({ showCaption: false });
});*/


$(document).ready(function() {

    var list_group_item = $(".list-group-item-action");

    $(function () {
        $('[data-toggle="popover"]').popover()
    });



    $("#group-names").change(function() {
        var name_id = $(this).val();
        if(name_id != "") {
            $.ajax({
                url:"./group/load_group.php",
                data:{n_id:name_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#group-members").html(resp);
                }
            });
        }
    });

    //figure this out sometime!!!!//
    $(list_group_item).click(function() {
        alert("click");
        console.log("click");
        if ($(this).hasClass('active')) {
            console.log("has class");
            $(this).removeClass('active');
        }

        $(this).addClass('active')
    });

});


var selectMembers = function() {
    $(".list-group-item-action").click(function() {
        alert("click");
        console.log("click");
        if ($(this).hasClass('active')) {
            console.log("has class");
            $(this).removeClass('active');
        }

        $(this).addClass('active')
    });
};

var autoRespond = function() {
    var modal = $("#email-sent");

    $(modal).css({ display: "block" });

    $(modal).delay(3000).fadeOut(450);
};

var confirmDelete = function() {
    var modal = $("#delete-group-confirm");

    $(modal).css({ display: "block" });

    $("#modal-btn-yes").on("click", function() {
        $(modal).css({ display: "none" });
    });
    $("#modal-btn-no").on("click", function() {
        $(modal).css({ display: "none" });
    });
};

var unselectAll = function() {
    var list_group_item = $(".list-group-item-action");

    if ($(list_group_item).hasClass('active')) {
        $(list_group_item).removeClass('active');
    }
};

var selectAll = function() {
    var list_group_item = $(".list-group-item-action");

    if (!$(list_group_item).hasClass('active')) {
        $(list_group_item).addClass('active');
    }
};

var clearAll = function() {
    unselectAll();
};

function formSubmit(element) {
    document.getElementById(element).submit();
}

var changeName = function() {
    var text = document.getElementById("new-meeting-name").value;
    document.getElementById("meeting-name").innerHTML = text;
};




