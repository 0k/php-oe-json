===========
php-oe-json
===========

Modest PHP class to manage OpenERP Json query.


Code maturity
-------------

Early working alpha. Comments welcome. Although it was tested against OpenERP version 6.1 and 7.0.


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

  $oe = new PhpOeJson\OpenERP("http://localhost:8069", "test_json");
  $oe->login("admin", "xxxxxx");

  echo "Logged in (session id: " . $oe->session_id . ")";

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

This actual code (with small modifications) is provided in the ``example-project``
directory. This is a ``composer`` package (more about composer_, how to `get
composer command`_), so you can run ``composer install`` on this directory
to install dependencies, and you must only opne the ``settings.php`` to change
the ``$url``, ``$db`` and the ``$login``, ``$password`` to test it with your 
installation.

.. _composer: https://getcomposer.org/
.. _get composer command: https://getcomposer.org/doc/00-intro.md#downloading-the-composer-executable


Please note that this is a very thin layer above Tivoka_ which is a JSON-RPC PHP lib.

.. _Tivoka: https://github.com/marcelklehr/tivoka
