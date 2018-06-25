
<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description:  controls which link show up in the upper right hand corner of the app
 ********************************************************************************/
global $app_strings, $current_user,$db;
		$id = $current_user->id;

?>

<script src="http://js.pusher.com/3.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('467cd9d1723f2650b8ad', {
      encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
	var logged_in_user_id = '<?=$id ?>';
    channel.bind(logged_in_user_id, function(data) {
		//~ alert(data.first_name+"-"+data.last_name+"-"+data.email_address+"-"+data.primary_address_country+"-"+data.batch_name+"-"+data.programe_name+"-"+data.programe_name+"-"+data.education_c+"-"+data.work_experience_c)
		
		var params = "&disposition_id="+data.dispo_id+"&lead_id="+data.lead_id+"&user_id="+logged_in_user_id+"&from_pusher=1&mobile="+data.mobile+"&fname="+data.first_name+"&lname="+data.last_name+"&email="+data.email_address+"&address="+data.primary_address_country+"&bname="+data.batch_name+"&pname="+data.programe_name+"&edu="+data.education_c+"&work="+data.work_experience_c;
		

		var url_open = "http://te.engeniatech.in/index.php?entryPoint=openDispositionPopup"+params;
		//~ var url_open = "http://localhost/TalentEdge/index.php?entryPoint=openDispositionPopup"+params;
      
			window.open(url_open, '_blank', 'location=yes,height=570,width=520,status=yes');
      
    });
		
</script>
