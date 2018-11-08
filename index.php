<!DOCTYPE>
	<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>お問い合わせ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
	<!-- <?php
	echo "<ul>";
	foreach($errors as $value){
	  echo "<li>";
	  echo $value;
	  echo "</li>";
	}
	echo "</ul>";
	?> -->
		<h1>お問い合わせ</h1>
    <form method="post" action="confirm.php">
      <div class="form-group">
        <label for="exampleFormControlName">氏名 - <span>必須</span></label>
        <input type="text" name="user_name" value="<?php if( !empty($user_name) ){ echo $user_name; } ?>" class="form-control" id="exampleFormControlName" placeholder="お名前">
      </div>
      <div class="form-group">
        <label for="exampleFormControlEmail">メールアドレス - <span>必須</span></label>
        <input type="email" name="email" value="<?php if( !empty($email) ) { echo $email; } ?>" class="form-control" id="exampleFormControlEmail" placeholder="メールアドレス">
      </div>

      <div class="form-group">
        <label for="FormControlSelect">お問い合わせ種別 - <span>必須</span></label>
        <select class="form-control" id="FormControlSelect" name="contact_us_type">
        <?php $contact_type = array(
          'about_site' => 'サイトについて',
          'sign_up_about' => '会員登録について',
          'other' => 'その他'); ?>
          <?php foreach ($contact_type as $key => $value) :?>
          	<option value="<?php echo $key; ?>"<?php if(!empty($contact_us_type)){ echo $contact_us_type; } ?>><?php echo "$value"; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="FormControlTextarea1">お問い合わせ内容 - <span>必須</span></label>
        <textarea class="form-control" id="FormControlTextarea1" name="contents" rows="" cols=""><?php if( !empty($contents) ){ echo $contents; } ?></textarea>
      </div>

        <input type="submit" name="submit" value="確認する">

      </form>
    </div>
</body>
</html>