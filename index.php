<?php

require_once 'openerp.php';

// Instanciate with $url, and $dbname
$oe = new OpenERP("http://localhost:8069", "test_json");

// login with $url and $dbname
$oe->login("admin", "xxxxxx");

echo "Logged in (session id: " . $oe->session_id . ")";

// Query directly json entrypoints.
$partners = $oe->read(array(
  'model' => 'res.partner',
  'fields' => array('name', 'city'),
));

echo "<ul>";
foreach($partners['records'] as $partner) {
   echo "    <li>" . $partner["name"] . " - " . $partner["city"] . "</li>\n";
}
echo "</ul>";

?>
