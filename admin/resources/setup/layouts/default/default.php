<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><?php echo hencode($this->title); ?></title>
		<meta http-equiv="Content-type" content="text/html;charset=<?php echo hencode($this->charset); ?>" />
		<meta name="description" content="<?php echo hencode($this->description); ?>" />
		<meta name="keywords" content="<?php echo hencode($this->keywords); ?>" />
		<meta name="author" content="<?php echo hencode($this->author); ?>" />
		<meta name="generator" content="<?php echo hencode($this->generator); ?>" />
		<?php $this->insertStyles(); ?>
		<?php $this->insertScripts(); ?>
	</head>
	<body>
		<?php $this->insertPage(); ?>
	</body>
</html>