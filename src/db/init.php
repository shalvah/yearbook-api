<?php

$dbh = new PDO(env('DB_CONN', 'mysql').':host='.env('DB_HOST').';dbname='.env('DB_NAME'),
    env('DB_USER'), env('DB_PASS'));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

return $dbh;