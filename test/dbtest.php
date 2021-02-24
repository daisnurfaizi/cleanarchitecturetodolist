<?php
include("../Config/Database.php");

use Config\Database;

$db = Database::getConnection();
echo "sukses membuat koneksi database";
