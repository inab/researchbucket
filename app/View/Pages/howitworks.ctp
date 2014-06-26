<article>
    <section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo __('How it works');?></h1>
            </header>

            <div class="row">
                <div class="col-md-12  text-default">
                    <ul class="list-unstyled vertical-icon-border box-list">
                        <li class="row">
                            <div class="col-md-3">
                                <div class="box-round box-normal">
                                    <div class="box-dummy"></div>
                                    <span class="box-inner"><img alt="" src="http://cdn6.oxygenna.com/wp-content/uploads/2013/11/custom-icon-disk-600x518.png" width="90%" style="margin-top:10px;"></span>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <h2 class="bordered-header small-screen-center"><?php echo __('You tell us where your data is stored');?></h2>
                                <p class="text-left"><?php echo __('In your organization or research project you must designate a person who will be responsible about keeping your project datasets updated. This person will notify us trough the interface which are the main data repositories from where your data will be pulled.');?></p>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-3">
                                <div class="box-round box-normal">
                                    <div class="box-dummy"></div>
                                    <span class="box-inner"><img alt="" src="http://cdn9.oxygenna.com/wp-content/uploads/2013/11/custom-icon-cog-600x600.png"></span>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <h2 class="bordered-header small-screen-center"><?php echo __('Data is pulled from the source and examined');?></h2>

                                <p class="text-left"><?php echo __('Research data is pulled from the original source, the platform then attempts to recognise standard metadata. Once the data is processed it\'s presented back to the curators trough the admin interface.');?></p>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-3">
                                <div class="box-round box-normal">
                                    <div class="box-dummy"></div>
                                    <span class="box-inner"><img alt="" src="http://cdn4.oxygenna.com/wp-content/uploads/2013/11/custom-icon-ballpoint-600x600.png"></span>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <h2 class="bordered-header small-screen-center"><?php echo __('Curators validate the data and prepare the data release');?></h2>

                                <p class="text-left"><?php echo __('Trough the admin interface curators explore the metadata, fix possible errors, validate metadata against controller vocabularies and ontologies and prepare the data to be released.');?></p>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-3">
                                <div class="box-round box-normal">
                                    <div class="box-dummy"></div>
                                    <span class="box-inner"><img alt="" src="http://cdn4.oxygenna.com/wp-content/uploads/2013/11/custom-icon-imac11-600x600.png"></span>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <h2 class="bordered-header small-screen-center"><?php echo __('Data and results are released to the community');?></h2>

                                <p class="text-left"><?php echo __('Finally, data is released trough the website, people can interrogate the platform to explore the different datasets or browse the results trough the tools available.');?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-normal has-top swatch-<?php echo Configure::read('swatch2');?>">
        <div class="decor-top"></div>

        <div class="background-media"></div>

        <div class="background-overlay" style=""></div>

        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo __('Ready to rock?');?></h1>
                <p><?php echo __('Make the most of your data by sharing it with a wider community of scientists. Along the way your data will be improved and make more interoperable by applying controlled vocabularies and standard ontologies.');?></p>
            </header>

            <div class="row">
                <div class="col-md-12  text-default">
                    <div class="text-center">
                        <div class="text-center">
                            <a href="" class="btn btn-danger btn-lg  btn-icon-right" target="_self"><?php echo __('Share your research data');?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
