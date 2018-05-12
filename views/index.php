<?php 
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$path = '/testing';
echo $path;
// Route it up!
switch ($request_uri[0]) {
    // Home page
    case $path.'/':
        require './views/login.php';
        break;
    // About page
    case $path.'/manage':
        require './views/manage.php';
        break;
    // Everything else
    default:
      header('HTTP/1.0 404 Not Found');
      require './views/404.php';
    break;
};
?>