$(function () {
    $('button[id="checkit"]').click(function () {
        $('#month').css("display", "block").css("margin-top", "20" + "px");
    });
});
/* 
 * Session Academic Calender 
 */
$(function () {
    $('div.other').show();
    $('input[id="checkit"]').click(function () {
        $('#show').css("display", "").css("margin-top", "20" + "px");
        if (this.checked) {
            $('div.other').hide();
        } else {
            $('div.other').show();
        }
    });
});
$(document).ready(function () {
    $('input.select_one').on('change', function () {
        $('input.select_one').not(this).prop('checked', false);
    });
});

/* 
 * Session Create Class Select One class One Shift And save Data
 */

$(document).ready(function () {
    $('input.select_class').on('change', function () {
        $('input.select_class').not(this).prop('checked', false);
    });
});


$(document).ready(function () {
    $('input.select_shift').on('change', function () {
        $('input.select_shift').not(this).prop('checked', false);
    });
});


/* 
 * Teacher Management Add Marks check and show input
 */
$(function () {
    $('div.term').hide();
    $('input[id="checkit"]').click(function () {
        if (this.checked) {
            $('div.term').hide();
        } else {
            $('div.term').show();
        }
    });
});
$(function () {
    $('div.assessment').hide();
    $('input[id="checked"]').click(function () {
        if (this.checked) {
            $('div.assessment').show();
        } else {
            $('div.assessment').hide();
        }
    });

});

/*
 * Select All select
 */
$(function () {
    $('#parent_present').on('change', function () {
        $('.child_present').prop('checked', $(this).prop('checked'));
    });
    $('.child_present').on('change', function () {
        $('.child_present').prop($('.child_present:checked').length ? true : false);
    });
    $('#parent_absent').on('change', function () {
        $('.child_absent').prop('checked', $(this).prop('checked'));
    });
    $('.child_absent').on('change', function () {
        $('.child_absent').prop($('.child_absent:checked').length ? true : false);
    });
});
/*
 * Click to show 
 */

$(function () {
    $('div.a_category').hide();
    $('input[id="parent_absent"]').click(function () {
        if (this.checked) {
            $('div.a_category').show();
        } else {
            $('div.a_category').hide();
        }
    });
});

$(document).ready(function () {
    $('input.select_one').on('change', function () {
        $('input.select_one').not(this).prop('checked', false);
    });
});
$(function () {
    $('#parent').on('change', function () {
        $('.child').prop('checked', $(this).prop('checked'));
    });
    $('.child').on('change', function () {
        $('#parent').prop($('.child:checked').length ? true : false);
    });
});

// Attendance With Leave Category Select One 

$(document).ready(function () {
    //var id = $('input[class^="child_present"]').length;

//    var i;
//    for (i = 1; i <= id; i++)
////    {
////        alert(i);
////        $('input.child_present_'+i).on('change', function() {
////            $('input.child_present_'+i).not(this).prop('checked', false);
////        });
////    }
    var parent_absent = $('input[id="parent_absent"]');
    var parent_present = $('input[id="parent_present"]');
    var child_present = $('input[class="child_present"]');

    var child_absent = $('input[class="child_absent"]');

    $('select[id="disable"]').prop('disabled', true);
    child_absent.click(function () {
        if (this.checked) {
            $('select[id="disable"]').prop('disabled', false);
        }
    });
    parent_absent.change(function () {
        if (this.checked) {
            child_present.prop('checked', false);
        }
    });
    parent_present.change(function () {
        if (this.checked) {
            child_absent.prop('checked', false);
        }
    });
    child_present.change(function () {
        parent_absent.prop($('input[class="child_present"]').length === 0);
    }).change();
    child_absent.change(function () {
        parent_present.prop($('input[class="child_absent"]').length === 0);
    }).change();
});
