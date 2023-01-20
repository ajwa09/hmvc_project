<script src="files/assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="files/assets/ckeditor/lang/en.js" type="text/javascript"></script>
<script src="files/assets/js/jasny-bootstrap.min.js"></script>

<link href="files/assets/css/admin.css" rel="stylesheet" type="text/css"/>

<script>
    'use strict';
    $(function () {

        setTimeout(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.config.height = 300;

            if (window.CodeMirror) {
                $(".codeeditor").each(function () {
                    let editor = CodeMirror.fromTextArea(this, {
                        lineNumbers: true,
                        theme: "duotone-dark",
                        mode: 'javascript',
                        height: 200
                    });
                    editor.setSize("100%", 200);
                });
            }
        }, 300);


    });

</script>

<form enctype="multipart/form-data" method="post" action="email/send_mail">
    <div class="form-group">

        <select data-placeholder="Select Email" multiple="multiple" name="to[]" style="width: 100%" class="select2">
            <option value=""></option>
            <?php if (!empty($post)): foreach ($post as $emp) : ?>
                <option value="<?php echo $emp->email ?>"><?php echo $emp->first_name . ' ' . $emp->last_name . '(<small>' . $emp->email . '</small>)' ?></option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>

    </div>
    <div class="form-group">
        <input type="text" name="subject" class="form-control" placeholder="Subject">
    </div>
    <textarea name="message_body" id="ckeditor">Put your things hear</textarea>

    <div class="form-group">


        <div class="fileinput fileinput-new" data-provides="fileinput">


                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">
                        <i class="fa fa-paperclip"></i> Attachment
                    </span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="attach_file">
                </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none;">&times;</a>


            <p class="help-block">Max. 15 MB</p>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" name="send" value="" class="btn btn-primary btn-sm">
            <i class="fa fa-envelope-o"></i> Send
        </button>

    </div>


</form>
