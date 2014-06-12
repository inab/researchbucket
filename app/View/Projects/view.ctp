<section class="section section-short swatch-black-beige">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline hyper hairline"><?php echo $project['Project']['name'];?></h1>
            <p><?php echo $project['Project']['tagline'];?></p>
        </header>
    </div>
</section>
<section class="section section-short has-top swatch-beige-black">
    <div class="decor-top">
        <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post type-post format-image hentry category-news category-web-design tag-design tag-dynamics tag-minimal post-showinfo instock">
                    
                    <div class="row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-hdd-o animated" data-animation=""></i></span></div></div>
                            <div class="counter underline" data-count="1389">
                                   <span class="value super hairline odometer odometer-auto-theme"></span> 
                            </div>
                            <h3 class="text-center normal light no-bordered-header"><?php echo __('Datasets');?></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="box-wrap"><div class="box-round box-medium"><div class="box-dummy"></div><span class="box-inner"><i class="fa fa-bar-chart-o animated" data-animation=""></i></span></div></div>
                            <div class="counter underline" data-count="13234">
                                <span class="value super hairline odometer odometer-auto-theme">100</span>
                            </div>
                            <h3 class="text-center normal light no-bordered-header"><?php echo __('Results');?></h3>
                        </div>
                    </div>
                    
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
                        <?php echo $project['Project']['description'];?>
                    </div>
                </article>
            </div>
            <div class="col-md-4 sidebar text-center">
                <div class="well">
                    <a class="btn btn-lg btn-default">Explore data</a> <a class="btn btn-lg btn-warning">View results</a>
                </div>
                <div style="margin-top:25px;padding-top:50px;" class="well">
                    <div class="chart easyPieChart" data-track-color="#e7e5d9" data-bar-color="#29c26d" data-line-width="20" data-percent="<?php echo ($project['Project']['years'])?($project['Project']['current_year']*100/$project['Project']['years']):0;?>" data-size="200">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h3 class="text-center margin-top"><?php echo __('Project duration').' '.$project['Project']['years'].' '.__('Years');?></h3>
                </div>
            </div>
        </div>
    </div>
</section>