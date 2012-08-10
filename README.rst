===========
php-oe-json
===========

Modest PHP class to manage OpenERP Json query.


Code maturity
-------------

Early working alpha. Comments welcome.


Features
--------

- Simple way to add new json-rpc entry points
- Quite easy to get started (see Usage section)
- Ability to resume an open session (and thus login in openerp) with a
  saved ``session_id`` and HTTP ``cookie_id`` (without ``$login`` and
  ``$password``)


Usage
-----

sample PHP code::

  <?php

  require_once 'openerp.php';

  
  // Instanciate with $url, and $dbname
  $oe = new OpenERP("http://localhost:8069", "test_json");

  // login with $url and $dbname
  $oe->login("admin", "xxxxxx");

  echo "Logged in (session id: " . $oe->session_id . ")";

  // Query with direct object method which are mapped to json-rpc calls
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


Please note that this is a very thin layer above Tivoka_ which is a JSON-RPC PHP lib.

.. _Tivoka: https://github.com/marcelklehr/tivoka
