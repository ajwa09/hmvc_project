$(function () {
    $(".select2").select2();
})

function readURL(input, output) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(output)
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e1) {
                xmlhttp = false;
            }
        }
    }

    return xmlhttp;
}

function get_employee_by_designations_id(designation_id) {
    var base_url = '<?= base_url() ?>';
    var strURL = "employee/get_employee_by_designations_id/" + designation_id;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    var result = req.responseText;

                    $("#employee").html("<option value='' >Select Employee...</option>");
                    $("#employee").append(result);

                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("POST", strURL, true);
        req.send(null);
    }

}

function show_toaster(message) {
    $.growl({
        message: message
    }, {
        type: 'inverse',
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'right'
        },
        delay: 2500,
        animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
}

function check_current_password(val) {
    var strURL = "settings/check_current_password/" + val;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    var result = req.responseText;
                    if (result) {
                        $("#id_error_msg").css("display", "block");
                        document.getElementById('sbtn').disabled = true;
                    } else {
                        $("#id_error_msg").css("display", "none");
                        document.getElementById('sbtn').disabled = false;
                    }

                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("POST", strURL, true);
        req.send(null);
    }

}

function check_employee_password(val) {

    var strURL = "employee/check_employee_password/" + val;

    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    var result = req.responseText;
                    if (result) {
                        $("#id_error_msg").css("display", "block");
                        document.getElementById('sbtn').disabled = true;
                    } else {
                        $("#id_error_msg").css("display", "none");
                        document.getElementById('sbtn').disabled = false;
                    }

                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("POST", strURL, true);
        req.send(null);
    }

}


