<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');



// ------------------------------------------------------------------------

// Paypal IPN Class

// ------------------------------------------------------------------------



// Use PayPal on Sandbox or Live

$config['sandbox'] = TRUE; // FALSE for live environment



// PayPal Business Email ID
// aroojfatima2067-facilitator-2@gmail.com
// 	https://coloradocampgrounds.us.com/Paypal/ipn
//$config['business'] = 'admin@coloradocampgrounds.us.com';
$config['business'] = 'aroojfatima2067-facilitator-2@gmail.com';



// If (and where) to log ipn to file

$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';

$config['paypal_lib_ipn_log'] = TRUE;



// Where are the buttons located at 

$config['paypal_lib_button_path'] = 'buttons';



// What is the default currency?

$config['paypal_lib_currency_code'] = 'USD';




