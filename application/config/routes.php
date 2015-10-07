<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['verification'] = "admin_main";
$route['domestic_terms'] = "/home/terms";
$route['reset'] = "/home/reset";
$route['pswd_email'] = "/home/pswd_email";
$route['resetpassword'] = "/home/resetpassword";

$route['export_terms'] = "/home/export_terms";
$route['/viewdocuments/pan_prop'] = "/admin/details/pan_prop";
$route['/viewdocuments/pan_comp'] = "/admin/details/pan_comp";
$route['/viewdocuments/vat_cst'] = "/admin/details/vat_cst";
$route['viewdocuments/sign'] = "admin/details/sign";
$route['viewdocuments/cert_of_incorp'] = "admin/details/cert_of_incorp";
$route['viewdocuments/moa_aoa'] = "admin/details/moa_aoa";
$route['viewdocuments/part_deed'] = "admin/details/part_deed";
$route['profile'] = '/view/view_data';
$route['bank'] = '/view/bank';
$route['settings'] = '/view/settings';
$route['faqs01'] = '/view/vendor_on_board';
$route['faqs02'] = '/view/selling_process';
$route['domestic'] = '/view/terms';
$route['exports'] = '/view/export_terms';
$route['profile01'] = '/view/company/';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
