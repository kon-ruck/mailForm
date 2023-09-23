<h1>お問合わせ</h1>
<form method="POST" action="confirm.php" name="form" id="form">
    <div>
        <p><label for="name">お名前*</label></p>
        <input type="text" name="name" value="<?php echo isset($before['name']) ? $before['name'] : ''; ?>" require>
        <?php echo isset($flash['name']) ? '<p>' . $flash['name'] . '</p><br>' : ''; ?>
    </div>
    <div>
        <p><label for="email">メールアドレス*</label></p>
        <input type="email" name="email" value="<?php echo isset($before['email']) ? $before['email'] : ''; ?>" require>
        <?php echo isset($flash['email']) ? '<p>' . $flash['email'] . '</p><br>' : ''; ?>
    </div>
    <div>
        <p><label for="title">題名*</label></p>
        <input type="text" name="title" value="<?php echo isset($before['title']) ? $before['title'] : ''; ?>" require>
        <?php echo isset($flash['title']) ? '<p>' . $flash['title'] . '</p><br>' : ''; ?>
    </div>
    <div>
        <p><label for="message">メッセージ本文*</label></p>
        <textarea name="message" cols="30" rows="10" require><?php echo isset($before['message']) ? $before['message'] : ''; ?></textarea>
        <?php echo isset($flash['message']) ? '<p>' . $flash['message'] . '</p><br>' : ''; ?>
    </div>
    <div>
        <input id="btn" type="submit" value="送信">
    </div>
    <input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<style>
    p{
        margin: 0;
    }
</style>