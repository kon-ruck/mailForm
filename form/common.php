<?php
/**
 * 定数の読み込み
 */
require_once('config/config.php');

/**
 * グローバル変数の定義
*/
$vali_f = false;
$sanitize = array();
$token;
$before;
$flash;

/**
 * confirm.phpで呼ばれる初期化処理
 */
function confirm_init(){
    session_start();
    global $token;
    global $sanitize;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
        unset($_SESSION['token']);
        $_SESSION['token'] = uniqid('', true);
        $token = $_SESSION['token'];
        foreach ($_POST as $key => $value) {
            $sanitize[$key] = htmlspecialchars($value, ENT_QUOTES);
        }
    }else{    
        echo "error";
        exit(1);
    }
}

/**
 * submit.phpで呼ばれる初期化処理
 */
function submit_init(){
    session_start();
    global $sanitize;
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
        unset($_SESSION['token']);

        $sanitize = array();
        foreach ($_POST as $key => $value) {
            $sanitize[$key] = htmlspecialchars($value, ENT_QUOTES);
        }
    }else{    
        echo "error";
        exit(1);
    }
}

/**
 * form.phpで呼ばれる初期化処理
 */
function form_init(){
    session_start();
    global $token, $flash, $before;
    $_SESSION['token'] = uniqid('', true);
    $token = $_SESSION['token'];
    $flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
    unset($_SESSION['flash']);

    $before = isset($_SESSION['before']) ? $_SESSION['before'] : [];
    unset($_SESSION['before']);
}

/**
 * バリデーション 条件を満たしていなければリダイレクトさせる
 */
function validation(){
    global $vali_f, $sanitize;
    check_name($vali_f, $sanitize);
    check_email($vali_f, $sanitize);
    check_title($vali_f, $sanitize);
    check_message($vali_f, $sanitize);

    if($vali_f){
        header(RE_DIRECT_PATH);
    }
}

/**
 * 名前のバリデーション
 */
function check_name(&$f, $sani){
    $_SESSION['before']['name'] = $sani['name'];
    if(empty($sani['name'])){
        $_SESSION['flash']['name'] = VALI_EMPTY;
        $f = true;
        return;
    }
    if(preg_match('/^(,|\.|\s|\^|\$|\\|[1-9])+$/', $sani['name'])){
        $_SESSION['flash']['name'] = VALI_FORMAT;
        $f = true;
        return;
    }
}

/**
 * Eメールのバリデーション
 */
function check_email(&$f, $sani){
    $_SESSION['before']['email'] = $sani['email'];
    if(empty($sani['email'])){
        $_SESSION['flash']['email'] = VALI_EMPTY;
        $f = true;
        return;
    }
    if(!preg_match('/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/', $sani['email'])){
        $_SESSION['flash']['email'] = VALI_FORMAT;
        $f = true;
        return;
    }
}

/**
 * タイトルのバリデーション
 */
function check_title(&$f, $sani){
    $_SESSION['before']['title'] = $sani['title'];
    if(empty($sani['title'])){
        $_SESSION['flash']['title'] = VALI_EMPTY;
        $f = true;
        return;
    }
    if(preg_match('/^(,|\.|\s|\^|\$|\\|[1-9])+$/', $sani['title'])){
        $_SESSION['flash']['title'] = VALI_FORMAT;
        $f = true;
        return;
    }
}

/**
 * メッセージのバリデーション
 */
function check_message(&$f, $sani){
    $_SESSION['before']['message'] = $sani['message'];
    if(empty($sani['message'])){
        $_SESSION['flash']['message'] = VALI_EMPTY;
        $f = true;
    }
    if(preg_match('/^(\n|,|\.|\s|\^|\$|\\|[1-9])+$/', $sani['message'])){
        $_SESSION['flash']['message'] = VALI_FORMAT;
        $f = true;
    }
}