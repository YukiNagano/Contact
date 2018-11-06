<?php
//メール呼び出し
require 'send_mail.php';
?>
<!DOCTYPE>
	<html lang="ja">
<head>
	<title>確認 | お問い合わせ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
  <div class="container">
    <h1>お問い合わせ  確認</h1>
    <form method="post" action="thanks.php">

      <div class="form-group">
        <label for="exampleFormControlName">氏名</label>
        <p  class="form-control-static" id="exampleFormControlName"><?php echo $_POST['user_name']; ?></p>
      </div>

      <div class="form-group">
        <label for="exampleFormControlEmail">メールアドレス</label>
        <p class="form-control-static" id="exampleFormControlEmail"><?php echo $_POST['email']; ?></p>
      </div>

      <div class="form-group">
        <label for="FormControlSelect">お問い合わせ種別</label>
        <p><?php switch ($_POST['contact_us_type']) {
          case "about_site":
            echo 'サイトについて';
            break;
          case "sign_up_about":
            echo '会員登録について';
            break;
          case "other":
            echo 'その他';
            break;
          default:
            echo '入力してください';
            break;
        }?>
      </div>

      <div class="form-group">
        <label for="FormControlTextarea1">お問い合わせ内容</label>
        <p><?php echo nl2br($_POST['contents']); ?></p>
      </div>

				<input type="button" onclick="history.back();" value="前に戻る">
        <input type="submit" name="btn_submit" value="送信">
        <input type="hidden" name="your_name" value="<?php echo $_POST['user_name']; ?>">
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <input type="hidden" name="contact_us_type" value="<?php echo $_POST['contact_us_type']; ?>">
        <input type="hidden" name="contents" value="<?php echo $_POST['contents']; ?>">
      </form>
    </div>
	</body>
	</html>
