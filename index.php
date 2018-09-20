<?php require("Settings/config.php");
include ('classes/database/connect.php');
include ('classes/articleLoader.php');
include ('classes/articleUploader.php');
include ('classes/loginCheck.php');
include ('classes/signUpRegister.php');

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

$menuElements = [
    [
        'name' => 1,
        'href' => 1
    ],
    [
        'name' => 2,
        'href' => 2
    ],
    [
        'name' => 3,
        'href' => 3
    ],
    [
        'name' => 4,
        'href' => 4
    ]
];

$twig->display('index.twig',
    [
        'session' => $_SESSION,
        'menuElements' => $menuElements
    ]);

if (isset($_POST["Login"]))
{
    //$username = $_POST['loginUserName'];
    //$userpassword = $_POST['loginPassword'];
    echo "asd";
    \newsphp\classes\LoginCheck::setLogInCheck($_POST['loginUserName'],$_POST['loginPassword']);
}