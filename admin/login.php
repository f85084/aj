<?

?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <title>帳號登入</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="/aj/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="/aj/css/other.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <body>
        <div class=container>
            <form class=form-signin role=form name="login" method="post" action="login_action.php" id="login">
                <h2 class=form-signin-heading>請登入</h2>
                <label for=inputEmail class=sr-only>輸入帳號</label> 
       
                <input type="name"  id="name" name="name"  class="form-control" placeholder="輸入帳號" required autofocus> 
                
                <label for=inputPassword class=sr-only>輸入密碼</label> 
                <input type="password" id="password" name="password" class="form-control" placeholder="輸入密碼" required autofocus>
                <div class=checkbox>
                <label> <input type=checkbox value=remember-me> 忘記密碼 </label>
                </div>
				<button class="btn btn-lg btn-primary btn-block" type=submit>登入</button>
				</form>
				<!--<a href="newuser.php"><button style="padding-left: 5px;" class="btn btn-lg  btn-block form-signin" type=submit>註冊</button>
				</a>-->
        </div>
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js></script>