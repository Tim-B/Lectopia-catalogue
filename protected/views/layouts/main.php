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
		<h1>Lectopia Catalogue</h1>
	</div>
	<div class="content">
		<?php echo $content; ?>
	</div>
	<div class="footer">
		Powered by <a href="http://www.yiiframework.com/">Yii</a>.
	</div>
</body>
</html>