<?php
include "../lib/koneksi.php";

$username = $query->real_escape_string($_POST['username']);

$data = $query->query("SELECT username, password FROM Admin WHERE username like '" . $username . "'");
$show = $data->fetch_array();

if($username == $show['username']){
    echo "$show[password]";
} else {
    echo "Username tidak dikenali..";
}
?>