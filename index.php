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
    echo 'register<br>';
    $dateofbirth = join('', $_POST['DateOfBirth']);
    echo $dateofbirth . "<br>";

    $registerUserData = new \NewsPhp\Auth\Register\UserData;

    $registerUserData->setUSERNAME($_POST['username']);
    $registerUserData->setPASSWORD($_POST['password']);
    $registerUserData->setEMAIL($_POST['email']);
    $registerUserData->setFIRSTNAME($_POST['firstname']);
    $registerUserData->setLASTNAME($_POST['lastname']);
    $registerUserData->setDATEOFBIRTH(join('', $_POST['DateOfBirth']));

    $registHandler = (new \NewsPhp\Auth\Register\RegisterFactory)->getClass();

    try {
        $registHandler->initRegister($registerUserData);
    } catch (Exception $exception) {
        echo "Error: " . $exception->getMessage();
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
