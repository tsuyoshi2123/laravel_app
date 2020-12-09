<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>フォームからPOSTで送信されたデータを表示</title>
</head>
<body>
<p>こんにちは</p>
    <?php
      print "<p>名前：" . $_POST["name"] ."</p>";
      print "<p>パスワード：" . $_POST["password"] ."</p>";
    ?>
</form>
</body>
</html>