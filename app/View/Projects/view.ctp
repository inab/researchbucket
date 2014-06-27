<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline hyper hairline"><?php echo $project['Project']['name'];?></h1>
            <p><?php echo $project['Project']['tagline'];?></p>
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
                <div class="row" style="margin-bottom:30px;">
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-hdd-o animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo count($project['Dataset']);?>">
                               <span class="value super hairline odometer odometer-auto-theme"></span> 
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><?php echo __('Datasets');?></h3>
                    </div>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa  fa-flask animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis['EXPERIMENT_TYPE']) && $kpis['EXPERIMENT_TYPE'])?$kpis['EXPERIMENT_TYPE']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportExperiment',$project['Project']['id']));?>"><?php echo __('Experiment types');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-group animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis['DONOR_ID']) && $kpis['DONOR_ID'])?$kpis['DONOR_ID']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportDonor',$project['Project']['id']));?>"><?php echo __('Donors');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-barcode animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis['SAMPLE_ID']) && $kpis['SAMPLE_ID'])?$kpis['SAMPLE_ID']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportSample',$project['Project']['id']));?>"><?php echo __('Samples');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-male animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis['TISSUE']) && $kpis['TISSUE'])?$kpis['TISSUE']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportTissue',$project['Project']['id']));?>"><?php echo __('Tissues');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <?php if(Configure::read('demomode') == 'blueprint'):?>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-sitemap animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis['CELL_TYPE']) && $kpis['CELL_TYPE'])?$kpis['CELL_TYPE']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportCellType',$project['Project']['id']));?>"><?php echo __('Cell types');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <?php elseif(Configure::read('demomode') == 'rdconnect'):?>
                    <div class="col-md-2">
                        <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-stethoscope animated" data-animation=""></i></span></div></div>
                        <div class="counter underline" data-count="<?php echo (isset($kpis) && count($kpis))?$kpis['DISEASE']:0;?>">
                            <span class="value super hairline odometer odometer-auto-theme"></span>
                        </div>
                        <h3 class="text-center normal light no-bordered-header"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'reportDisease',$project['Project']['id']));?>"><?php echo __('Diseases');?> <i class="fa fa-search" style="font-size:14px;"></i></a></h3>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-8">
                <article class="post-showinfo">                  
                    <div class="post-head small-screen-center">
                        <h2 class="post-title"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$project['Project']['id']));?>" title="<?php echo $project['Project']['name'];?>" rel="bookmark"><?php echo $project['Project']['name'];?></a>
                        </h2>
                        <small class="post-author"><?php echo $project['Project']['tagline'];?></small>
                        <div class="post-icon">
                            <div class="hex hex-big">
                                <i class="fa fa-bookmark"></i>
                            </div>
                        </div>    
                    </div>
                    <div class="post-body">
                        <?php echo str_replace("\n","<br>",$project['Project']['description']);?>
                    </div>
                </article>
            </div>
            <div class="col-md-4 sidebar text-center">
                <div class="well">
                    <a class="btn btn-lg btn-default" href="<?php echo $this->Html->Url(array('controller'=>'datasets','action'=>'exploreDatasets','pid'=>$project['Project']['id']));?>">Explore data</a> 
                    <div class="btn-group">
                      <button type="button" class="btn btn-lg btn-warning">View results</button>
                      <button type="button" class="btn btn-lg btn-warning dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'toolGenomicVariants',$project['Project']['id']));?>">Genomic Variants Explorer</a></li>
                      </ul>
                    </div>

                </div>
                <?php if ($project['Project']['youtube']):?>
                <div id="player" class="player">

                </div>
                <?php else:?>
                <div class="post-media overlay">
                    <a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$project['Project']['id']));?>" class="feature-image hover-animate">
                        <img src="<?php echo $this->webroot.'files/project/image/'.$project['Project']['image_dir'].'/thumb_'.$project['Project']['image'];?>" alt="">
                    </a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php if ($project['Project']['youtube']):?>
<script>
      var tag = document.createElement('script');
      tag.src = "http://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
          width:360,
          height:203,  
          playerVars: { 'autoplay': 1, 'controls': 1,'autohide':1,'wmode':'opaque' },
          videoId: '<?php echo $project['Project']['youtube'];?>',
          events: {
            'onReady': onPlayerReady}
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.mute();
      }
</script>
<?php endif;?>