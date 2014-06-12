<article>
<section class="section section-short swatch-black-beige">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline super hairline"><?php echo __('Recent projects');?></h1>
        </header>
    </div>
</section>

<section class="section section-normal has-top swatch-beige-black">
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


<footer id="footer" role="contentinfo">
    <section class="section section-normal  swatch-black-beige">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="swatch_social-2" class="sidebar-widget  widget_swatch_social">
                        <ul class="unstyled inline small-screen-center social-icons social-background social-big">
                            <li>
                                <a target="_blank" href="#"></a>
                            </li>

                            <li>
                                <a target="_blank" href="http://twitter.com/oxygenna"></a>
                            </li>

                            <li>
                                <a target="_blank" href="#"></a>
                            </li>
                        </ul>
                    </div>

                    <div id="text-4" class="sidebar-widget  widget_text">
                        <div class="textwidget">
                            ANGLE 2014 ALL RIGHTS RESERVED
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
</article>
<script>
     $.ajax('<?php echo $this->Html->Url(array('controller'=>'projects','action' => 'getlist'));?>', {
        'async': true,
        'complete': function(data, textStatus, jqXHR) {
            
            $('#projects_container').html(data.responseText);
        }
    });

</script>


