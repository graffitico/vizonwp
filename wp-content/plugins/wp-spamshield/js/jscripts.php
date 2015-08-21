<?php
/*
WP-SpamShield Dynamic JS File
Version: 1.9.5.6
*/

/* Security Sanitization - BEGIN */
$id='';
if(!empty($_GET)||FALSE!==strpos($_SERVER['REQUEST_URI'],'?')){
	header('HTTP/1.1 403 Forbidden');
	die('ERROR: This resource will not function with a query string. Remove the query string from the URL and try again.');
	}
//if(!empty($_SERVER['REQUEST_METHOD'])){$wpss_request_method = $_SERVER['REQUEST_METHOD'];} else {$wpss_request_method = getenv('REQUEST_METHOD');}
$wpss_request_method = !empty($_SERVER['REQUEST_METHOD'])?$_SERVER['REQUEST_METHOD']:getenv('REQUEST_METHOD');
if(empty($wpss_request_method)){$wpss_request_method = '';}
if(!empty($_POST)||($wpss_request_method!='GET'&&$wpss_request_method!='HEAD')){
	header('HTTP/1.1 405 Method Not Allowed');
	die('ERROR: This resource does not accept requests of that type.');
	}
/* Security Sanitization - END */

/* Uncomment to use */
$wpss_js_start_time = wpss_js_microtime();

/* SET INITIAL VARS */
if(!defined('WPSS_SERVER_NAME')){define('WPSS_SERVER_NAME',wpss_js_get_server_name());}
if(!defined('WPSS_EOL')){$wpss_eol = defined('PHP_EOL')?PHP_EOL:wpss_js_eol();define('WPSS_EOL',$wpss_eol);}
function wpss_js_eol(){
	return wpss_js_casetrans('lower',substr(PHP_OS,0,3))==='win'?"\r\n":"\n";
	}

/* SESSION CHECK AND FUNCTIONS - BEGIN */
global $wpss_session_id;
$wpss_session_id = session_id();
if(empty($wpss_session_id)&& !headers_sent()){session_start();$wpss_session_id = session_id();}

if(!defined('RSMP_SERVER_NAME_NODOT')){$wpss_server_name_nodot = str_replace('.','',WPSS_SERVER_NAME);define('RSMP_SERVER_NAME_NODOT',$wpss_server_name_nodot);}
if(!defined('RSMP_HASH_ALT')){$wpss_alt_prefix = wpss_js_md5(RSMP_SERVER_NAME_NODOT);define('RSMP_HASH_ALT',$wpss_alt_prefix);}
if(!defined('RSMP_SITE_URL')&& !empty($_SESSION['wpss_site_url_'.RSMP_HASH_ALT])){$wpss_site_url = $_SESSION['wpss_site_url_'.RSMP_HASH_ALT];define('RSMP_SITE_URL',$wpss_site_url);}

if(defined('RSMP_SITE_URL')&& !defined('RSMP_HASH')){$wpss_hash_prefix = wpss_js_md5(RSMP_SITE_URL);define('RSMP_HASH',$wpss_hash_prefix);}
elseif(!empty($_SESSION)&& !empty($_COOKIE)&& !defined('RSMP_HASH')){
	foreach($_COOKIE as $ck_name => $ck_val){
		if(preg_match("~^comment_author_([a-z0-9]{32})$~i",$ck_name,$matches)){define('RSMP_HASH',$matches[1]);break;}
		}
	}

$wpss_lang_ck_key = 'UBR_LANG';
$wpss_lang_ck_val = 'default';
/* SESSION CHECK AND FUNCTIONS - END */

if(defined('RSMP_HASH')&& !empty($_SESSION)){
	/* IP, PAGE HITS, PAGES VISITED HISTORY - BEGIN */
	/* Initial IP Address when visitor first comes to site */
	$key_pages_hist 		= 'wpss_jscripts_referers_history_'.RSMP_HASH;
	$key_hits_per_page		= 'wpss_jscripts_referers_history_count_'.RSMP_HASH;
	$key_total_page_hits	= 'wpss_page_hits_js_'.RSMP_HASH;
	$key_ip_hist 			= 'wpss_jscripts_ip_history_'.RSMP_HASH;
	$key_init_ip			= 'wpss_user_ip_init_'.RSMP_HASH;
	$key_init_ua			= 'wpss_user_agent_init_'.RSMP_HASH;
	$key_init_mt			= 'wpss_time_init_'.RSMP_HASH;
	$key_init_dt			= 'wpss_timestamp_init_'.RSMP_HASH;
	$ck_key_init_dt			= 'NCS_INENTIM'; /* Initial Entry Time */
	$current_ip 			= $_SERVER['REMOTE_ADDR'];
	$current_ua 			= wpss_js_get_user_agent();
	$current_mt 			= $wpss_js_start_time; /* Site entry time - microtime */
	$current_dt 			= time(); /* Site entry time - timestamp */
	if(empty($_SESSION[$key_init_ip])){$_SESSION[$key_init_ip] = $current_ip;}
	if(empty($_SESSION[$key_init_ua])){$_SESSION[$key_init_ua] = $current_ua;}
	if(empty($_SESSION[$key_init_mt])){$_SESSION[$key_init_mt] = $current_mt;}
	if(empty($_SESSION[$key_init_dt])){$_SESSION[$key_init_dt] = $current_dt;}
	/* Set Cookie */
	if(empty($_COOKIE[$ck_key_init_dt])){$wpss_new_visit = TRUE;}
	/* IP History - Lets see if they change IP's */
	if(empty($_SESSION[$key_ip_hist])){$_SESSION[$key_ip_hist] = array();$_SESSION[$key_ip_hist][] = $current_ip;}
	if($current_ip!=$_SESSION[$key_init_ip]){$_SESSION[$key_ip_hist][] = $current_ip;}
	/* Page hits - this page is more reliable than main if caching is on, so we'll keep a separate count */
	if(empty($_SESSION[$key_total_page_hits])){$_SESSION[$key_total_page_hits] = 0;}
	++$_SESSION[$key_total_page_hits];
	/* Referrer History - More reliable way to keep a list of pages, than using main */
	if(empty($_SESSION[$key_pages_hist])){$_SESSION[$key_pages_hist] = array();}
	if(empty($_SESSION[$key_hits_per_page])){$_SESSION[$key_hits_per_page] = array();}
	if(!empty($_SERVER['HTTP_REFERER'])){
		$current_ref 	= trim(strip_tags($_SERVER['HTTP_REFERER']));
		$key_first_ref	= 'wpss_referer_init_'.RSMP_HASH;
		$key_last_ref	= 'wpss_jscripts_referer_last_'.RSMP_HASH;
		$_SESSION[$key_pages_hist][] = $current_ref;
		if(!isset($_SESSION[$key_hits_per_page][$current_ref])){
			$_SESSION[$key_hits_per_page][$current_ref] = 1;
			}
		++$_SESSION[$key_hits_per_page][$current_ref];
		/* First Referrer - Where Visitor Entered Site */
		if(empty($_SESSION[$key_first_ref])){$_SESSION[$key_first_ref] = $current_ref;}
		/* Last Referrer */
		if(empty($_SESSION[$key_last_ref])){$_SESSION[$key_last_ref] = '';}
		$_SESSION[$key_last_ref] = $current_ref;
		}
	/* IP, PAGE HITS, PAGES VISITED HISTORY - END */

	/* AUTHOR, EMAIL, URL HISTORY - BEGIN */

	/* Keep history of Author, Author Email, and Author URL in case they keep changing */
	/* This will expose spammer behavior patterns */

	/* Comment Author */
	$key_auth_hist 		= 'wpss_author_history_'.RSMP_HASH;
	$key_comment_auth 	= 'comment_author_'.RSMP_HASH;
	if(empty($_SESSION[$key_auth_hist])){
		$_SESSION[$key_auth_hist] = array();
		if(!empty($_COOKIE[$key_comment_auth])){
			$_SESSION[$key_comment_auth] 	= $_COOKIE[$key_comment_auth];
			$_SESSION[$key_auth_hist][] 	= $_COOKIE[$key_comment_auth];
			}
		}
	else {
		if(!empty($_COOKIE[$key_comment_auth])){
			$_SESSION[$key_comment_auth] = $_COOKIE[$key_comment_auth];
			}
		}
	/* Comment Author Email */
	$key_email_hist 	= 'wpss_author_email_history_'.RSMP_HASH;
	$key_comment_email	= 'comment_author_email_'.RSMP_HASH;
	if(empty($_SESSION[$key_email_hist])){
		$_SESSION[$key_email_hist] = array();
		if(!empty($_COOKIE[$key_comment_email])){
			$_SESSION[$key_comment_email] 	= $_COOKIE[$key_comment_email];
			$_SESSION[$key_email_hist][] 	= $_COOKIE[$key_comment_email];
			}
		}
	else {
		if(!empty($_COOKIE[$key_comment_email])){$_SESSION[$key_comment_email] = $_COOKIE[$key_comment_email];}
		}
	/* Comment Author URL */
	$key_auth_url_hist 	= 'wpss_author_url_history_'.RSMP_HASH;
	$key_comment_url	= 'comment_author_url_'.RSMP_HASH;
	if(empty($_SESSION[$key_auth_url_hist])){
		$_SESSION[$key_auth_url_hist] = array();
		if(!empty($_COOKIE[$key_comment_url])){
			$_SESSION[$key_comment_url] = $_COOKIE[$key_comment_url];
			$_SESSION[$key_auth_url_hist][] = $_COOKIE[$key_comment_url];
			}
		}
	else {
		if(!empty($_COOKIE[$key_comment_url])){$_SESSION[$key_comment_url] = $_COOKIE[$key_comment_url];}
		}
	/* AUTHOR, EMAIL, URL HISTORY - END */
	
	/* SESSION USER BLACKLIST CHECK - BEGIN */
	if(!empty($_SESSION['wpss_clear_blacklisted_user_'.RSMP_HASH])){$wpss_cl_sbluck = TRUE;unset($_SESSION['wpss_blacklisted_user_'.RSMP_HASH]);}
	elseif(!empty($_SESSION['wpss_blacklisted_user_'.RSMP_HASH])&& empty($_COOKIE[$wpss_lang_ck_key])){$wpss_sbluck = TRUE;}
	elseif(!empty($_COOKIE[$wpss_lang_ck_key])&& $_COOKIE[$wpss_lang_ck_key]==$wpss_lang_ck_val){$_SESSION['wpss_blacklisted_user_'.RSMP_HASH] = TRUE;}
	/* SESSION USER BLACKLIST CHECK - END */
	}

/* STANDARD FUNCTIONS - BEGIN */
function wpss_js_md5($str){
	/* Use this function instead of hash for compatibility */
	/* BUT hash is faster than md5, so use it whenever possible */
	return function_exists('hash')?hash('md5',$str):md5($str);
	}
function wpss_js_microtime(){
	return microtime(TRUE);
	}
function wpss_js_timer($start = NULL, $end = NULL, $show_seconds = FALSE, $precision = 8){
	if(empty($start)||empty($end)){$start = 0;$end = 0;}
	/* $precision will default to 8 but can be set to anything - 1,2,3,5,etc. */
	$total_time = $end - $start;
	$total_time_for = number_format($total_time,$precision);
	if(!empty($show_seconds)){$total_time_for .= ' seconds';}
	return $total_time_for;
	}
function wpss_js_get_user_agent(){
	return !empty($_SERVER['HTTP_USER_AGENT'])?trim(addslashes(strip_tags($_SERVER['HTTP_USER_AGENT']))):'';
	}
function wpss_js_get_server_addr(){
	if(!empty($_SERVER['SERVER_ADDR'])){$server_addr = $_SERVER['SERVER_ADDR'];} else {$server_addr = getenv('SERVER_ADDR');}
	if(empty($server_addr)){$server_addr = '';}
	return $server_addr;
	}
function wpss_js_get_server_name(){
	$wpss_site_domain 	= $server_name = '';
	$wpss_env_http_host	= getenv('HTTP_HOST');
	$wpss_env_srvr_name	= getenv('SERVER_NAME');
	if(!empty($_SERVER['HTTP_HOST'])){$server_name = $_SERVER['HTTP_HOST'];}
	elseif(!empty($wpss_env_http_host)){$server_name = $wpss_env_http_host;}
	elseif(!empty($_SERVER['SERVER_NAME'])){$server_name = $_SERVER['SERVER_NAME'];}
	elseif(!empty($wpss_env_srvr_name)){$server_name = $wpss_env_srvr_name;}
	return wpss_js_casetrans('lower',$server_name);
	}
function wpss_js_strlen($str){
	return function_exists('mb_strlen')?mb_strlen($str,'UTF-8'):strlen($str);
	}
function wpss_js_casetrans($type,$str){
	switch ($type){
		case 'upper':
			if(function_exists('mb_strtoupper')){return mb_strtoupper($str,'UTF-8');} else {return strtoupper($str);}
		case 'lower':
			if(function_exists('mb_strtolower')){return mb_strtolower($str,'UTF-8');} else {return strtolower($str);}
		case 'ucfirst':
			if(function_exists('mb_strtoupper')&& function_exists('mb_substr')){
				$strtmp = mb_strtoupper(mb_substr($str,0,1,'UTF-8'),'UTF-8'). mb_substr($str,1,NULL,'UTF-8');
				if(wpss_js_strlen($str)===wpss_js_strlen($strtmp)){return $strtmp;} else {return ucfirst($str);}
				}
			else {return ucfirst($str);}
		case 'ucwords':
			if(function_exists('mb_convert_case')){return mb_convert_case($str,MB_CASE_TITLE,'UTF-8');} else {return ucwords($str);}
		default:
			return $str;
		}
	}
/* STANDARD FUNCTIONS - END */

/* SET COOKIE VALUES - BEGIN */
/* global $wpss_session_id; */
if(empty($wpss_session_id)){$wpss_session_id = session_id();}
$wpss_ck_key_phrase 	= 'wpss_ckkey_'.RSMP_SERVER_NAME_NODOT.'_'.$wpss_session_id;
$wpss_ck_val_phrase 	= 'wpss_ckval_'.RSMP_SERVER_NAME_NODOT.'_'.$wpss_session_id;
$wpss_ck_key 			= wpss_js_md5($wpss_ck_key_phrase);
$wpss_ck_val 			= wpss_js_md5($wpss_ck_val_phrase);
$wpss_jq_key_phrase 	= 'wpss_jqkey_'.RSMP_SERVER_NAME_NODOT.'_'.$wpss_session_id;
$wpss_jq_val_phrase 	= 'wpss_jqval_'.RSMP_SERVER_NAME_NODOT.'_'.$wpss_session_id;
$wpss_jq_key 			= wpss_js_md5($wpss_jq_key_phrase);
$wpss_jq_val 			= wpss_js_md5($wpss_jq_val_phrase);
/* SET COOKIE VALUES - END */

/* Last thing before headers sent */
$_SESSION['wpss_sess_status'] = 'on';

if(!empty($current_ref)&& preg_match("~([&\?])form\=response$~i",$current_ref)&& !empty($_SESSION[$key_comment_auth])){
	setcookie($key_comment_auth,$_SESSION[$key_comment_auth],0,'/');
	if(!empty($_SESSION[$key_comment_email])){setcookie($key_comment_email,$_SESSION[$key_comment_email],0,'/');}
	if(!empty($_SESSION[$key_comment_url])){setcookie($key_comment_url,$_SESSION[$key_comment_url],0,'/');}
	}
if(!empty($wpss_new_visit)){
	setcookie($ck_key_init_dt,$current_dt,$current_dt+3600,'/'); /* 1 hour */
	}
if(!empty($wpss_cl_sbluck)){
	setcookie($wpss_lang_ck_key,$wpss_lang_ck_val,$current_dt-31536000,'/'); /* -1 year (deletes cookie)*/
	unset($_SESSION['wpss_clear_blacklisted_user_'.RSMP_HASH]);
	unset($_SESSION['wpss_blacklisted_user_'.RSMP_HASH]);
	}
elseif(!empty($wpss_sbluck)){
	setcookie($wpss_lang_ck_key,$wpss_lang_ck_val,$current_dt+60*60*24*365*10,'/'); /* 10 years */
	}
setcookie($wpss_ck_key,$wpss_ck_val,0,'/'); /* Secondary benefit is cache control - setting cookies turns off Varnish caching for this script */
/* Control caching */
if(function_exists('header_remove')){@header_remove('Cache-Control');@header_remove('Last-Modified');@header_remove('ETag');}
header('Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0, proxy-revalidate, s-maxage=0, no-transform',TRUE); /* HTTP/1.1 - Tell browsers and proxies not to cache this */
header('Pragma: no-cache',TRUE); /* HTTP 1.0 */
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT',TRUE); /* Date in the past */
header('Vary: *'); /* Force no caching */
header('Content-Type: application/javascript; charset=UTF-8',TRUE);
echo "
function wpssGetCookie(e){var t=document.cookie.indexOf(e+'=');var n=t+e.length+1;if(!t&&e!=document.cookie.substring(0,e.length)){return null}if(t==-1)return null;var r=document.cookie.indexOf(';',n);if(r==-1)r=document.cookie.length;return unescape(document.cookie.substring(n,r))}function wpssSetCookie(e,t,n,r,i,s){var o=new Date;o.setTime(o.getTime());if(n){n=n*1e3*60*60*24}var u=new Date(o.getTime()+n);document.cookie=e+'='+escape(t)+(n?';expires='+u.toGMTString():'')+(r?';path='+r:'')+(i?';domain='+i:'')+(s?';secure':'')}function wpssDeleteCookie(e,t,n){if(wpssGetCookie(e))document.cookie=e+'='+(t?';path='+t:'')+(n?';domain='+n:'')+';expires=Thu, 01-Jan-1970 00:00:01 GMT'}
function wpssCommentVal(){wpssSetCookie('".$wpss_ck_key."','".$wpss_ck_val."','','/');wpssSetCookie('SJECT15','CKON15','','/');}
wpssCommentVal();jQuery(document).ready(function($){var h=\"form[method='post']\";\$(h).submit(function(){\$('<input>').attr('type','hidden').attr('name','".$wpss_jq_key."').attr('value','".$wpss_jq_val."').appendTo(h);return true;})});
";

/* Uncomment to use */
$wpss_js_end_time = wpss_js_microtime();
$wpss_js_total_time = wpss_js_timer($wpss_js_start_time,$wpss_js_end_time,TRUE,6);
echo "// Generated in: ".$wpss_js_total_time.WPSS_EOL;
?>