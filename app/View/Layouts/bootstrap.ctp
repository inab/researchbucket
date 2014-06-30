<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <title>ResearchBucket</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link rel="apple-touch-icon" href="http://angle.oxygenna.com/wp-content/themes/angle/assets/images/favicons/apple-touch-icon-57x57-precomposed.png">        
        <link rel="apple-touch-icon" href="http://angle.oxygenna.com/wp-content/themes/angle/assets/images/favicons/apple-touch-icon-114x114-precomposed.png" sizes="114x114">        
        <link rel="apple-touch-icon" href="http://angle.oxygenna.com/wp-content/themes/angle/assets/images/favicons/apple-touch-icon-72x72-precomposed.png" sizes="72x72">        

        <link rel="stylesheet" id="layerslider-css" href="http://cdn.oxygenna.com/wp-content/plugins/LayerSlider/static/css/layerslider.css?ver=5.0.2" type="text/css" media="all">
        <link rel="stylesheet" id="ls-google-fonts-css" href="http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900|Open+Sans:300|Indie+Flower:regular|Oswald:300,regular,700&amp;subset=latin,latin-ext" type="text/css" media="all">
        <link rel="stylesheet" id="rs-settings-css" href="http://cdn.oxygenna.com/wp-content/plugins/revslider/rs-plugin/css/settings.css?rev=4.1.3&amp;ver=3.8.3" type="text/css" media="all">
        <link rel="stylesheet" id="rs-captions-css" href="http://cdn.oxygenna.com/wp-content/plugins/revslider/rs-plugin/css/dynamic-captions.css?rev=4.1.3&amp;ver=3.8.3" type="text/css" media="all">
        <link rel="stylesheet" id="rs-plugin-static-css" href="http://cdn.oxygenna.com/wp-content/plugins/revslider/rs-plugin/css/static-captions.css?rev=4.1.3&amp;ver=3.8.3" type="text/css" media="all">
        <link rel="stylesheet" id="angle-bootstrap-css" href="http://angle.oxygenna.com/wp-content/themes/angle/assets/css/bootstrap.css?ver=3.8.3" type="text/css" media="all">

        
        
        <?php echo $this->Html->css('typekit');?>
        <?php echo $this->Html->css('theme');?>
        <?php echo $this->Html->css('nv.d3');?>
        <?php echo $this->Html->css('d3-components');?>
        <?php echo $this->Html->css('data_grids_main');?>
        <?php echo $this->Html->css('data_grids_tooltip');?>
        <?php echo $this->Html->css('data_grids_style_01');?>
        <?php echo $this->Html->css('app');?>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script('ltIE9');?>
        <![endif]-->

        <?php echo $this->Html->script('/components/jquery/dist/jquery.min');?> 


<!--
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-includes/js/comment-reply.min.js?ver=3.8.3"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-content/plugins/LayerSlider/static/js/layerslider.kreaturamedia.jquery.js?ver=5.0.2"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-content/plugins/LayerSlider/static/js/greensock.js?ver=1.11.2"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-content/plugins/LayerSlider/static/js/layerslider.transitions.js?ver=5.0.2"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.plugins.min.js?rev=4.1.3&amp;ver=3.8.3"></script>
        <script type="text/javascript" src="http://cdn1.oxygenna.com/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js?rev=4.1.3&amp;ver=3.8.3"></script> 
-->
        
        <?php echo $this->Html->script('/components/isotope/dist/isotope.pkgd.min');?>  
        <?php echo $this->Html->script('map');?> 
        <?php echo $this->Html->script('theme');?>
        <?php echo $this->Html->script('selectivizr');?>
        <?php echo $this->Html->script('d3.min');?>
        <?php echo $this->Html->script('nv.d3.min');?>
        
      
    </head>

  <body>

    <?php echo $this->Element('navigation'); ?>
    <div id="content" role="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
    </div>
    <footer id="footer" role="contentinfo">
        <section class="section section-normal has-top swatch-<?php echo Configure::read('swatch1');?>">
                <div class="decor-top">
                <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 100 L100 0 L100 100" stroke-width="0"></path>
                </svg>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">	
                            <div class="textwidget"><?php echo Configure::read('platform.name');?></div>
                        </div> 
                   </div>
                </div>
            </section>
    </footer>
    <a href="javascript:void(0)" class="go-top hex-alt" style="bottom: -44px; opacity: 0;"><i class="fa fa-angle-up"></i></a>
  </body>
  <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
      })
  </script>
</html>
