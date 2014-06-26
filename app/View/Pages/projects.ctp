<article>
<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline hyper hairline"><?php echo __('Projects');?></h1>
            <p>See what data is available and explore some outstanding results</p>
        </header>
    </div>
</section>

<section class="section section-normal has-top swatch-<?php echo Configure::read('swatch2');?>">
    <div class="decor-top">
        <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12  text-default">            
                <div class="row">
                    <div id="projects_container"></div>
                </div>
            </div>
        </div>
    </div>
</section>
</article>
<script>
     $.ajax('<?php echo $this->Html->Url(array('controller'=>'projects','action' => 'getlist'));?>', {
        'async': true,
        'complete': function(data, textStatus, jqXHR) {
            
            $('#projects_container').html(data.responseText);
        }
    });

</script>


