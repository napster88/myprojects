jQuery(document).ready(function($) {
	
	$( "#from_date" ).datepicker({
      defaultDate: "+1w",
	  changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to_date" ).datepicker({
      defaultDate: "+1w",
	  changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
		//location.reload(true);
      },
	  onSelect: function( selectedDate ) {
		$('#dateRangeForm').submit();
      }
    });
    
    $('#wpms_action').click(function() {
        $('#error_login').hide();
        var email = $.trim($('#to').val());
        var sub = $.trim($('#subject').val());
        var msg = $.trim($('#email_message').val());
        var err = '';
        if ( email == '' ) {
            err += '<p>Please enter email address.</p>';
        }else
        if( !IsEmail(email)) {
            err += '<p>Please enter valid email address.</p>';
        }
        if ( sub == '' ) {
            err += '<p>Please enter email subject.</p>';
        }
        if ( msg == '' ) {
            err += '<p>Please enter email message.</p>';
        }
        if ( err != '' ) {
            $('#show_error').html(err);
            $('#show_error').addClass('error');
            $('#show_error').show();
            return false;
        }
    });
    $('#submit').click(function() {
        $('#error_login').hide();
        var email = $.trim($('#mail_from').val());
        var smtp_user = $.trim($('#smtp_user').val());
        var smtp_pass = $.trim($('#smtp_pass').val());
        var err = '';
        if( !IsEmail(email)) {
            err += '<p>Please enter valid email address in From Email field.</p>';
        }
        if ( $('#smtp_auth_true').is(':checked') ) {
            if ( smtp_user == '' || smtp_pass == '' )
                err += '<p>Please enter smtp username/password details.</p>';
        }
        if ( err != '' ) {
            $('#smtp_error').html(err);
            $('#smtp_error').addClass('error');
            $('#smtp_error').show();
            return false;
        }
    });
    
});

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
