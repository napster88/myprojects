<?php
/**
 * Initialize all the things. 
 */



function pkcs5_pad($text, $blocksize)
{
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}

function pkcs5_unpad($text)
{
    $pad = ord($text{strlen($text) - 1});
    if ($pad > strlen($text))
        return false;
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
        return false;
    return substr($text, 0, -1 * $pad);
}

//encrypt function to send encrypted data to weebox api
function encrypt($plainText, $key)
{
    $secretKey  = hex2bin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    /* Open module and Create IV (Intialization Vector) */
    $openMode   = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    $blockSize  = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
    $plainPad   = pkcs5_pad($plainText, $blockSize);
    /* Initialize encryption handle */
    if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1)
    {
        
    }
    /* Encrypt data */
    $encryptedText = mcrypt_generic($openMode, $plainPad);
    mcrypt_generic_deinit($openMode);
    return bin2hex($encryptedText);
}

//encrypt function ends here
//decrypt function to decrypt data coming back from weebox api
function decrypt($encryptedText, $key)
{
    $secretKey     = hex2bin(md5($key));
    $initVector    = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText = hex2bin($encryptedText);
    /* Open module, and create IV */
    $openMode      = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    mcrypt_generic_init($openMode, $secretKey, $initVector);
    $decryptedText = mdecrypt_generic($openMode, $encryptedText);
// Drop nulls from end of string $decryptedText = rtrim($decryptedText, "\0");
    // Returns "Decrypted string: some text here"
    mcrypt_generic_deinit($openMode);
    return $decryptedText;
}

/* unique_multidim_array */

function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i          = 0;
    $key_array  = array();

    foreach ($array as $val)
    {
        if (!in_array($val[$key], $key_array))
        {
            $key_array[$i]  = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

//Making jQuery Google API
function modify_jquery()
{
    if (!is_admin())
    {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js', false, '2.2.1');
        wp_enqueue_script('jquery');
    }
}

add_action('init', 'modify_jquery');


/* Extract Integer from String */
function extract_numbers($string)
{
    preg_match_all('/([\d]+)/', $string, $match);

    return $match[0];
}

function the_array_search($find, $items)
{
    foreach ($items as $key => $value)
    {
        $current_key = $key;
        if (
                $find === $value
                OR (
                is_array($value) && the_array_search($find, $value) !== false
                )
        )
        {
            return $current_key;
        }
    }
    return false;
}

function truncate($text, $chars = 25)
{
    $text = $text . " ";
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text . "...";
    return $text;
}


//add_filter( 'jcmc_custom_section','jc_custom_section' );
function jc_custom_section($sections)
{
    $paymentform         = "madhav";
    $sections['payment'] = array(
        'content'   => $paymentform, // content of the section
        'logged_in' => true        // visible to non logged in customers
    );
    return $sections;
}

/**
 * Generate a string of random characters
 *
 * @param array $args   The arguments to use for this function
 * @return string|null  The random string generated by this function (only 'if($args['echo'] === false)')
 */
function generateRandomString($length = 6)
{
    $characters       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/* Run api to get test for selfiscan */

function get_selfiscantest()
{
    $selfiscan_test      = wp_remote_get('http://mywheebox.com:8091/wheeboxApi/testsDetail/0017000/');
    $selfiscan_test_data = $selfiscan_test['body'];
    update_option('selfiscan_test', $selfiscan_test_data);
}

/* convert object array to array */

function stdToArray($obj)
{
    $reaged = (array) $obj;
    foreach ($reaged as $key => &$field)
    {
        if (is_object($field))
            $field = stdToArray($field);
    }
    return $reaged;
}

/* population dropdown for test */

function get_dropdownlist_selfiscantest()
{
    $testJson  = get_option('selfiscan_test');
    $testArray = (json_decode($testJson));
    $b         = stdToArray($testArray);

    print_r($b);

    //echo "<pre>";
    //print_r($b);
}

add_filter('gform_field_validation', 'validate_phone', 10, 4);

function validate_phone($result, $value, $form, $field)
{
    $pattern = "/^\d{10,}$/";
    if ($field->type == 'phone' && $value == '')
    {
        $result['is_valid'] = false;
        $result['message']  = 'This field is required';
    }
    elseif ($field->type == 'phone' && !preg_match($pattern, $value))
    {
        $result['is_valid'] = false;
        $result['message']  = 'Please enter a valid phone number';
    }

    $emailpattern = "/^[A-z0-9_.\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/";
    if ($field->type == 'email' && $value == '')
    {
        $result['is_valid'] = false;
        $result['message']  = 'This field is required';
    }
    elseif ($field->type == 'email' && !preg_match($emailpattern, $value))
    {
        $result['is_valid'] = false;
        $result['message']  = 'Please enter a valid Email';
    }

    return $result;
}

function get_google_refer_contacts()
{

    session_start();

//include google api library
    require_once 'google-api/src/Google/autoload.php'; // or wherever autoload.php is located
//Create a Google application in Google Developers Console for obtaining your Client id and Client secret.
// https://www.design19.org/blog/import-google-contacts-with-php-or-javascript-using-google-contacts-api-and-oauth-2-0/
// Your redirect uri should be on a online server. Localhost will not work.
//Important : Your redirect uri should be added in Google Developers Console , in your Authorized redirect URIs
//Declare your Google Client ID, Google Client secret and Google redirect uri in  php variables
    $google_client_id     = '716526974564-4f09o8dcogcrsdu09qtt1sipunnde4hj.apps.googleusercontent.com';
    $google_client_secret = 'OwZqPQ7c0JV0KsV073oAHNU4';
    $google_redirect_uri  = get_bloginfo('url') . '/edit-profile/';

//setup new google client
    $client          = new Google_Client();
    $client->setApplicationName('Talentedge');
    $client->setClientid($google_client_id);
    $client->setClientSecret($google_client_secret);
    $client->setRedirectUri($google_redirect_uri);
    $client->setAccessType('online');
    $client->setScopes('https://www.google.com/m8/feeds');
    $googleImportUrl = $client->createAuthUrl();

//curl function
    function curl($url, $post = "")
    {
        $curl      = curl_init();
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($curl, CURLOPT_URL, $url);
        //The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        //The number of seconds to wait while trying to connect.
        if ($post != "")
        {
            curl_setopt($curl, CURLOPT_POST, 5);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
        //The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        //To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
        //To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        //The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        //To stop cURL from verifying the peer's certificate.
        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }

//google response with contact. We set a session and redirect back
    if (isset($_GET['code']))
    {
        $auth_code               = $_GET["code"];
        $_SESSION['google_code'] = $auth_code;
    }


    /*
      Check if we have session with our token code and retrieve all contacts, by sending an authorized GET request to the following URL : https://www.google.com/m8/feeds/contacts/default/full
      Upon success, the server responds with a HTTP 200 OK status code and the requested contacts feed. For more informations about parameters check Google API contacts documentation
     */
    if (isset($_SESSION['google_code']))
    {
        $auth_code   = $_SESSION['google_code'];
        $max_results = 5000;
        $fields      = array(
            'code'          => urlencode($auth_code),
            'client_id'     => urlencode($google_client_id),
            'client_secret' => urlencode($google_client_secret),
            'redirect_uri'  => urlencode($google_redirect_uri),
            'grant_type'    => urlencode('authorization_code')
        );
        $post        = '';
        foreach ($fields as $key => $value)
        {
            $post .= $key . '=' . $value . '&';
        }
        $post = rtrim($post, '&');


        $result      = curl('https://accounts.google.com/o/oauth2/token', $post);
        $response    = json_decode($result);
        $accesstoken = $response->access_token;
        $url         = 'https://www.google.com/m8/feeds/contacts/default/full?max-results=' . $max_results . '&alt=json&v=3.0&oauth_token=' . $accesstoken;
        $xmlresponse = curl($url);
        $contacts    = json_decode($xmlresponse, true);

        //deg ($contacts['feed']['entry']);

        $return = array();
        if (!empty($contacts['feed']['entry']))
        {
            foreach ($contacts['feed']['entry'] as $contact)
            {

                //$contactidlink = explode('/',$contact['id']['$t']);
                //$contactId = end($contactidlink);
                //retrieve user photo
                if (isset($contact['link'][0]['href']))
                {

                    $url = $contact['link'][0]['href'];

                    $url = $url . '&access_token=' . urlencode($accesstoken);

                    $curl = curl_init($url);

                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
                    curl_setopt($curl, CURLOPT_VERBOSE, true);

                    $image = curl_exec($curl);
                    curl_close($curl);


                    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" />';
                }

                //retrieve Name + email and store into array
                $return[] = array(
                    'name'  => $contact['title']['$t'],
                    'email' => $contact['gd$email'][0]['address'],
                    'image' => $image
                );
            }
        }

        $google_contacts = $return;

        unset($_SESSION['google_code']);

//Now that we have the google contacts stored in an array, display all in a table
        //Now that we have the google contacts stored in an array, display all in a table
        if (!empty($google_contacts))
        {
            ?>
            <div class="text-right"><img id="loading_image_invite" src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif"></div>
            <div class="text-right email_sent_invite">Email sent</div>
            <div class="send_invitation">
                <div class="wrap_invitation">
                    <div class="submitInvite">
                        <input class="btn-normal google_invite" type="submit" name="google_invite" value="Invite Friends">
                    </div>  
                    <div class="list_invite">
                        <div class="selectall">
                            <input type="checkbox" id="select_all"/> 
                            <label for="select_all">Select All</label>
                        </div>
                        <div class="search-invite-gplus pull-right">
                            <input id="search-hidden-mode-google" name="search" placeholder="Search Users" type="text" data-list=".invite_google_contacts" data-nodata="No results found" autocomplete="off">
                        </div>
                        <ul class="vertical invite_google_contacts">
            <?php
            $i = 1;
            foreach ($google_contacts as $contact)
            {
                ?>
                                <li class="in-users">
                                    <input id="<?php echo $i; ?>" class="checkbox" type="checkbox" name="invite_contacts" value="<?php echo $contact['email'] ?>">
                <?php
                echo '<label for="' . $i . '">' . $contact['name'] . '</label>';
                echo '<span>' . $contact['email'] . '</span>';
                ?>  
                                </li> 
                <?php $i++;
            } ?>
                        </ul>  
                    </div>

                </div>
            </div>
            <?php
        }
    }
    ?>
    <div class="googleplus1" style="display:none;">
        <a class="gluscontact" href="<?php echo $googleImportUrl; ?>">
            <div class="google_plus">Google Connect<i class="userpro-icon-google-plus fa pull-right"></i></div>
        </a>
    </div>
<?php
}

add_action('wp_ajax_send_inviteemail_ajax', 'send_inviteemail_ajax', 16);
add_action('wp_ajax_nopriv_send_inviteemail_ajax', 'send_inviteemail_ajax', 16);

function send_inviteemail_ajax()
{
    $user_id             = get_current_user_id();
    $user_info           = get_userdata($user_id);
    $user_emailid        = $user_info->user_email;
    $user_first_name     = $user_info->first_name;
    $user_reference_code = get_user_meta($user_id, 'user_reference_code', true);
    $siteUrl             = "https://talentedge.in/";
    //$siteUrl = 
    $headers             = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge <admission@talentedge.in>', 'Disposition-Notification-To: ' . $user_email . '\n');
    $subject             = 'Your Friend ' . $user_first_name . ' wants you to check out Talentedge';
    $existemailArray     = array();

    if (isset($_POST['gmaildata']))
    {
        $gmailInfo = $_POST['gmaildata'];
        $qry_args  = array(
            'post_status'    => 'publish', // optional
            'post_type'      => 'referrals', // Change to match your post_type
            'posts_per_page' => -1, // ALL posts
        );
        $the_query = new WP_Query($qry_args);
        if ($the_query->have_posts())
        {
            while ($the_query->have_posts()) : $the_query->the_post();
                /* updating the status */
                $post_id           = get_the_ID();
                $existemail        = get_field('user_email', $post_id);
                $existemailArray[] = $existemail;
            endwhile;
        }



        foreach ($gmailInfo as $email_gplus)
        {
            if (!in_array($email_gplus['email'], $existemailArray))
            {

                $my_post = array(
                    'post_title'  => $email_gplus['email'],
                    'post_status' => 'publish',
                    'post_type'   => 'referrals',
                    'post_author' => 1,
                    'meta_input'  => array(
                        'user_name'        => $email_gplus['name'],
                        'user_email'       => $email_gplus['email'],
                        'referred_by'      => $user_emailid,
                        'referred_by_code' => $user_reference_code,
                        'referred_by_id'   => $user_id,
                        'status'           => 'Pending'
                    ),
                );

                $inserpost_id = wp_insert_post($my_post);

                if ($inserpost_id)
                {

                    $body = '<p> Hey ' . $email_gplus['name'] . ', <br><br>Your friend ' . $user_first_name . ' (' . $user_emailid . ') recently visited 
              <a href= ' . $siteUrl . '?utm_source=AutoEmailer&utm_campaign=RefferalInvitation&utm_medium=Email>Talentedge</a> 
              to explore our wide range of online certification courses from premium institutes like IIM, XLRI, MICA & SP Jain.  
              Over 1000 professionals like you chose us to enrol in courses in Marketing, Brand Management, HR, 
              Sales and Analytics for a career booster.<br><br>Have a look at our current course catalogue to find a course best suited for your career.
            <a href=' . $siteUrl . 'browse-courses/>Browse Courses<a><br><br>Thanks,<br>Team TalentEdge<br>www.talentedge.in';

                    $result = wp_mail($email_gplus['email'], $subject, $body, $headers);


                    $subjectReferrer = "Your Friend(s) Have been invited to Talentedge!";
                    $bodyreferrer    = '<p>Dear ' . $user_first_name . ', <br><br>Thank you for taking time to refer your friends to us. We will let your friend(s) know about 
            <a href="https://talentedge.in/?utm_source=AutoEmailer&amp;utm_campaign=ReferralThankYou&amp;utm_medium=Email">Talentedge</a> and introduce our 
            range of certification programs with them.<br><br>We will inform you if your friend enrols for a course. Not to mention the resulting reward because 
            of a successful enrolment.<br><br>Meanwhile, increase your chances of reward by referring more friends <a class="btn-normal " href="https://talentedge.in/edit-profile/#referEarn">Refer &amp; Earn</a>
            <br><br>Thanks,<br>Team TalentEdge<br>www.talentedge.in';
                    wp_mail($user_emailid, $subjectReferrer, $bodyreferrer, $headers);
                }
            }
        }
    }
    return $result;
}

add_action('wp_ajax_verifyemail_ajax', 'verifyemail_ajax', 16);
add_action('wp_ajax_nopriv_verifyemail_ajax', 'verifyemail_ajax', 16);

function verifyemail_ajax()
{
    //$user_id =  get_current_user_id();
    //$user_info = get_userdata($user_id);
    //$user_emailid =  $user_info->user_email;
    //$user_first_name =  $user_info->first_name;
    $random_verified = generateRandomString();
    $siteUrl         = get_bloginfo("url") . '?verified_user=' . $random_verified;
    //$user_reference_code = get_user_meta($user_id,'user_reference_code',true);
    $headers         = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge <admission@talentedge.in>', 'Disposition-Notification-To: ' . $user_email . '\n');
    $subject         = "Please verif your email";
    $body            = '<p> Hi,<br><br> ' . $user_first_name . ' Please activate the email by click on below link <a href="' . $siteUrl . '">Talentedge</a> 
              <br></br>Thanks,<br>Team TalentEdge';

    if (isset($_POST['postemail']))
    {
        $result = wp_mail($_POST['postemail'], $subject, $body, $headers);
    }
    return $result;
}


function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message)
{
    $file      = $path . $filename;
    $file_size = filesize($file);
    $handle    = fopen($file, "r");
    $content   = fread($handle, $file_size);
    fclose($handle);
    $content   = chunk_split(base64_encode($content));
    $uid       = md5(uniqid(time()));
    $header    = "From: " . $from_name . " <" . $from_mail . ">\r\n";
    $header    .= "Reply-To: " . $replyto . "\r\n";
    $header    .= "MIME-Version: 1.0\r\n";
    $header    .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
    $header    .= "This is a multi-part message in MIME format.\r\n";
    $header    .= "--" . $uid . "\r\n";
    $header    .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header    .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header    .= $message . "\r\n\r\n";
    $header    .= "--" . $uid . "\r\n";
    $header    .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n"; // use different content types here
    $header    .= "Content-Transfer-Encoding: base64\r\n";
    $header    .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
    $header    .= $content . "\r\n\r\n";
    $header    .= "--" . $uid . "--";
    if (mail($mailto, $subject, "", $header))
    {
        echo "mail send ... OK"; // or use booleans here
    }
    else
    {
        echo "mail send ... ERROR!";
    }
}


/* CRM Functons Starts */

function rand_string($length)
{

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars), 0, $length);
}

function expl($str, $charlist = '|')
{
    if (!$charlist)
        return($str);
    $char   = $charlist[0];
    $matrix = explode($char, $str);
    for ($i = 0; $i < sizeof($matrix); $i++)
    {
        $matrix[$i] = expl($matrix[$i], substr($charlist, 1));
    }
    return($matrix);
}

function multi_implode(array $glues, array $array)
{
    $out = "";
    $g   = array_shift($glues);
    $c   = count($array);
    $i   = 0;
    foreach ($array as $val)
    {
        if (is_array($val))
        {
            $out .= multi_implode($glues, $val);
        }
        else
        {
            $out .= (string) $val;
        }
        $i++;
        if ($i < $c)
        {
            $out .= $g;
        }
    }
    return $out;
}

function fix_json($j)
{
    $j = trim($j);
    $j = ltrim($j, '(');
    $j = rtrim($j, ')');
    $a = preg_split('#(?<!\\\\)\"#', $j);
    for ($i = 0; $i < count($a); $i += 2)
    {
        $s     = $a[$i];
        $s     = preg_replace('#([^\s\[\]\{\}\:\,]+):#', '"\1":', $s);
        $a[$i] = $s;
    }
    //var_dump($a);
    $j = implode('"', $a);
    //var_dump( $j );
    return $j;
}

function numberTowords($number)
{
    $my_number = $number;

    if (($number < 0) || ($number > 999999999))
    {
        throw new Exception("Number is out of range");
    }
    $Kt     = floor($number / 10000000); /* Koti */
    $number -= $Kt * 10000000;
    $Gn     = floor($number / 100000);  /* lakh  */
    $number -= $Gn * 100000;
    $kn     = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn     = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn     = floor($number / 10);       /* Tens (deca) */
    $n      = $number % 10;               /* Ones */

    $res = "";

    if ($Kt)
    {
        $res .= numberTowords($Kt) . " Carore ";
    }
    if ($Gn)
    {
        $res .= numberTowords($Gn) . " Lakh";
    }

    if ($kn)
    {
        $res .= (empty($res) ? "" : " ") .
                numberTowords($kn) . " Thousand";
    }

    if ($Hn)
    {
        $res .= (empty($res) ? "" : " ") .
                numberTowords($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety");

    if ($Dn || $n)
    {
        if (!empty($res))
        {
            $res .= " and ";
        }

        if ($Dn < 2)
        {
            $res .= $ones[$Dn * 10 + $n];
        }
        else
        {
            $res .= $tens[$Dn];

            if ($n)
            {
                $res .= " " . $ones[$n];
            }
        }
    }

    if (empty($res))
    {
        $res = "zero";
    }

    return $res;
}

function create_selfi_user()
{
    ob_start();
    $user_id    = get_current_user_id();
    $filterData = new stdClass();

    $timestamp = strtotime($_POST['dob']);
    $new_date  = date('Y-m-d', $timestamp);

    $filterData->firstName = $_POST['fname'];

    $filterData->lastName = $_POST['lname'];

    $filterData->loginId = $_POST['email'];
    $filterData->dob     = $new_date;
    $filterData->gender  = $_POST['gender'];
    $filterData->city    = $_POST['city'];
    $filterData->state   = $_POST['state'];
    $filterData->country = $_POST['country'];
    $filterData          = json_encode($filterData);
//sprint_r($filterData);
    $key                 = 'CbddmBz6lmP47467';
    $secretKey           = hex2bin(md5($key));
    $initVector          = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    /* Open module and Create IV (Intialization Vector) */
    $openMode            = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    $blockSize           = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
    $plainPad            = pkcs5_pad($filterData, $blockSize);
    /* Initialize encryption handle */
    if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1)
    {
        
    }
    /* Encrypt data */
    $encryptedText = mcrypt_generic($openMode, $plainPad);
    mcrypt_generic_deinit($openMode);
    $filterData    = bin2hex($encryptedText);
    $ch            = curl_init();
    $token         = "2eW5fbMNJQLTtMn";
    $headers       = array('Content-Type: application/json', 'Accept:
application/json;charset=utf-8', 'accessToken: ' . $token);
    curl_setopt($ch, CURLOPT_URL, "http://mywheebox.com/wheeboxApi/registration/0017000?val=" . $filterData)
    ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('accessToken: ' . $token . ''));
    $server_output = curl_exec($ch);
    curl_close($ch);
//print_r($server_output);
    $secretKey     = hex2bin(md5($key));
    $initVector    = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText = hex2bin($server_output);
    /* Open module, and create IV */
    $openMode      = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    mcrypt_generic_init($openMode, $secretKey, $initVector);
    $decryptedText = mdecrypt_generic($openMode, $encryptedText);
// Drop nulls from end of string $decryptedText = rtrim($decryptedText, "\0");
    // Returns "Decrypted string: some text here"
    mcrypt_generic_deinit($openMode);

    if (preg_match("/\"status\":\"error\"/", $decryptedText, $match))
    {
        $data = array('email' => $_POST['email'], 'status' => 1);
    }
    else
    {
        $data = array('email' => $_POST['email'], 'status' => 0);
        update_user_meta($user_id, 'selfiscan', 1);
    }
    wp_send_json($data);
    die();
}

add_action('wp_ajax_get_selfi_key', 'get_selfi_key', 10);

//add_action('wp_ajax_nopriv_create_selfi_user', 'create_selfi_user', 10);

function get_selfi_key()
{
    ob_start();
    $key     = 'CbddmBz6lmP47467';
    $user_id = get_current_user_id();
    $email   = get_user_meta($customer_id, 'billing_email', true);
    //print_r($filterData);
    //$str = $filterData->domain.'/'.$filterData->testName.'/'.$filterData->emailId.'/OSR';
    $encryptDomain   = encrypt('Interest Test', $key);
    $encryptTestName = encrypt('Selfie Scan', $key);
    $encryptEmail    = encrypt($email, $key);
    $encryptOSR      = encrypt('OSR', $key);
    $encryptData     = $encryptDomain . '/' . $encryptTestName . '/' . $encryptEmail . '/' . $encryptOSR;
    //echo 'Encrypt Data:<br>';
    //print_r($encryptData);


    $ch            = curl_init();
    $token         = "2eW5fbMNJQLTtMn";
    $headers       = array('Content-Type: application/json', 'Accept:
      application/json;charset=utf-8', 'accessToken: ' . $token);
    curl_setopt($ch, CURLOPT_URL, "http://mywheebox.com/wheeboxApi/testlink/0017000/" . $encryptData)
    ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('accessToken: ' . $token . ''));
    $server_output = curl_exec($ch);
    curl_close($ch);

    //echo 'Server Output:<br>';
    //print_r($server_output);
    $decryptData = decrypt($server_output, $key);
    //echo 'Decrypt Data:<br>';
    //print_r($decryptData);
    //$fdata=json_decode( preg_replace('/\u0005/', '', $decryptData),true );
    $fdata = json_decode($decryptData);
    //echo 'Data after json decode:<br>';
    //print_r($fdata);

    if (preg_match("/\"status\":\"error\"/", $decryptedText, $match))
    {
        $data = array('email' => $_POST['email'], 'status' => 1);
    }
    else
    {
        $data = array('email' => $_POST['email'], 'status' => 0);
    }


    wp_send_json($data);
    die();
}

add_filter("gform_field_validation_15_8", 'validate_tcs', 10, 4);

function validate_tcs($result, $value, $form, $field)
{
    // Convert the checkbox input name value (returned as part of "field")
    // into the "underscored" ID version which is found in the $_POST
    foreach ($field['inputs'] as $input)
    {
        $input_post_value = 'input_' . str_replace('.', '_', $input['id']);

        // Validate the value
        if (!isset($_POST[$input_post_value]))
        {
            $result["is_valid"] = false;
            $result["message"]  = "You must accept <em>all</em> of the Terms and Conditions";
        }
    }

    return $result;
}

add_filter("gform_field_validation_16_8", 'validate_tcs_16', 10, 4);

function validate_tcs_16($result, $value, $form, $field)
{
    // Convert the checkbox input name value (returned as part of "field")
    // into the "underscored" ID version which is found in the $_POST
    foreach ($field['inputs'] as $input)
    {
        $input_post_value = 'input_' . str_replace('.', '_', $input['id']);

        // Validate the value
        if (!isset($_POST[$input_post_value]))
        {
            $result["is_valid"] = false;
            $result["message"]  = "You must accept <em>all</em> of the Terms and Conditions";
        }
    }

    return $result;
}

add_action('admin_head', 'addcustomstyle');

function addcustomstyle() {
  echo '<style>
   .sumitbhalla #dashboard-widgets .postbox {display:none} 
   .sumitbhalla #dashboard-widgets .postbox#woocommerce_dashboard_recent_reviews {display:block!important} 
   .sumitbhalla #dashboard-widgets .postbox#woocommerce_dashboard_status {display:block!important} 
   .sumitbhalla #adminmenu li.menu-top-first,.sumitbhalla #adminmenu li.menu-top , .sumitbhalla  #wp-admin-bar-comments, .sumitbhalla  #wp-admin-bar-new-content, .sumitbhalla  #wp-admin-bar-wpseo-menu, .sumitbhalla  #wp-admin-bar-gform-forms {display:none} 
   .sumitbhalla #adminmenu li#menu-posts-shop_order {display:block} 
   .sumitbhalla #adminmenu li#menu-posts-referrals {display:block} 
   .sumitbhalla #adminmenu li#toplevel_page_wc-reports {display:block} 
   .sumitbhalla #adminmenu li#menu-users {display:block} 
   .sumitbhalla #adminmenu li#menu-dashboard {display:block} 
  </style>';
}

