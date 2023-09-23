<?php 
    require_once('common.php');
    confirm_init();
    validation();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
</head>
<body>
    <h1>入力内容の確認</h1>
    <p>お名前：<?php echo $sanitize['name']; ?></p>
    <p>メールアドレス：<?php echo $sanitize['email']; ?></p>
    <p>題名：<?php echo $sanitize['title']; ?></p>
    <p>メッセージ本文：<br><?php echo nl2br($sanitize['message']); ?></p>
    <form action="submit.php" method="POST">
        <input type="hidden" name="name" value="<?php echo $sanitize['name']; ?>">
        <input type="hidden" name="email" value="<?php echo $sanitize['email']; ?>">
        <input type="hidden" name="title" value="<?php echo $sanitize['title']; ?>">
        <input type="hidden" name="message" value="<?php echo $sanitize['message']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit" value="送信">
    </form>
</body>
</html>
