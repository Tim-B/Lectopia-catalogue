<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="stylesheet" type="text/css" href="css/main.css" /> 
	
</head>

<body>
	<div class="header">
		<h1>UQ Lectopia Catalogue</h1>
	</div>
	<div class="content">
		<?php echo $content; ?>
	</div>
	<div class="footer">
		<div class="footerleft">
			<a href="https://github.com/Tim-B/Lectopia-catalogue"><img src="images/github-logo.png" alt="GitHub" /></a>
		</div>
		<div class="footerright">
			Powered by <a href="http://www.yiiframework.com/" target="_blank">Yii</a>.
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>