<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><?php echo HTML::encode($this->title); ?></title>
		<meta http-equiv="Content-type" content="text/html;charset=<?php echo HTML::encode($this->charset); ?>" />
		<meta name="generator" content="<?php echo HTML::encode($this->generator); ?>" />
	</head>
	<body>
		<h1><?php echo HTML::encode($this->title); ?></h1>
		<h3><?php echo HTML::encode($this->message); ?></h3>
		<?php echo $this->insertError(); ?>
	</body>
</html>

<?php 
/**************************************************************************************************************************/ 

?>