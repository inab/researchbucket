<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-group animated" data-animation=""></i></span></div></div>
            <h1 class="headline super hairline"><?php echo __('Donors Report');?></h1>
        </header>
    </div>
</section>
<section class="section section-short has-top swatch-<?php echo Configure::read('swatch2');?>">
    <div class="decor-top">
        <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">Projects</a></li>
                  <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$project['Project']['id']));?>"><?php echo $project['Project']['name'];?></a></li>
                  <li class="active"><?php echo __('Donors report');?></li>
                </ol>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4 sidebar text-center">
                
            </div>
        </div>
    </div>
</section>
