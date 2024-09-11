<?php

// Redirect to phpinfo.php (domain yang sama)
// header("Location: /php-info.php");

// Redirect to google (domain yang berbeda)
header("Location: https://www.google.com");

// Untuk memastikan bahwa tidak ada konten yang dijalankan setelah header
exit();
