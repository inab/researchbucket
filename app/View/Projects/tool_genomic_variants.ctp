<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline super hairline"><?php echo __('Genomic variants explorer');?></h1>
            <p><?php echo __('');?></p>
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
                  <li class="active"><?php echo __('Genomic variants explorer');?></li>
                </ol>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px;">
                <div class="col-md-11">
                    <div class="pull-left  text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo $this->Form->input('chromosome', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Chromosome'));?>
                    </div>
                    <div class="pull-left  text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo $this->Form->input('position', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Position'));?>
                    </div>
                    <div class="pull-left  text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo $this->Form->input('snp', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'SNP ID'));?>
                    </div>
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('effect', array('div'=>false,'label'=>false,'options' => array(),'empty' => '(Allele frequence)'));?>
                    </div>
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('effect', array('div'=>false,'label'=>false,'options' => array(),'empty' => '(Effect)'));?>
                    </div>
                    <div class="pull-left text-default" style="margin-right:5px;margin-bottom:5px;">
                        <?php echo  $this->Form->input('effect', array('div'=>false,'label'=>false,'options' => array(),'empty' => '(Disease)'));?>
                    </div>
                    <div class="clearfix"></div>
                </div> 
                <div class="col-md-1 text-right">
                    <a href="#" id="filter_trigger" class="btn btn-warning">Filter</a>
                </div>   
            </div>
        <div class="row">
            <div class="col-md-12" id="experiments">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
           </div>
        </div>
    </div>
</section>
<script>
    $.ajax({url:'<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'getGenomicVariantExperiments',$project['Project']['id']));?>',
            success:function(data,message){
                $('#experiments').html(data);
            }
    });
    
    $('#filter_trigger').bind('click',function(){
        $(this).html('Loading...');
        $.ajax('<?php echo $this->Html->Url(array('controller'=>'projects','action' => 'getGenomicVariantExperiments',$project['Project']['id']));?>', {
        'async': true,
        'data':{'snp':$('#snp').val()},
        'complete': function(data, textStatus, jqXHR) {
            
            $('#experiments').html(data.responseText);
            $('#filter_trigger').html('Filter');
        }
    });
    })
</script>