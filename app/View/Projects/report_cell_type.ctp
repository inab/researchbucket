<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-sitemap animated" data-animation=""></i></span></div></div>
            <h1 class="headline super hairline"><?php echo __('Cell Types Report');?></h1>
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
                  <li class="active"><?php echo __('Cell types report');?></li>
                </ol>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-stacked">
                  <?php 
                    $i=0;
                    foreach ($cell_types as $c):
                  ?>
                  <?php if($c['t']['name'] != '-'):?>
                  <li class="<?php echo ($i==0)?'active':'';?>"><a href="#cell_type_<?php echo $c['t']['id'];?>" data-toggle="tab"><?php echo $c['t']['name'];?></a></li>
                  <?php endif;?>
                  <?php 
                     $i++;
                     endforeach;
                  ?> 
                </ul>       
            </div>
            <div class="col-md-9 sidebar text-center">
                <div class="tab-content">
                   <?php 
                    $i=0;
                    foreach ($cell_types as $c):
                  ?>
                  <?php if($c['t']['name'] != '-'):?>
                  <div id="cell_type_<?php echo $c['t']['id'];?>" class="tab-pane <?php echo ($i==0)?'active':'';?>"></div>
                  <?php endif;?>
                  <?php 
                     $i++;
                     endforeach;
                  ?> 
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.ajax({url:'<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportContentCellType',$project['Project']['id']));?>',
                data:{'cell_type':$(e.target).attr('href')},
                success:function(data,message){
                    $($(e.target).attr('href')).html(data);
                }
            
        });
    })
</script>
