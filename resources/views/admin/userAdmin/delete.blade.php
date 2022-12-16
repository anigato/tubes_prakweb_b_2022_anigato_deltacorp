<?php

require '../session_isset.php';
// require '../../../php/function.php';
require '../function.php';
$id = $_GET['id'];

// require 'session_isset.php';

if (delete_admin($id) > 0) {
    echo "<script>document.location.href='index.php'</script>";
} else {
    echo "<script>document.location.href='index.php'</script>";
}
?>