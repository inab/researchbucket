<article>
    <section class="section section-short swatch-blue-white">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo $project['Project']['name'].' \'s '.__('Datasets');?></h1>
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
                </div>
            </div>
            <div class="row">
                 <ul class="nav nav-tabs">
                  <li class="active"><a href="#name" data-toggle="tab">Dataset Names</a></li>
                  <li><a href="#tag" data-toggle="tab">Tags</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="name">
                        <div class="col-md-12  text-default" id="datasets_container"></div>
                    </div>
                    <div class="tab-pane active" id="tag">
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
</script>