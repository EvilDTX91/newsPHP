<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

$twig = new Twig_Environment(new Twig_Loader_Filesystem('template/'));

$menuElements = [
    [
        'name' => "Fooldal!",
        'href' => ""
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

$test = [
    [
        'x' => 'x1',
        'y' => 'y1',
        'z' => 'z1'
    ],
    [
        'x' => 'x2',
        'y' => 'y2',
        'z' => 'z2'
    ],
    [
        'x' => 'x3',
        'y' => 'y3',
        'z' => 'z3'
    ]
];


$loader = "";
if (isset($_POST['userProfile'])) {
    $loader = "modules/profile.twig";
}
if (isset($_POST['userSendNews'])) {
    $loader = "modules/articleUploader.twig";
}
if (isset($_POST['SignUp'])) {
    $loader = "modules/signUp.twig";
}


$articles = new NewsPhp\ArticleLoader;
$result = $articles->loadAllArticle();
/*
foreach ($result as $value) {
    print_r($value);
    echo "</br>";
}*/
if (isset($_POST['Login'])) {
    echo 'login</br>';
    $obj = new \NewsPhp\Auth\Login;
    $obj->setLogInCheck($_POST['loginUserName'], $_POST['loginPassword']);
}

if (isset($_POST['userLogOut'])) {
    echo 'logout</br>';
    $obj = new \NewsPhp\Auth\Login;
    $obj->logOut();
    $loader = "";
}

if (isset($_POST['userUploadNews'])) {
    echo 'uploadNews</br>';
    $obj = new \NewsPhp\ArticleUploader;
    $obj->setArticleData($_SESSION['id'], $_POST['userWriteNews'], $_POST['userWriteTitle']);
}


if (isset($_POST['sendSignUp'])) {
    $registerUserData = new \NewsPhp\Auth\Register\UserData;
    $registerUserData->setUserName($_POST['userName']);
    $registerUserData->setPassword($_POST['password']);
    $registerUserData->setEmail($_POST['email']);
    $registerUserData->setFirstName($_POST['firstName']);
    $registerUserData->setLastName($_POST['lastName']);
    $registerUserData->setDateOfBirth(join('', $_POST['dateOfBirth']));

    $registerHandler = (new \NewsPhp\Auth\Register\RegisterFactory)->getClass();

    try {
        $registerHandler->initRegister($registerUserData);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

$twig->display('index.twig',
    [
        'session' => $_SESSION,
        'menuElements' => $menuElements,
        'articles' => $result,
        'test' => $test,
        'loader' => $loader
    ]);
