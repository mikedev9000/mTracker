<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html lang="en">
<head>
	<?php echo $this->html->charset();?>
	
	<title><?php echo $this->title(); ?></title>
	<link rel="stylesheet/less" type="text/css" href="/less/app.less">
	<?php echo $this->html->style(array('debug', 'lithium', 'smoothness/jquery-ui-1.8.18.custom')); ?>
    <?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body class="app">

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">mTracker</a>
          
          <?php 
              $menu = array(
                  'Projects' => '/projects',
                  'Settings' => '/settings',
              );
          ?>
          
          <div class="nav-collapse">
            <ul class="nav">
            <?php foreach ($menu as $title => $url):?>
              <li <?=$this->_request->url == $url ? 'class="active"': '';?>>
              	<a href="<?=$url;?>"><?=$title?></a>
              </li>
            <?php endforeach;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div id="container" class="container">
		<div id="header">
		</div>
		<div id="content">
			<?php echo $this->content(); ?>
		</div>
    </div> <!-- /container -->
    
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/less-1.3.0.js"></script>
</body>
</html>
