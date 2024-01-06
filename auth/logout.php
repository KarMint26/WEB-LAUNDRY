<?php

// Hapus session username
session_start();
session_unset();
session_destroy();

// Arahkan pengguna ke halaman login
header("Location: ./login.php");

?>