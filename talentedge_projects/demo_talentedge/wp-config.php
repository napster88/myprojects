<?php
//echo 'test'; die;

define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/html/lb/wp-content/plugins/wp-super-cache/' );


# Database Configuration
define( 'DB_NAME', 'wp_talentedge' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'TE@db))&()!' );
define( 'DB_HOST', 'localhost' );
//define( 'DB_HOST_SLAVE', 'talentedge-site-db.cdftgd7ki47z.ap-south-1.rds.amazonaws.com' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'te_';
#if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
#      $_SERVER['HTTPS']='on';
//echo "askdjhfka";exit;
# Security Salts, Keys, Etc
define('AUTH_KEY', 'h%;brhN2SISs[J>l-~}[JNkf$9-`m<8}30zB-FB`)qhTCF+#1D8w66K`G+(^#ECH');
define('SECURE_AUTH_KEY', ';.5),|GA=`%{(H}>oAac>fk%y8|1r0hChG@B@Mx3Tu[XsDf w:}baZcyl_kV-b)u');
define('LOGGED_IN_KEY', 'X;Mb2)Qs0kI1/50=2#jy!kXZ[tK|7Y|%7Km)Pl1V.xU#v%yjPBT9Ay8QlNY*kC!J');
define('NONCE_KEY', '|#FT`!qr/@XTGe]DZSB-UAVgu}=h9Td$vn;b(W{7mgOa?Q#dY-qMC^1Og)jq)p7V');
define('AUTH_SALT',        '3Ft W+GocI<s}i/KK-Q%2Q1%jXKU,UURh)Yu?~-On ;B:&=&h=ZB=RQKf&o>&WeH');
define('SECURE_AUTH_SALT', 'S3.}QyTUE(.`P,UG2u7WT{[ >2pe5)v%ZC>JL!AyubKk%b=~>*]Vc??`).)w0OMq');
define('LOGGED_IN_SALT',   '}hsNevH1SoYAe2wC^8*M_z@kl3{Z{^oZc< @U,st~[oI+N%`0:q@vd+-,eI) DWi');
define('NONCE_SALT',       'Rrk-UM:ME|-*>U)I?Bt@Qnu!o}y|Rj1;+d5?HhZ#>KY_z-ipGr|l;8tX(824f8+>');

define( 'WP_MEMORY_LIMIT', '1024M' );
# Localized Language Stuff
#define('WP_HOME','https://lb.talentedge.in');
#define('WP_SITEURL','https://lb.talentedge.in');

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'talentedge' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

#define( 'WPE_APIKEY', 'e7a5f8240b41c64aa1621a01711be39eee484e36' );

#define( 'WPE_CLUSTER_ID', '114550' );

#define( 'WPE_CLUSTER_TYPE', 'pod' );

#define( 'WPE_ISP', true );

#define( 'WPE_BPOD', false );

#define( 'WPE_RO_FILESYSTEM', false );

#define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

#define( 'WPE_SFTP_PORT', 2222 );

#define( 'WPE_LBMASTER_IP', '' );

#define( 'WPE_CDN_DISABLE_ALLOWED', false );

#define( 'DISALLOW_FILE_MODS', FALSE );

#define( 'DISALLOW_FILE_EDIT', FALSE );

#define( 'DISABLE_WP_CRON', false );

#define( 'WPE_FORCE_SSL_LOGIN', false );

#define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

#define( 'WPE_EXTERNAL_URL', false );

#define( 'WP_POST_REVISIONS', FALSE );

#define( 'WPE_WHITELABEL', 'wpengine' );

#define( 'WP_TURN_OFF_ADMIN_BAR', false );

#define( 'WPE_BETA_TESTER', false );

umask(0002);

#$wpe_cdn_uris=array ( );

#$wpe_no_cdn_uris=array ( );

#$wpe_content_regexs=array ( );

#$wpe_all_domains=array ( 0 => 'talentedge.in', 1 => 'www.talentedge.in', 2 => 'talentedge.wpengine.com', );

#$wpe_varnish_servers=array ( 0 => 'pod-114550', );

#$wpe_special_ips=array ( 0 => '35.184.2.74', );

#$wpe_ec_servers=array ( );

#$wpe_largefs=array ( );

//$wpe_netdna_domains=array ( 1 =>  array ( 'match' => 'talentedge.in', 'secure' => true, 'dns_check' => '0', 'zone' => '2jb9j7n786y2mcpn640xb9un', ), );
//$wpe_netdna_domains_secure=array ( 1 =>  array ( 'match' => 'talentedge.in', 'secure' => true, 'dns_check' => '0', 'zone' => '2jb9j7n786y2mcpn640xb9un', ), );

#$wpe_netdna_push_domains=array ( );

#$wpe_domain_mappings=array ( );

#$memcached_servers=array ( );


define('WPLANG','');

# WP Engine ID


# WP Engine Settings
//enable WP debug logging for troubleshooting:
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );


define( 'BASECITY', 'HR' );
define( 'GSTDATE', '2017-06-30 23:59:59' );
define( 'GST', '18' );
define( 'CGST', '9' );
define( 'SGST', '9' );

#define( 'CRM_URL', 'http://52.66.101.110' );

#define( 'CRM_URL_BASE', 'http://52.66.101.110/staging' );
define( 'CRM_URL', 'http://35.154.138.186' );

define( 'CRM_URL_BASE', 'http://35.154.138.186/crm' );
define( 'SLIQ_URL', 'http://sliq.talentedge.in/' );

$states=array(
         'AP' => array('name'=>'Andhra Pradesh','code'=>'28' ),
         'AR' => array('name'=>'Arunachal Pradesh','code'=> 12),
         'AS' => array('name'=>'Assam','code'=>18),
         'BR' => array('name'=>'Bihar','code'=> 10),
         'CT' => array('name'=>'Chhattisgarh','code'=> 22),
         'GA' => array('name'=>'Goa','code'=>30 ),'Goa',
         'GJ' => array('name'=>'Gujarat','code'=> 24),
         'HR' => array('name'=>'Haryana','code'=> 6),
         'HP' => array('name'=>'Himachal Pradesh','code'=>2 ),
         'JK' => array('name'=>'Jammu & Kashmir','code'=> 1),
         'JH' => array('name'=>'Jharkhand','code'=>20 ),
         'KA' => array('name'=>'Karnataka','code'=> 29),
         'KL' => array('name'=>'Kerala','code'=> 32),
         'MP' => array('name'=>'Madhya Pradesh','code'=> 23),
         'MH' => array('name'=>'Maharashtra','code'=>27 ),
         'MN' => array('name'=>'Manipur','code'=>14 ),
         'ML' => array('name'=>'Meghalaya','code'=> 17),
         'MZ' => array('name'=>'Mizoram','code'=>15 ),
         'NL' => array('name'=>'Nagaland','code'=> 13),
         'OR' => array('name'=>'Odisha','code'=> 21),
         'PB' => array('name'=>'Punjab','code'=> 3),
         'RJ' => array('name'=>'Rajasthan','code'=> 8),
         'SK' => array('name'=>'Sikkim','code'=> 11),
         'TN' => array('name'=>'Tamil Nadu','code'=> 33),
         'TR' => array('name'=>'Tripura','code'=> 16),
         'TG' => array('name'=>'Telangana','code'=> 36),
         'UK' => array('name'=>'Uttarakhand','code'=> 9),
         'UP' => array('name'=>'Uttar Pradesh','code'=>5 ),
         'WB' => array('name'=>'West Bengal','code'=>19 ),
         'AN' => array('name'=>'Andaman & Nicobar','code'=>35 ),
         'CH' => array('name'=>'Chandigarh','code'=> 4 ),
         'DN' => array('name'=>'Dadra and Nagar Haveli','code'=>26 ),
         'DD' => array('name'=>'Daman & Diu','code'=>25 ),
         'DL' => array('name'=>'Delhi','code'=>7 ),
         'LD' => array('name'=>'Lakshadweep','code'=> 31),
         'PY' => array('name'=>'Puducherry','code'=> 34)
                        );

define( 'WP_STATES', serialize($states) );
define( 'OFFER_KEY', 'IDFC Debit Card Offer@2896' ); //
define( 'IDFC_DATE', '2017-07-30' );



//echo "adgsjfjagjsdfhjahkj";exit;
#define( 'WPE_MONITOR_ADMIN_AJAX', true );


# That's It. Pencils down
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
