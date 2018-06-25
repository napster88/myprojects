jQuery(document).ready(function ($) {
    var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

    jQuery('.cscs_uploadbutton').click(function (e) {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(this);
        var id = button.data('input');
        _custom_media = true;
        wp.media.editor.send.attachment = function (props, attachment) {
            if (_custom_media) {
                $("#" + id).val(attachment.url);
            } else {
                return _orig_send_attachment.apply(this, [props, attachment]);
            }
            ;
        }

        wp.media.editor.open(button);
        return false;
    });

    jQuery('.add_media').on('click', function () {
        _custom_media = false;
    });

    jQuery('.cs-color-picker').wpColorPicker();
    jQuery('.cs-date-picker').datepicker({
        dateFormat: 'mm/dd/yy'
    });
    
    $('[name="cscs_generpotion_whitelisted_ips"]').attr('placeholder','192.168.1.1\n127.0.0.1');
});

/*
 * 
 * Create and let user to download subscriber list CSV.
 * 
 */

jQuery(document).on('click', '.downcsv', function () {
    window.open("index.php?rockython_createcsv=mailsubs&sub=true", '_blank');
});

jQuery(document).on('click', '.downbcc', function () {
    window.open("index.php?rockython_createbcc=mailsubs&sub=true", '_blank');
});


/*
 * 
 * Template options saving
 * 
 */

jQuery(document).ready(function () {
    jQuery('body.igniteup_page_cscs_options .preview-igniteup').on('click', function () {
        jQuery('body.igniteup_page_cscs_options .preview-igniteup, body.igniteup_page_cscs_options .submit').attr('disabled', 'disabled');
        jQuery('#saveResult').html("<span id='saveMessage' class='successModal'></span>");
        jQuery('#saveMessage').append("<span>Saving . . .</span>").show();
        prwindow = window.open('', 'igniteup');
        jQuery('#igniteup-template-options').ajaxSubmit({
            success: function () {
                jQuery('#saveMessage').html("<span>" + jQuery('#saveResult').data('text') + "</span>").show();
                jQuery('body.igniteup_page_cscs_options .preview-igniteup, body.igniteup_page_cscs_options .submit').removeAttr('disabled');
                var theurl = jQuery('body.igniteup_page_cscs_options .preview-igniteup').data('forward');
                prwindow.location = theurl;
                setTimeout("jQuery('#saveMessage').hide('slow');", 3000);
            },
            timeout: 10000,
            error: function () {
                jQuery('#saveMessage').hide('slow');
                alert('Saving process reached timeout! Please try again.');
                jQuery('body.igniteup_page_cscs_options .preview-igniteup, body.igniteup_page_cscs_options .submit').removeAttr('disabled');
            }
        });
        return false;
    });
});

/*
 * 
 * Reset defaults button action
 * 
 */

jQuery(document).on('click', 'body.igniteup_page_cscs_options .reset-igniteup', function (e) {
    if (!confirm("Are you sure to reset template options to defaults?"))
        return false;
    jQuery('.reset-supported').each(function () {
        var defval_ = jQuery(this).data('defval');
        jQuery(this).val(defval_);
    });
    jQuery('#igniteup-template-options').submit();
    e.preventDefault();
});

/*
 * 
 * Integration page manage sections
 * 
 */

jQuery(document).ready(function () {
    showHideIntegrationSection(true);
});

jQuery(document).on('change', '#cs-selected-provider', function () {
    showHideIntegrationSection();
});

function showHideIntegrationSection(load) {
    if (load !== true)
        jQuery('.cs-hidden-section').slideUp();
    var selected_val = jQuery('#cs-selected-provider').val();
    jQuery('#cs-section-' + selected_val).slideDown();
}

jQuery(document).ready(function () {
    jQuery.fn.bootstrapSwitch.defaults.size = 'mini';
    jQuery.fn.bootstrapSwitch.defaults.onColor = 'success';

    jQuery('.igniteup-checkbox-switch').each(function () {
        jQuery(this).bootstrapSwitch();
    });
});

/*
 * 
 * Set accordians for options
 * 
 */

jQuery(function () {
    jQuery(".igniteup-accordian").accordion({collapsible: true, heightStyle: "content"});
});

/*
 * 
 * Admin email subscription
 * 
 */

jQuery(document).on('click', '#igniteup_admin_subscribe', function () {
    var email_add = jQuery('#igniteup_admin_subscribe_email').val();
    jQuery(this).prop('disabled', true);

    jQuery.ajax({
        url: ajaxurl,
        dataType: 'json',
        data: {action: 'igniteup_admin_subscribe', admin_filled_email: email_add},
        type: 'POST',
        success: function (data) {
            if (data.error) {
                jQuery('#igniteup_admin_subscribe_email').prop('disabled', false);
                jQuery('#igniteup_admin_subscribe').prop('disabled', false);
                alert(data.message);
            } else {
                jQuery('span#ign-hide-after-success').hide();
                jQuery('span.thank-you-text').slideDown();
                jQuery('#igniteup_admin_subscribe').prop('disabled', true);
            }

        }
    });
});


/*
 
 * 
 * Generate random GET to skip
 * 
 */
jQuery(function (IGN) {
    IGN('#ign-button-generate-get-to-skip').click(function () {
        IGN('#ign-input-get-to-skip').val(generateRandomString(15));
    });
    IGN('#ign-button-edit-skip-with-get').click(function () {
        IGN(this).hide();
        IGN('#ign-anchor-skip-with-get-link').replaceWith(function () {
            return IGN("<span id='ign-anchor-skip-with-get-link'>" + IGN('#ign-anchor-skip-with-get-link').html() + "</span>");
        });
        IGN('#ign-anchor-skip-with-get-link-slug').hide();
        IGN('#ign-input-get-to-skip').parent().show();
    })
});

function generateRandomString(charCount) {
    charCount = typeof charCount === 'undefined' ? 5 : charCount;
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < charCount; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

/*
 * Time picker
 */
jQuery('input.cs-time-picker').timepicker({
    timeFormat: 'HH:mm:ss'
});
jQuery(document).on('keydown', 'input.cs-time-picker', function (e) {
    // Allow: delete, backspace, tab, escape, and enter
    if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
            // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
