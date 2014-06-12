<header class="navbar navbar-fixed-top text-caps swatch-black-beige" id="masthead" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target=".main-navbar" data-toggle="collapse" data-original-title="" title=""></button> <a href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'home'));?>" class="navbar-brand"><img src="<?php echo $this->webroot;?>images/researchbucket.png" alt="Researchbucket">Researchbucket</a>
        </div>

        <nav class="collapse navbar-collapse main-navbar" role="navigation">
            <div class="menu-sidebar pull-right">
                <div id="shopping_cart-2" class="sidebar-widget  woocommerce widget_shopping_cart">
                    <h3 class="sidebar-header">Cart</h3>

                    <div class="hide_cart_widget_if_empty">
                        <div class="widget_shopping_cart_content"></div>
                    </div>
                </div>
            </div>

            <div class="menu-main-menu-container">
                <ul id="menu-main-menu" class="nav navbar-nav navbar-right">
                    <li class="active"><a title="Home" href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'home'));?>"><?php echo __('Home');?></a></li>
                    <li><a title="How it works?" href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'howitworks'));?>"><?php echo __('How it works?');?></a></li>
                    <li><a title="Projects" href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'projects'));?>"><?php echo __('Projects');?></a></li>
                    <li><a title="Datasets" href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'datasets'));?>"><?php echo __('Datasets');?></a></li>
                    <li><a title="Results" href="#"><?php echo __('Results');?></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

