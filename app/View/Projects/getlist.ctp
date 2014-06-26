<?php foreach ($projects as $p):?>
<div class="infinite-item col-md-4 filter-news filter-web-design">
    <div class="grid-post swatch-<?php echo Configure::read('swatch1');?>">
        <article id="project-<?php echo $p['Project']['id'];?>" class="post-showinfo">
            <?php if ($p['Project']['youtube']):?>
            <div id="player" class="player">
                <iframe width="370" height="203" src="//www.youtube.com/embed/<?php echo $p['Project']['youtube'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php else:?>
            <div class="post-media overlay">
                <a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$p['Project']['id']));?>" class="feature-image hover-animate">
                    <img src="<?php echo $this->webroot.'files/project/image/'.$p['Project']['image_dir'].'/thumb_'.$p['Project']['image'];?>" alt="" width="370">
                </a>
            </div>
            <?php endif;?>
            <div class="post-head small-screen-center">
                <h2 class="post-title"><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$p['Project']['id']));?>" title="<?php echo $p['Project']['name'];?>" rel="bookmark"><?php echo $p['Project']['name'];?></a></h2><small class="post-date"><?php echo $p['Project']['tagline'];?></small>
                <div class="post-icon">
                    <div class="hex hex-big"><i class="fa fa-bookmark"></i></div>
                </div>
            </div>
            <div class="post-body">
                <?php echo $p['Project']['short_description'];?>
            </div>

        </article>
    </div>
</div>
<?php endforeach;?>





<div id="infscr-loading" style="display: none;">
    <img alt="Loading..." src="" style="display: none;">
    <div style="opacity: 1;">
        No more items to load.
    </div>
</div>
