<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

//$db['default']['hostname'] = 'vendor-data.ct4kuyvudbep.us-west-1.rds.amazonaws.com';
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'bulkhous_suser';
//$db['default']['username'] = 'admin_default';
//$db['default']['password'] = 'bulk@123';
$db['default']['password'] = 'bulkhouse';
//$db['default']['database'] = 'admin_default';
$db['default']['database'] = 'bulkhous_seller';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */