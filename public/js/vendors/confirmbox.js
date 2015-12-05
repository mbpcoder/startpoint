/**
 * Created by mh12 on 7/7/15.
 */
var confirmBox = function (object, message) {
    var message = message;
    var object = object;
    var okTitle = "بلی";
    var cancelTitle = "خیر";
    var top=$(object).position().top;
    var left=$(object).position().left;
    var html = function () {
        var $div = $('<div>').addClass("confirm-box");
        var $p = $('<p>')
            .html(message);
        var $btnOk = $('<button>').addClass("ok")
            .html(okTitle);
        var $btnCancel = $('<button>').addClass("cancel")
            .html(cancelTitle);

        $div.append($p)
            .append($btnOk)
            .append($btnCancel);
        return $div;
    };

    var b = html();

    var del=function(){
        $(object).removeAttr('disabled');
        $(b).remove()
    };

    var init = function () {
        $(b).insertAfter($(object));
        $(object).attr('disabled','disabled');
    };

    $(b).on('click', 'button.ok', function () {
        var addr=$(object).attr('href');
        window.location.href=addr;
        del();
    });

    $(b).on('click', 'button.cancel', function () {
        del();
    });

    init();

    $(b).css({top: top + ($(object).height()), left: left});
};