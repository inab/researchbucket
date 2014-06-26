<article>
    <section class="section section-short swatch-blue-white">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo $project['Project']['name'].' \'s '.__('Datasets');?></h1>
                <p>Explore the data available</p>
            </header>
        </div>
    </section>
    <section class="section section-short swatch-white-blue">
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">Projects</a></li>
               <li class="active"><?php echo $project['Project']['name'].' \'s datasets';?></li>
            </ol>
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12 text-right">
                    <?php echo $this->Html->link('<i class="fa  fa-refresh"></i> '.__('Update datasets from the sources'), '#', array('id'=>'update_list_trigger','class'=>'btn btn-warning','escape' => false)); ?>
                    <?php echo $this->Html->link('<i class="fa  fa-magic"></i> '.__('Validate project metadata'), '#', array('id'=>'','class'=>'btn btn-default','escape' => false)); ?>

                </div>
            </div>
            <div class="row">
                 <ul class="nav nav-tabs">
                  <li class="active"><a href="#name" data-toggle="tab">Datasets</a></li>
                  <li><a href="#tag" data-toggle="tab">Tags</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="name">
                        <div class="col-md-12  text-default">
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
                                    <a href="#" id="filter_datasets_trigger" class="btn btn-warning">Filter</a>
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
                            <div class="row" style="margin-bottom:30px;">
                                <div id="datasets_container" class="col-md-12"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tag">
                        <div class="col-md-12  text-default" id="tags_container"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $.ajax('<?php echo $this->Html->Url(array('controller'=>'datasets','action' => 'getList','pid'=>$project['Project']['id']));?>', {
        'async': true,
        'complete': function(data, textStatus, jqXHR) {
            
            $('#datasets_container').html(data.responseText);
        }
    });
    
    
    $.ajax('<?php echo $this->Html->Url(array('controller'=>'tags','action' => 'getList'));?>', {
        'async': true,
        'complete': function(data, textStatus, jqXHR) {
            
            $('#tags_container').html(data.responseText);
        }
    });
    
    $('#update_list_trigger').bind('click',function(event){
         event.preventDefault();
         $('#update_list_trigger').html('Loading, please wait...');
         $.ajax('<?php echo $this->Html->Url(array('controller'=>'datasets','action' => 'updateList','pid'=>$project['Project']['id']));?>', {
            'async': true,
            'complete': function(data, textStatus, jqXHR) {
                $('#update_list_trigger').html('<?php echo '<i class="fa  fa-refresh"></i> '.__('Update datasets from the sources');?>');
                $('#datasets_container').html(data.responseText);
            }
        });

    })
    
    $('#filter_datasets_trigger').bind('click',function(){
        $(this).html('Loading...');
        $.ajax('<?php echo $this->Html->Url(array('controller'=>'datasets','action' => 'getPublicList','pid'=>$project['Project']['id']));?>', {
        'async': true,
        'data':{'tags':[$('#organism').val(),$('#tissue').val(),$('#cell_type').val(),$('#experiment_type').val(),$('#disease').val()]},
        'complete': function(data, textStatus, jqXHR) {
            
            $('#datasets_container').html(data.responseText);
            $('#filter_datasets_trigger').html('Filter');
        }
    });
    })
</script>