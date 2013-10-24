<?php
$hostname_conn = 'localhost';
$database_conn = 'notas';
$username_conn = 'root';
$password_conn = '';
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query('SET NAMES\'utf8\'');
?>