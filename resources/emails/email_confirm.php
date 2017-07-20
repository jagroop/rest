<!DOCTYPE html>
<html>
<head>
  <title>Please confirm your email address</title>
</head>
<body>
<h1>Hello, <?php echo $user->name ?></h1>
<p>We noticed that you need to verify your email address in order to complete the <?php echo $config['name'] ?> application registration. To do so, simply click on link below.</p>
<a href="#" class="button" target="_blank">Confirm Your Email</a>
<p>Once you verify it your registration will be completed with the <?php echo $config['name'] ?></p>
<br>
<p>
  <address>
    <span>Regards,</span>
    <span><?php echo $config['name'] ?></span>
  </address>
</p>
</body>
</html>