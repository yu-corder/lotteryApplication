$(function(){
    /** 追加されるボタンにイベントを追加 */
    //応募者の人数のcss
    $('#applicants_num_3_radio').click(function() {
        if ($("#applicants_num_3").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#applicants_num_5_radio").removeClass("push_checked");
            $("#applicants_num_10_radio").removeClass("push_checked");
        }
    });

    $('#applicants_num_5_radio').click(function() {
        if ($("#applicants_num_5").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#applicants_num_3_radio").removeClass("push_checked");
            $("#applicants_num_10_radio").removeClass("push_checked");
        }
    });

    $('#applicants_num_10_radio').click(function() {
        if ($("#applicants_num_10").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#applicants_num_3_radio").removeClass("push_checked");
            $("#applicants_num_5_radio").removeClass("push_checked");
        }
    });


    //会場のキャパのcss
    $('#winner_cap_15_radio').click(function() {
        if ($("#winner_cap_15").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#winner_cap_3_radio").removeClass("push_checked");
            $("#winner_cap_5_radio").removeClass("push_checked");
        }
    });

    $('#winner_cap_3_radio').click(function() {
        if ($("#winner_cap_3").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#winner_cap_15_radio").removeClass("push_checked");
            $("#winner_cap_5_radio").removeClass("push_checked");
        }
    });

    $('#winner_cap_5_radio').click(function() {
        if ($("#winner_cap_5").prop("checked") != true) {
            $(this).addClass("push_checked");
            $("#winner_cap_15_radio").removeClass("push_checked");
            $("#winner_cap_3_radio").removeClass("push_checked");
        }
    });

});
