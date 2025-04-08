<?php
function get_breadcrumb() {
    $path = $_SERVER['REQUEST_URI'];  // Get the current URL path
    $path = trim($path, "/"); // Remove leading/trailing slashes
    $parts = explode("/", $path); // Split URL into segments
    $breadcrumb = '<nav aria-label="breadcrumb"><ul class="breadcrumb">';

    $url = "/";
    $breadcrumb .= '<li class="breadcrumb-item"><a href="/">Home</a></li>'; // Home link

    foreach ($parts as $part) {
        $url .= $part . "/";
        $name = ucwords(str_replace(["-", "_"], " ", $part)); // Format the name
        if ($url !== $_SERVER['REQUEST_URI']) {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $url . '">' . $name . '</a></li>';
        } else {
            $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . $name . '</li>';
        }
    }

    $breadcrumb .= '</ul></nav>';
    return $breadcrumb;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
