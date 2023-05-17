<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['defaultTimeZone'] = 'America/New_York';

// name of the wrapper tmpl
$config['coreTemplate'] = 'core/core';

$config['bodyTemplate'] = 'core/body';

$config['cookie_prefix'] = 'ap_';
// body class:
$config['bodyClass'] = 'sticky-header';

$config['billing_email'] = "steven@allpaving.com";
//local
$config['max_login_attempts'] = 4;

$config['clefArray'] = array('CLEF_BASE_URL'=>'https://clef.io/api/v1/',
    'CLEF_JS'=> 'https://clef.io/v3/clef.js',
    'CLEF_APP_ID'=>'cea65ec0166605039b1f679c2f6b9863',
    'CLEF_APP_SECRET'=>'0a7f9b0d4e751d6b94ca210556968f20');

//silvervee

/*
 *
 $config['clefArray'] = array('CLEF_BASE_URL'=>'https://clef.io/api/v1/',
    'CLEF_JS'=> 'https://clef.io/v3/clef.js',
    'CLEF_APP_ID'=>'977319625bbafcf150e2e964a0acd588',
    'CLEF_APP_SECRET'=>'6252b430c1f264e27fc91ba984a942ec');
*/
//default lookups
$config['VehicleLogTypes'] = array('REPAIR','INSURANCE','PURCHASE','OIL CHANGE','MAINTENANCE','OTHER');


$config['system_roles'] = array('Super Admin', 'Sales Manager','Sales Person','Job Site Manager','Field Worker','Office Worker');

$config['rolelist'] = "<option value='1'>Super Admin</option><option value='2'>Sales Manager</option><option value='3'>Sales Person</option><option value='4'>Job Site Manager</option><option value='5'>Field Worker</option><option value='6'>Office Worker</option>";

$config['states'] = "<option value='FL'>Florida</option>";

// capture errors and email them to admin: (by errorHandle function in EX_Controller)
$config['sendError'] = false;
// email address to send the error:
$config['emailErrorTo'] = 'mike.trachtenberg@gmail.com';

// send 404 error
$config['send404Error'] = false;

// file to store php code outputs using EX_Controller's log function
$config['phpCodeFile'] = 'application/logs/phpcode.log';
// file to store php code outputs and mysql queries if mSetLastQueryON(param) is called with param set to true before executing a mysql statement
$config['queryFile'] = 'application/logs/mysqlquery.log';

// dir where the enclosure html files are:
$config['emailTemplateDir'] = 'application/email/';

// path to resources folder (used for other css, js, etc files, like wueh using bootstrap package)
$config['resourcesDir'] = 'assets/';

// show the messages:
$config['showMessages'] = true;

// type of the alert dialog (custom, fancybox, ui, bootstrap or inner. Default (if empty, false or null): ui)
$config['messageDialogType'] = 'bootstrap';

// id of the message container
$config['messageTargetId'] = 'alertContainer';

// language of the alert and confirm dialogs (en or sp. default (if empty, false or null): en)
$config['messageLanguage'] = 'en';

// define if password will be sore on DB and treated on code encrypted or not
$config['isPasswordEncrypted'] = false;

// define idle time (in seconds) to lock the screen (0 or false: disabled)
$config['idleTime'] = 0;  //1000 * 60 * 15;  // 15 min

// show workbench info:
$config['enableProfiler'] = false;
