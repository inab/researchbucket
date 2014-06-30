<header class="navbar navbar-fixed-top text-caps swatch-<?php echo Configure::read('swatch1');?>" id="masthead" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target=".main-navbar" data-toggle="collapse" data-original-title="" title=""></button> <a href="<?php echo $this->Html->Url(array('controller'=>'pages','action'=>'home'));?>" class="navbar-brand"><img src="<?php echo $this->webroot;?>images/researchbucket.png" alt="Researchbucket"><?php echo Configure::read('platform.name');?></a>
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
                    <?php if($this->Session->read('Auth.User')):?>
                    <li id="menu-item-2524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2524 dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">My account</a>
                    <ul role="menu" class=" dropdown-menu">
                    	<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3675"><a href="<?php echo $this->Html->Url(array('controller'=>'vocabularies','action'=>'index'));?>"><?php echo __('Vocabularies');?></a></li>
                    	<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3675"><a href="<?php echo $this->Html->Url(array('controller'=>'tagTypes','action'=>'index'));?>">Metadata attributes</a></li>
                    	<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3675"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">My projects</a></li>
                    	<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3675"><a href="<?php echo $this->Html->Url(array('controller'=>'users','action'=>'logout'));?>">Logout</a></li>
                    </ul>
                    </li>
                    <?php else:?> 
                    <li><a class="btn btn-warning" href="/auth/linkedin"><i class="fa fa-linkedin-square"></i>&nbsp; Sign In with Linkedin</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
    </div>
</header>

