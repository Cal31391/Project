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

    $("#meeting-edit-group-names").change(function() {
        var name_id = $(this).val();
        if(name_id != "") {
            $.ajax({
                url:"./meeting/meeting-edit-load-group-names.php",
                data:{n_id:name_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#group-edit-members").html(resp);
                }
            });
        }
    });

    $("#group-names-edit").change(function() {
        var name_id = $(this).val();

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

            $.ajax({
                url:"./meeting/load_edit_group_meetings.php",
                data:{n_id:name_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#meeting-links").html(resp);
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

var loadEditMeeting = function() {
    var m = $("#meeting-name-header").text();
    console.log(m);
    if(m != "") {
        $.ajax({
            url:"./meeting/load_meeting_details.php",
            data:{n:m},
            type:'POST',
            success:function(response) {
                window.location.assign('./edit_meeting.php');
                //alert(response);
                var resp = $.trim(response);
            }
        });
    }
};

var getMeetingDetails = function(i) {
    var bad_name = $("#meeting-name-link"+i).text();
    var m = bad_name.split(',', 1)[0];
    console.log(m);
    if(m != "") {
        $.ajax({
            url:"./meeting/load_meeting_details.php",
            data:{n:m},
            type:'POST',
            success:function(response) {
                window.location.assign('./meeting_info.php');
                //alert(response);
                var resp = $.trim(response);
            }
        });
    }
};

var getMeetingDetailsForEditGroups = function(i) {
    var bad_name = $("#name"+i).text();
    var m = bad_name.split(',', 1)[0];
    console.log(m);
    if(m != "") {
        $.ajax({
            url:"./meeting/load_meeting_details.php",
            data:{n:m},
            type:'POST',
            success:function(response) {
                window.location.assign('./meeting_info.php');
                var resp = $.trim(response);
            }
        });
    }
};

var updateMeeting = function() {
    var popup = $("#confirmSaved");

    var name = $("#meeting-name-edit").text();
    //var location = $("").val();
    var date = $("#datepicker-edit").val();
    var startTime = $("#time1-edit").val();
    var endTime = $("#time2-edit").val();
    var notes = $("#notes-edit").val();
    var group_name = $("#group-edit-names :selected").text();
    var user = username;

    console.log(name);
    if(name != "") {
        $.ajax({
            url:"./meeting/update_meeting.php",
            data:{n:name, d:date, sT:startTime, eT:endTime, notes:notes, g_n:group_name, u:user},
            type:'POST',
            success:function(response) {
                var resp = $.trim(response);
            }
        });

        $(popup).css({ display: "block" });
        $(popup).delay(2000).fadeOut(450);
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
    var user = username;

    if(name != "") {
        $.ajax({
            url:"./meeting/create_meeting.php",
            data:{n:name, d:date, sT:startTime, eT:endTime, notes:notes, g_n:group_name, u:user},
            type:'POST',
            success:function(response) {

                var resp = $.trim(response);
            }
        });


            console.log(name);
            $.ajax({
                url:"./meeting/store_new_location.php",
                data:{loc:place_id, meeting: name, address: address},
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

var changeNameEdit = function() {
    var text = document.getElementById("new-meeting-name-edit").value;
    document.getElementById("meeting-name-edit").innerHTML = text;
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



