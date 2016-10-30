<?php
$db = require(__DIR__ . '/db.php');
// test database! Important not to run tests on production or development databases
$db['dsn'] = getenv('DB_TYPE') . ':host=' . getenv('DB_TEST_HOST') . ';dbname=' . getenv('DB_TEST_NAME') . ';port=' . getenv('DB_TEST_PORT');

return $db;