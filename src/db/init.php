<?php

$dbh = new PDO(config("db.conn").':host='.config("db.host").';dbname='.config("db.name"),
    config("db.user"), config("db.pass"));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbh;