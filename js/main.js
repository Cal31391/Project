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

    $("#group-names-edit").change(function() {
        var name_id = $(this).val();
        console.log(name_id);
        if(name_id != "" && name_id != 1) {
            $.ajax({
                url:"./group/load_edit_group.php",
                data:{n_id:name_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#member-names").html(resp);
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

var deleteName = function(e) {
    console.log("click");
    var element = $("#"+e);
    var bad_name = $("#"+e).text();
    var name = bad_name.substr(6);
    var group = $("#group-names-edit").val();
    console.log(name);
    if(name != "") {
        $.ajax({
            url:"./group/delete_group_member.php",
            data:{n:name, g:group},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });
        $(element).remove();
    }
};

var addName = function() {
    console.log("click");
    var user = $("#mem-name-box").val();
    var group = $("#group-names-edit").val();
    console.log(user);
    if(user != "") {
        $.ajax({
            url:"./group/add_group_member.php",
            data:{n:user, g:group},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });
    }

    if(group != "") {
        $.ajax({
            url:"./group/load_edit_group.php",
            data:{n_id:group},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
                $("#member-names").html(resp);
            }
        });
    }
};

var saveMeeting = function() {
    var popup = $("#confirmSaved");

    var name = $("#new-meeting-name").val();
    //var location = $("").val();
    var date = $("#datepicker").val();
    var startTime = $("#time1").val();
    var endTime = $("#time2").val();
    var notes = $("#notes").val();
    var group_name = $("#group-names").val();

    if(name != "") {
        $.ajax({
            url:"./meeting/create_meeting.php",
            data:{n:name, d:date, sT:startTime, eT:endTime, notes:notes, g_n:group_name},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });

        $(popup).css({ display: "block" });
        $(popup).delay(2000).fadeOut(450);
    }
};

var saveGroup = function(n,o) {
    var popup = $("#confirmSaved");

    var name = n;
    var old_name = o;
    console.log(old_name);
    console.log(name);
    if(name != "") {
        $.ajax({
            url:"./group/save_group.php",
            data:{n:name, old:old_name},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });

        reloadGroups();

        $(popup).css({ display: "block" });
        $(popup).delay(2000).fadeOut(450);
    }

};

var reloadGroups = function() {
    $.ajax({
        url:"./group/load_edit_group_names.php",
        data:{},
        type:'POST',
        success:function(response) {
            var resp = $.trim(response);
            $("#group-names-edit").html(resp);
        }
    });
};

var createGroup = function() {
    var group_name = $("#new-create-group-name").val();
    console.log(group_name);

    if(group_name != "") {
        $.ajax({
            url:"./group/create_group.php",
            data:{n:group_name},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });

        reloadGroups();
    }

};



var selectMembers = function() {
    $(".list-group-item-action").click(function() {
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

/*var confirmDelete = function() {
    var modal = $("#save-group-confirm");

    $(modal).css({ display: "block" });

    $("#modal-btn-yes").on("click", function() {
        $(modal).css({ display: "none" });
    });
    $("#modal-btn-no").on("click", function() {
        $(modal).css({ display: "none" });
    });
};*/

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

var reload = function() {
    location.reload();
}

function formSubmit(element) {
    document.getElementById(element).submit();
}

var changeName = function() {
    var text = document.getElementById("new-meeting-name").value;
    document.getElementById("meeting-name").innerHTML = text;
};

var changeGroupName = function() {
    var old_name = document.getElementById("group-names-edit").value;
    var text = document.getElementById("new-group-name").value;
    saveGroup(text, old_name);
};

var validateFields = function() {
    var username_err = $("#usernameWarn");
    var username = $("#username");
    var password_err = $("#passwordWarn");
    var password = $("#password");

    if ($(username).val() == "" || $(password).val() == "") {
        if ($(username).val() == "") {
            $(username_err).css({display: "block"});
        }
        if ($(password).val() == "") {
            $(password_err).css({ display: "block" });
        }
        return false;
    }
    else {
        return true;
    }
};

var validateRegFields = function() {
    var username_err = $("#regUserWarn");
    var username = $("#user");
    var password_err = $("#regPassWarn");
    var password = $("#pwd");
    var repwd_err = $("#regRePassWarn");
    var repwd = $("#repwd");
    var email_err = $("#regEmailWarn");
    var email = $("#email");
    var match_err = $("#regMatchWarn");

    if ($(username).val() == "" || $(password).val() == "" || $(repwd).val() == "" ||
        $(email).val() == "") {
        if ($(username).val() == "") {
            $(username_err).css({display: "block"});
        }
        if ($(password).val() == "") {
            $(password_err).css({ display: "block" });
        }
        if ($(repwd).val() == "") {
            $(repwd_err).css({ display: "block" });
        }
        if ($(email).val() == "") {
            $(email_err).css({ display: "block" });
        }
        if ($(password).val() != $(repwd).val()) {
            $(match_err).css({display: "block"});
        }
        return false;
    }
    else {
        return true;
    }
};





