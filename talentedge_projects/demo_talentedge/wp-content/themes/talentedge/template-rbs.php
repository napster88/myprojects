<?php
/**
 * The template for displaying rbs page.
 *
 * Template Name: Rbs Page
 *
 */
//get_header(); 
?>

<style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
          
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode:bicubic;
        }

        *[x-apple-data-detectors],  /* iOS */
        .x-gmail-data-detectors,    /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
           display: none !important;
           opacity: 0.01 !important;
       }
       img.g-img + div {
           display: none !important;
       }

        .button-link {
            text-decoration: none !important;
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }
		@media only screen and (max-width: 599px){*[class].deviceWidth{width:300px!important; padding:0;}
		*[class].deviceWidth1{width:270px!important; padding:0; border-top:1px solid #bebebe;}
		*[class].deviceWidth_inline{width:300px!important; display: inline!important; padding:0;}
		*[class].center{text-align: center!important;}
		*[class].body_copy{width:100%;}
		td.main_nav td{display: none; padding: 0 !important;}
		td.main_nav a{display:none; padding:10px 0; border-bottom:1px solid #bebebe;}
		*[class].col{display: block; margin:0 0 20px 0;}
		*[class].col1{display:inline; margin:0 20px 0 0;}
		*[class].col2{display:inline;}
		}
		
		@media only screen and (min-width : 320px) and (max-width : 599px){*[class].deviceWidth{width:300px!important; padding:0;}
		*[class].deviceWidth1{width:300px!important; padding:0; border-top:1px solid #bebebe;}
		*[class].deviceWidth_inline{width:300px!important; display: inline!important; padding:0;}
		*[class].center{text-align: center!important;}
		*[class].body_copy{width:100%;}
		td.main_nav td{display: none; padding: 0 !important;}
		td.main_nav a{display:none; padding:10px 0; border-bottom:1px solid #bebebe;}
		*[class].col{display: block; margin:0 0 20px 0;}
		*[class].col1{display:inline; margin:0 20px 0 0;}
		*[class].col2{display:inline;}
		}

    </style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {
			*[class].deviceWidth{width:300px!important; padding:0;}
*[class].deviceWidth1{width:270px!important; padding:0; border-top:1px solid #bebebe;}
		*[class].deviceWidth_inline{width:300px!important; display: inline!important; padding:0;}
            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
				padding:10px 0 !important;
            }
            /* And center justify these ones. */
            
            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
             
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 15px !important;
                line-height: 17px !important;
            }
        }
		 .stack-column,
            .stack-column-center {
               
                padding:0 7px;
            }

    </style>

</head>
<!--<body width="100%" bgcolor="#ffffff" style="margin: 0; mso-line-height-rule: exactly;">-->
    <center style="width: 100%; background: #ffffff; text-align: left;">

        <!-- Email Body : BEGIN -->
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
        <tr><td>
 <table role="presentation" bgcolor="#008fbf" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 7px; text-align: center; font-family: sans-serif; font-size: 13px; line-height: 13px; color: #fff;">
                                <!--<p style="margin: 0;">Can’t see this email?<a href="#" target="_blank" style="color:#fff; text-decoration:none"> View </a> it in your browser.</p>-->
                            </td>
                        </tr>
                    </table></td></tr>
            <!-- Hero Image, Flush : BEGIN -->
            <tr>
                <td align="center">
                    <a href="#" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/banner.png" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; display:block;" class="g-img"></a>
                </td>
            </tr>
            <!-- Hero Image, Flush : END -->
 <tr>
                
                <tr bgcolor="#fff">
                                    <td valign="middle" style="font-family: sans-serif; font-size: 22px; line-height: 25px; color: #7c7c7c; font-weight:bold; padding: 20px 10px 5px; text-align: center; vertical-align:middle;" class="center-on-narrow">
                                     Talentedge brings executive programs from premium institutes
                                    </td>
                                </tr>
                </tr>
                  <tr>
                <td bgcolor="#000" align="center">
                    <a href="#" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/star.jpg" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; background: #dddddd; display:block;" class="g-img"></a>
                </td>
            </tr>
               
         
        <!-- 2 Columns : BEGIN -->
        <tr>
            <td bgcolor="#ffffff" align="center" valign="top">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    <tr align="center">
                      <!-- Column : BEGIN -->
                      
                        <!-- Column : END -->
                        <!-- Column : BEGIN -->
                        <td width="100%" class="stack-column-center">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                 
                                
                                <tr><td height="10"></td></tr>
                                
                                
                                <tr>
                                	<td>
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    <tr align="center">
                    	
                        
                        <!--- Human Resource Management XLRI --->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top" style="border:2px solid #fff;"  >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/xlri.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif; text-transform: uppercase;font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">HUMAN RESOURCE MANAGEMENT </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certified by XLRI</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">6 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/xlri-human-resource-management/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!---Financial Accounting--->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top" style="border:2px solid #fff;"  >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/xlri.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif; text-transform: uppercase;font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Financial Accounting
& Auditing

</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certified by XLRI</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">8 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/financial-accounting-auditing/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Certified Cyber Warrior -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/iitb.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif; text-transform: uppercase;font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certified Cyber Warrior

</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certificate from IIIT B</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">4 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/certified-cyber-warrior-iiit-bangalore/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                   
                    </tr>
                </table>
                                    
                                    </td>
                                </tr>
                                
                                <tr><td height="7"></td></tr>
                                
                             <tr>
                                	<td>
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    <tr align="center">
                         
                        <!-- Applied Financial Risk Management -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px 10px 6px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/kashipur.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Applied Financial Risk Management


</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certificate from IIM Kashipur</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">5 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/applied-financial-risk-management/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Project Management -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/xlri.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Project Management

</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certified by XLRI</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">6 month / Jun 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/xlri-project-management/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        <!-- Entrepreneurship -->
                   		<td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px 10px 6px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/kashipur.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Entrepreneurship


</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certificate from IIM Kashipur</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">4 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/entrepreneurship/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                                    
                                    </td>
                                </tr>
                                <tr><td height="7"></td></tr>
                                
                             <tr>
                                	<td>
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    	<tr align="center">
                    
                        <!-- Marketing Analytics & Customer Valuation -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px 10px 6px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/kashipur.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Marketing Analytics & Customer Valuation


</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certificate from IIM Kashipur</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">5 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/marketing-analytics/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Human Resource Management -->
                       	<td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top" style="border:2px solid #fff;"  >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/xlri.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Human Resource Management

</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certified by XLRI</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">6 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/xlri-human-resource-management/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Supply Chain Management -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/spjimr.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Supply Chain Management</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Get certified by SPJIMR</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">4.5 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/scm-spjimr/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                   
                    </tr>
                </table>
                                    
                                    </td>
                                </tr>
                             
                                 <tr><td height="7"></td></tr>
                                
                              <tr>
                                	<td>
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    	<tr align="center">
                    
                        <!-- Strategic Management -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px 10px 6px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/kashipur.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Strategic Management


</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certificate from IIM Kashipur</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">5 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/strategic-management-2/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Digital Marketing -->
                       	<td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top" style="border:2px solid #fff;"  >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/mica.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Digital Marketing

</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">PG Certificate from MICA</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">4.5 month / April 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/xlri-digital-marketing/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        <!-- Market Research and Data Analytics -->
                        <td width="33.33%" bgcolor="#f4f2f2" class="stack-column-center" valign="top"  style="border:2px solid #fff;" >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/mica.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Market Research and Data Analytics </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">PG Certificate from MICA</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">12 month / Aug 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/market-research-data-analytics/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                   
                    </tr>
                </table>
                                    
                                    </td>
                                </tr>
                                   <tr><td height="7"></td></tr>
                                
                             <tr>
                                	<td>
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                    			<tr align="center">
                         
                        
                        
                        
                        <!-- Advertising Management & PR -->
                        <td width="100%" bgcolor="#f4f2f2" class="stack-column-center" valign="top" style="border:2px solid #fff;"  >
                            <table role="presentation" cellspacing="0" bgcolor="#f4f2f2"  cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/mica.png"  alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" valign="top" style="font-family: sans-serif;text-transform: uppercase; font-size: 13px; line-height: 15px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Advertising Management & PR
</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">PG Certificate from MICA</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 12px; line-height: 14px; color: #7c7c7c;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">12 month / Aug 2018 Batch</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 16px; color: #234795;padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <a href="https://talentedge.in/advertising-public-relations/?utm_source=corp_rbs&utm_medium=emailer&utm_campaign=corp_rbscommonmailer" target="_blank" style="text-decoration:none;color:#008fbf;font-weight:bold;"><p style="margin: 0;">Know More
</p></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        
                        
                        
                                </tr>
                            </table>
                                
                                
                                
                                
                                
                                
                                </td></tr>
                                
                             
                             </table>
                                
                                    
                                   </td>
                                </tr>
                                
                                  
                                
                                
                                
                                
                                
                                
                                
                                
                                
                             
                                
                                
                                  <tr><td height="7"></td></tr>
                                
                                 
                                
                                <tr>
                                	<td>
                                    
                                    	<!-- Bottom Icons -->
                                    	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
                                        
                                        <tr><td height="20"></td></tr>
                    <tr align="center">
                    
                        <!-- Column : BEGIN -->
                        <td width="24.24%" class="stack-column-center" valign="top">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/icon-1.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td  valign="top" style="font-family: sans-serif; font-size: 14px; line-height: 16px; color: #000000;  padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Live & Interactive Online Classes - Not recorded lectures</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                          <!-- Column : BEGIN -->
                        <td width="24.24%" class="stack-column-center" valign="top">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/icon-3.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td  valign="top"  style="font-family: sans-serif; font-size: 14px; line-height: 16px; color: #000000;  padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Learn from anywhere without leaving your job</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                          <!-- Column : BEGIN -->
                        <td width="24.24%" class="stack-column-center" valign="top">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/icon-2.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"  style="font-family: sans-serif; font-size: 14px; line-height: 16px; color: #000000;  padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Certificate of Completion from Partner Institute</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                        <!-- Column : BEGIN -->
                        <td width="24.24%" class="stack-column-center" valign="top">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 10px; text-align: center">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/rbs/icon4.png" alt="alt_text" class="fluid" style="color: #555555;">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"  style="font-family: sans-serif; font-size: 14px; line-height: 16px; color: #000000;  padding: 0 1px 10px; text-align: center;" class="center-on-narrow">
                                        <p style="margin: 0;">Fees payable in installments</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                     
                    </tr>
                </table>
                                    
                                    </td>
                                </tr>
                                
                            </table>
                        </td>
                        <!-- Column : END -->
                       
                      
                    </tr>
              
         
       
        
         
                       <tr><td height="20"></td></tr>       
                                
                                
        <!-- 2 Columns : END -->
           

     

      

    </table>
    <!-- Email Body : END -->

  

    <!-- Full Bleed Background Section : BEGIN -->
   
    <!-- Full Bleed Background Section : END -->

    </center>

<?php           
//get_footer(); ?>