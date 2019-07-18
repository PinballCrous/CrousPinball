<?php

try { $bdd = new PDO('mysql:host=localhost;dbname=pimballcrous;charset=utf8', 'root', ''); }
catch (Exception $e) { echo $e->getMessage(); }

?>