<?php

$dbh = new PDO('mysql:host='.config("db.host").';dbname='.config("db.name"),
    config("db.user"), config("db.pass"));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbh;