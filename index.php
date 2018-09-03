<?php require("Settings/config.php");
$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));
$twig->display('index.twig', ['session' => $_SESSION]);