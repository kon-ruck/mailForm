<?php
/**
 * PHPMailerで使用するプロパティ
 * HOST           メールサーバーの指定
 * USER_NAME      メールサーバーに登録しているメールアドレス
 * PASSWORD       メールアドレスのパスワード
 * FROM_ADDRESS   メールの送信者アドレス
 * FROM_NAME      メールの送信者名
 * RE_DIRECT_PATH header関数で使用するURL
 */
define('HOST', "#");
define('USER_NAME', "#");
define('PASSWORD', "#");
define('FROM_ADDRESS', "#");
define('FROM_NAME', "#");
define('RE_DIRECT_PATH', "Location: http://localhost:3000");
/**
 * バリデーションメッセージ
 */
define('VALI_EMPTY', "入力してください。");
define('VALI_FORMAT', "形式が正しくありません。");