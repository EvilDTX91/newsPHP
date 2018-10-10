<?php require("Settings/config.php");
include('classes/database/connect.php');
include('classes/articleLoader.php');
include('classes/articleUploader.php');
include('classes/loginCheck.php');
include('classes/signUpRegister.php');

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


$articles = new newsphp\classes\ArticleLoader();
$articles->loadAllArticle();

$twig->display('index.twig',
    [
        'session' => $_SESSION,
        'menuElements' => $menuElements,
        'articles' => $articles
    ]);

if (isset($_POST['Login'])) {
    echo 'login</br>';
    $obj = new \newsphp\classes\LoginCheck();
    $obj->setLogInCheck($_POST['loginUserName'], $_POST['loginPassword']);
}

if (isset($_POST['userLogOut'])) {
    echo 'logout</br>';
    $obj = new \newsphp\classes\LoginCheck();
    $obj->logOut();
}

if (isset($_POST['userUploadNews'])) {
    echo 'uploadNews</br>';
    $obj = new \newsphp\classes\ArticleUploader();
    $obj->setArticleData($_SESSION['id'], $_POST['userWriteNews'], $_POST['userWriteTitle']);
}

if (isset($_POST['sendSignUp'])) {
    echo 'register<br>';
    $bornDate = $_POST['signUpBornYear'] . $_POST['signUpBornMonth'] . $_POST['signUpBornDay'];
    echo $bornDate . "<br>";
    $obj = new \newsphp\classes\SignUpRegister();
    $obj->setUserValues($_POST['signUpUserName'], $_POST['signUpPassword'], $_POST['signUpEmail'],
        $_POST['signUpFirstName'], $_POST['signUpLastName'], $bornDate);
}