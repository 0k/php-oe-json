<?php

require 'vendor/autoload.php';
include 'settings.php';

// Instanciate with $url, and $dbname
$oe = new PhpOeJson\OpenERP($url, $db);

// login with $url and $dbname
$oe->login($login, $password);

echo "Logged in (session id: " . $oe->session_id . ")";

// Query directly json entrypoints.
$partners = $oe->read(array(
  'model' => 'res.partner',
  'fields' => array('name', 'city'),
  'limit' => 20,
  // XXXvlab: bug of openerp 7.0+ which will default domain to "None" if not set, and
  // res.partner override of ``_search`` don't support ``None`` value.
  'domain' => array(),
));

echo "<ul>";
foreach($partners['records'] as $partner) {
   echo "    <li>Name: " . $partner["name"] . " - City: " . $partner["city"] . "</li>\n";
}
echo "</ul>";

?>
