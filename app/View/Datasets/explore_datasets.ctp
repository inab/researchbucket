<article>
    <section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo $project['Project']['name'].' \'s '.__('Datasets');?></h1>
                <p>Explore the data available</p>
            </header>
        </div>
    </section>
    <section class="section section-short  has-top  swatch-<?php echo Configure::read('swatch2');?>">
        <div class="decor-top">
            <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
            </svg>
        </div>
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">Projects</a></li>
              <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$project['Project']['id']));?>"><?php echo $project['Project']['name'];?></a></li>
              <li class="active"><?php echo 'datasets';?></li>
            </ol>
            
            <div class="row" style="margin-bottom:0px;">
                <div class="col-md-11">
                    <div class="pull-left  text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo $this->Form->input('donor', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Donor'));?>
                    </div>
                    <div class="pull-left  text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo $this->Form->input('sample', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Sample'));?>
                    </div>
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('tissue', array('div'=>false,'label'=>false,'options' => $tissues,'empty' => '(Tissue)'));?>
                    </div>
                    <div class="pull-left" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('cell_type', array('div'=>false,'label'=>false,'options' => $celltypes,'empty' => '(Cell type)'));?>
                    </div>
                    <div class="clearfix"></div>
                </div> 
                <div class="col-md-1 text-right">
                    <a href="#" id="filter_trigger" class="btn btn-warning">Filter</a>
                </div>   
            </div>
            
            <div class="row" style="margin-bottom:30px;">
                <div class="col-md-11">
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('experiment_type', array('div'=>false,'label'=>false,'options' => $experiments,'empty' => '(Experiment)'));?>
                    </div>
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('disease', array('div'=>false,'label'=>false,'options' => $diseases,'empty' => '(Disease)'));?>
                    </div>
                    <div class="clearfix"></div>
                </div>  
            </div>
            
            
            
            <div class="row">
                <div class="col-md-12  text-default">
                      <div id="datasets_container"></div>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $.ajax('<?php echo $this->Html->Url(array('controller'=>'datasets','action' => 'getPublicList','pid'=>$project['Project']['id']));?>', {
        'async': true,
        'data':{'tags':[$('#organism').val()]},
        'complete': function(data, textStatus, jqXHR) {
            
            $('#datasets_container').html(data.responseText);
        }
    });
    
    $('#filter_trigger').bind('click',function(){
        $(this).html('Loading...');
        $.ajax('<?php echo $this->Html->Url(array('controller'=>'datasets','action' => 'getPublicList','pid'=>$project['Project']['id']));?>', {
        'async': true,
        'data':{'tags':[$('#organism').val(),$('#tissue').val(),$('#cell_type').val(),$('#experiment_type').val(),$('#disease').val()]},
        'complete': function(data, textStatus, jqXHR) {
            
            $('#datasets_container').html(data.responseText);
            $('#filter_trigger').html('Filter');
        }
    });
    })
    
</script>