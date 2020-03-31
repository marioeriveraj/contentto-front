<?php
session_start();
include 'shared/urls.php';
    session_destroy();
    header('Location:'.$homef);

  ?>