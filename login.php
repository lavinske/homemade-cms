<?php
session_start();
require_once "config/koneksi.php";
if(isset($_SESSION['user'])){
  header("Location: user.php");
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']);
  $resLogin = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
  if(mysqli_num_rows($resLogin) == 1){
    $rowLogin = mysqli_fetch_assoc($resLogin);
    $_SESSION['user'] = $rowLogin['id'];
    header("Location: user.php");
  }else{
    $errorMsg = "Kombinasi username dan password salah";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Neon Admin Panel" />
  <meta name="author" content="" />

  <link rel="icon" href="assets/images/favicon.ico">

  <title>Neon | Login</title>

  <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
  <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/neon-core.css">
  <link rel="stylesheet" href="assets/css/neon-theme.css">
  <link rel="stylesheet" href="assets/css/neon-forms.css">
  <link rel="stylesheet" href="assets/css/custom.css">

  <script src="assets/js/jquery-1.11.3.min.js"></script>

  <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
  
  <div class="login-header login-caret">
    
    <div class="login-content">
      
      <a href="index.html" class="logo">
        <img src="assets/images/logo@2x.png" width="120" alt="" />
      </a>
      
      <p class="description">Dear user, log in to access the admin area!</p>
      
      <!-- progress bar indicator -->
      <div class="login-progressbar-indicator">
        <h3>43%</h3>
        <span>logging in...</span>
      </div>
    </div>
    
  </div>
  
  <div class="login-progressbar">
    <div></div>
  </div>
  
  <div class="login-form">
    
    <div class="login-content">
     <?php if(isset($errorMsg)){ ?>
      <div class="form-login-error">
        <h3>Invalid login</h3>
        <p><?php echo $errorMsg; ?></p>
      </div>
          <?php } ?>
      
      <form action="" method="post">
        
        <div class="form-group">
          
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-user"></i>
            </div>
            
            <input type="text" required="required" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
          </div>
          
        </div>
        
        <div class="form-group">
          
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-key"></i>
            </div>
            
            <input type="password" required="required" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
          </div>
        
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-login">
            <i class="entypo-login"></i>
            Login
          </button>
        </div>
        
                
        
      </form>
      
      
      
    </div>
    
  </div>
  
</div>


  <!-- Bottom scripts (common) -->
  <script src="assets/js/gsap/TweenMax.min.js"></script>
  <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/joinable.js"></script>
  <script src="assets/js/resizeable.js"></script>
  <script src="assets/js/neon-api.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/neon-login.js"></script>


  <!-- JavaScripts initializations and stuff -->
  <script src="assets/js/neon-custom.js"></script>


  <!-- Demo Settings -->
  <script src="assets/js/neon-demo.js"></script>

</body>
</html>