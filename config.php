<?php
/*These configs are neccessary in order to make Modern AAC work.*/

/*URL of website including http:// and without slash at the end! */
$config['website'] = "http://amnesys.sytes.net";

/*Database information*/
$config['database']['host'] = "127.0.0.1";
$config['database']['login'] = "root";
$config['database']['password'] = "";
$config['database']['database'] = "david";

/*End of most important configs*/


/*Name of server*/
$config['server_name'] = "amnesys"; 


/*List of cities, declare by using city ID and name eg. 2=>"Eternia City" etc.*/
$config['cities'] = array(1=>'Thais');


/*List of vocation available to choose when creating new character*/
$config['vocations'] = array(1=>"Sorcerer", 2=>"Druid", 3=>"Paladin", 4=>"Knight");


/*List of vocation that exists on server*/
$config['server_vocations'] = array(0=>"None", 1=>"Sorcerer", 2=>"Druid", 3=>"Paladin", 4=>"Knight", 5=>"Master Sorcerer", 6=>"Elder Druid", 7=>"Royal Paladin", 8=>"Elite Knight");

/*List of promotions, the key is vocation without promotion*/
$config['promotions'] = array(1=>"Master Sorcerer", 2=>"Elder Druid", 3=>"Royal Paladin", 4=>"Elite Knight");

/*Resitricted names*/
$config['restricted_names'] = array("god", "gamemaster", "admin", "account manager");

/*Names with any of this value cannot be created*/
$config['invalidNameTags'] = array("god", "gm", "cm", "gamemaster", "hoster", "admin");


/*ID and names of worlds*/
$config['worlds'] = array(0=>"Amnesys");

/* Addresses of each server */
$config['servers'][0] = array('address'=>'127.0.0.1', 'port'=>7171);
$config['servers'][1] = array('address'=>'127.0.0.1', 'port'=>7173);

/*Groups that exists on server*/
$config['groups'] = array(0=>"Player", 1=>"Player", 2=>"Tutor", 3=>"Senior Tutor", 4=>"Gamemaster", 5=>"Community Manager", 6=>"God");


/*Names of vocations as in database as samples. First key is world id and second vocation id.*/
$config['newchar_vocations'][0][0] = "Rook Sample";
$config['newchar_vocations'][0][1] = "Sorcerer Sample";
$config['newchar_vocations'][0][2] = "Druid Sample";
$config['newchar_vocations'][0][3] = "Paladin Sample";
$config['newchar_vocations'][0][4] = "Knight Sample";
$config['newchar_vocations'][1][0] = "Rook Sample";
$config['newchar_vocations'][1][1] = "Sorcerer Sample";
$config['newchar_vocations'][1][2] = "Druid Sample";
$config['newchar_vocations'][1][3] = "Paladin Sample";
$config['newchar_vocations'][1][4] = "Knight Sample";


/*Don't show chaarcters with group id higher than*/
$config['players_group_id_block'] = 3;


/*Min. level to create guild*/
$config['levelToCreateGuild'] = 30;


/*Limit of latest deaths*/
$config['latestdeathlimit'] = 20;

/*Limit news per page*/
$config['newsLimit'] = 10;

/*Limit comments per page*/
$config['commentLimit'] = 10;

/*Template that should be used on website*/
$config['layout'] = "default";

/*Title of a website*/
$config['title'] = "Amnesys Ots";


/*Premdays given when creating new account.*/
$config['premDays'] = 5;


/*Positions to start when creating character*/
$startPos['x'] = 32369;
$startPos['y'] = 32241;
$startPos['z'] = 7;


/*Trigger password for scaffolding system.*/
$config['scaffolding_trigger'] = "password";

/*Minimum page access for admin priviliges*/
$config['adminAccess'] = 5;

/*Max threads per page*/
$config['threadsLimit'] = 10;

/*Max posts per page in a thread*/
$config['postsLimit'] = 10;

/*Time between posts*/
$config['timeBetweenPosts'] = 30;

/*Limit of submissions per page in bug tracker*/
$config['bugtrackerPageLimit'] = 10;

/*Limit of houses on listing page*/
$config['housesLimit'] = 10;

/*Level to buy house*/
$config['houseLevel'] = 150;

/*Lenght of housing auction in seconds*/
$config['houseAuctionTime'] = 604800;

/*Default timezone*/
$config['timezone'] = "Europe/London";

/*Allowed IPs to use command prompt in admin panel*/
$config['allowedToUseCMD'] = array("127.0.0.1", "localhost");

/* Path to your UI theme */
$config['UItheme'] = "smoothness/jquery-ui-1.7.2.custom.css";

/*Destination to guilds logos folder, must be writable.*/
$config['uploads'] = "C:\\xampp\\htdocs\\system\\trunk\\public\\guild_logos\\";

/* Status timeout (recheck if server is online) */
$config['statusTimeout'] = 1 + (5 * 60); // Default to 5min

/* Wrap words longer than */
$config['wrap_words'] = 80;

/*Limit comments per page in videos view*/
$config['videoCommentsLimit'] = 10;

/*Limit of videos to show while searching*/
$config['videoSearchLimit'] = 10;
/*
######################################################################################################################
 * Do not touch any of the configs below if you are not 100% sure what you are doing!
 * These are config to the engine, usually the default ones works well so no change needed for unexperienced users.
######################################################################################################################
*/
// Tiny hack to figure if we use Windows or not.
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') @define('USING_WINDOWS', 1);
else @define('USING_WINDOWS', 0);

if(USING_WINDOWS) $config['engine']['PHPversion'] = "5.3.0";
else $config['engine']['PHPversion'] = "5.0.0";
$config['engine']['indexPage'] = "index.php";
$config['engine']['uri_protocol'] = "AUTO";
$config['engine']['charSET'] = "UTF-8";
$config['engine']['enable_hooks'] = FALSE;
$config['engine']['permitted_uri_chars'] = "a-z 0-9~%.:_\-'+";
$config['engine']['enable_query_strings'] = FALSE;
$config['engine']['global_xss_filtering'] = TRUE;
$config['engine']['compress_output'] = FALSE;
$config['engine']['proxy_ip'] = "";
$config['engine']['autoload_libraries'] = array();
$config['engine']['autoload_helper'] = array();
$config['engine']['autoload_plugin'] = array();
$config['engine']['autoload_config'] = array();
$config['engine']['autoload_model'] = array();
$config['engine']['default_controller'] = "home";
$config['engine']['platforms'] = array('windows nt 6.0' => 'Windows Longhorn', 'windows nt 5.2' => 'Windows 2003', 'windows nt 5.0' => 'Windows 2000', 'windows nt 5.1' => 'Windows XP', 'windows nt 4.0' => 'Windows NT 4.0', 'winnt4.0' => 'Windows NT 4.0', 'winnt 4.0' => 'Windows NT', 'winnt' => 'Windows NT', 'windows 98' => 'Windows 98', 'win98' => 'Windows 98', 'windows 95' => 'Windows 95', 'win95' => 'Windows 95', 'windows' => 'Unknown Windows OS', 'os x' => 'Mac OS X', 'ppc mac' => 'Power PC Mac', 'freebsd' => 'FreeBSD', 'ppc' => 'Macintosh', 'linux' => 'Linux', 'debian' => 'Debian', 'sunos' => 'Sun Solaris', 'beos' => 'BeOS', 'apachebench' => 'ApacheBench', 'aix' => 'AIX', 'irix' => 'Irix', 'osf' => 'DEC OSF', 'hp-ux' => 'HP-UX', 'netbsd' => 'NetBSD', 'bsdi' => 'BSDi', 'openbsd' => 'OpenBSD', 'gnu' => 'GNU/Linux', 'unix' => 'Unknown Unix OS' );
$config['engine']['mobiles'] = array('mobileexplorer' => 'Mobile Explorer', 'palmsource' => 'Palm', 'palmscape' => 'Palmscape', 'motorola' => "Motorola", 'nokia' => "Nokia", 'palm' => "Palm", 'iphone' => "Apple iPhone", 'ipod' => "Apple iPod Touch", 'sony' => "Sony Ericsson", 'ericsson' => "Sony Ericsson", 'blackberry' => "BlackBerry", 'cocoon' => "O2 Cocoon", 'blazer' => "Treo", 'lg' => "LG", 'amoi' => "Amoi", 'xda' => "XDA", 'mda' => "MDA", 'vario' => "Vario", 'htc' => "HTC", 'samsung' => "Samsung", 'sharp' => "Sharp", 'sie-' => "Siemens", 'alcatel' => "Alcatel", 'benq' => "BenQ", 'ipaq' => "HP iPaq", 'mot-' => "Motorola", 'playstation portable' => "PlayStation Portable", 'hiptop' => "Danger Hiptop", 'nec-' => "NEC", 'panasonic' => "Panasonic", 'philips' => "Philips", 'sagem' => "Sagem", 'sanyo' => "Sanyo", 'spv' => "SPV", 'zte' => "ZTE", 'sendo' => "Sendo", 'symbian' => "Symbian", 'SymbianOS' => "SymbianOS", 'elaine' => "Palm", 'palm' => "Palm", 'series60' => "Symbian S60", 'windows ce' => "Windows CE", 'obigo' => "Obigo", 'netfront' => "Netfront Browser", 'openwave' => "Openwave Browser", 'mobilexplorer' => "Mobile Explorer", 'operamini' => "Opera Mini", 'opera mini' => "Opera Mini", 'digital paths' => "Digital Paths", 'avantgo' => "AvantGo", 'xiino' => "Xiino", 'novarra' => "Novarra Transcoder", 'vodafone' => "Vodafone", 'docomo' => "NTT DoCoMo", 'o2' => "O2", 'mobile' => "Generic Mobile", 'wireless' => "Generic Mobile", 'j2me' => "Generic Mobile", 'midp' => "Generic Mobile", 'cldc' => "Generic Mobile", 'up.link' => "Generic Mobile", 'up.browser' => "Generic Mobile", 'smartphone' => "Generic Mobile", 'cellphone' => "Generic Mobile" );
$config['engine']['robots'] = array('googlebot' => 'Googlebot', 'msnbot' => 'MSNBot', 'slurp' => 'Inktomi Slurp', 'yahoo' => 'Yahoo', 'askjeeves' => 'AskJeeves', 'fastcrawler' => 'FastCrawler', 'infoseek' => 'InfoSeek Robot 1.0', 'lycos' => 'Lycos' );
$config['engine']['browsers'] = array('Opera' => 'Opera', 'MSIE' => 'Internet Explorer', 'Internet Explorer' => 'Internet Explorer', 'Shiira' => 'Shiira', 'Firefox' => 'Firefox', 'Chimera' => 'Chimera', 'Phoenix' => 'Phoenix', 'Firebird' => 'Firebird', 'Camino' => 'Camino', 'Netscape' => 'Netscape', 'OmniWeb' => 'OmniWeb', 'Safari' => 'Safari', 'Mozilla' => 'Mozilla', 'Konqueror' => 'Konqueror', 'icab' => 'iCab', 'Lynx' => 'Lynx', 'Links' => 'Links', 'hotjava' => 'HotJava', 'amaya' => 'Amaya', 'IBrowse' => 'IBrowse' );
$config['engine']['mimes'] = array('hqx' => 'application/mac-binhex40', 'cpt' => 'application/mac-compactpro', 'csv' => array ('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel' ), 'bin' => 'application/macbinary', 'dms' => 'application/octet-stream', 'lha' => 'application/octet-stream', 'lzh' => 'application/octet-stream', 'exe' => 'application/octet-stream', 'class' => 'application/octet-stream', 'psd' => 'application/x-photoshop', 'so' => 'application/octet-stream', 'sea' => 'application/octet-stream', 'dll' => 'application/octet-stream', 'oda' => 'application/oda', 'pdf' => array ('application/pdf', 'application/x-download' ), 'ai' => 'application/postscript', 'eps' => 'application/postscript', 'ps' => 'application/postscript', 'smi' => 'application/smil', 'smil' => 'application/smil', 'mif' => 'application/vnd.mif', 'xls' => array ('application/excel', 'application/vnd.ms-excel', 'application/msexcel' ), 'ppt' => array ('application/powerpoint', 'application/vnd.ms-powerpoint' ), 'wbxml' => 'application/wbxml', 'wmlc' => 'application/wmlc', 'dcr' => 'application/x-director', 'dir' => 'application/x-director', 'dxr' => 'application/x-director', 'dvi' => 'application/x-dvi', 'gtar' => 'application/x-gtar', 'gz' => 'application/x-gzip', 'php' => 'application/x-httpd-php', 'php4' => 'application/x-httpd-php', 'php3' => 'application/x-httpd-php', 'phtml' => 'application/x-httpd-php', 'phps' => 'application/x-httpd-php-source', 'js' => 'application/x-javascript', 'swf' => 'application/x-shockwave-flash', 'sit' => 'application/x-stuffit', 'tar' => 'application/x-tar', 'tgz' => 'application/x-tar', 'xhtml' => 'application/xhtml+xml', 'xht' => 'application/xhtml+xml', 'zip' => array ('application/x-zip', 'application/zip', 'application/x-zip-compressed' ), 'mid' => 'audio/midi', 'midi' => 'audio/midi', 'mpga' => 'audio/mpeg', 'mp2' => 'audio/mpeg', 'mp3' => array ('audio/mpeg', 'audio/mpg' ), 'aif' => 'audio/x-aiff', 'aiff' => 'audio/x-aiff', 'aifc' => 'audio/x-aiff', 'ram' => 'audio/x-pn-realaudio', 'rm' => 'audio/x-pn-realaudio', 'rpm' => 'audio/x-pn-realaudio-plugin', 'ra' => 'audio/x-realaudio', 'rv' => 'video/vnd.rn-realvideo', 'wav' => 'audio/x-wav', 'bmp' => 'image/bmp', 'gif' => 'image/gif', 'jpeg' => array ('image/jpeg', 'image/pjpeg' ), 'jpg' => array ('image/jpeg', 'image/pjpeg' ), 'jpe' => array ('image/jpeg', 'image/pjpeg' ), 'png' => array ('image/png', 'image/x-png' ), 'tiff' => 'image/tiff', 'tif' => 'image/tiff', 'css' => 'text/css', 'html' => 'text/html', 'htm' => 'text/html', 'shtml' => 'text/html', 'txt' => 'text/plain', 'text' => 'text/plain', 'log' => array ('text/plain', 'text/x-log' ), 'rtx' => 'text/richtext', 'rtf' => 'text/rtf', 'xml' => 'text/xml', 'xsl' => 'text/xml', 'mpeg' => 'video/mpeg', 'mpg' => 'video/mpeg', 'mpe' => 'video/mpeg', 'qt' => 'video/quicktime', 'mov' => 'video/quicktime', 'avi' => 'video/x-msvideo', 'movie' => 'video/x-sgi-movie', 'doc' => 'application/msword', 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'word' => array ('application/msword', 'application/octet-stream' ), 'xl' => 'application/excel', 'eml' => 'message/rfc822' );
$config['engine']['doctypes'] = array('xhtml11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">', 'xhtml1-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">', 'xhtml1-trans' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">', 'xhtml1-frame' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">', 'html5' => '<!DOCTYPE html>', 'html4-strict' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">', 'html4-trans' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">', 'html4-frame' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">' );
$config['engine']['url_suffix'] = "ide";
if(USING_WINDOWS == 1) {
//Load management is not available on Windows.
$config['engine']['loadManagement'] = false;
} else {
//Load management is a maximum ammount of processes website is using. If the website is flooded it will drop connection with users outside this amount.
$config['engine']['loadManagement'] = false;
$config['engine']['maxLoad'] = 60;
}




#DON'T TOUCH! DECLARING CONSTANS!
@DEFINE('LEVELTOCREATEGUILD', $config['levelToCreateGuild']);
@DEFINE('PREMDAYS', $config['premDays']);
@DEFINE('HOSTNAME', $config['database']['hostname']);
@DEFINE('USERNAME', $config['database']['login']);
@DEFINE('PASSWORD', $config['database']['password']);
@DEFINE('DATABASE', $config['database']['database']);
@DEFINE('WEBSITE', $config['website']);
?>