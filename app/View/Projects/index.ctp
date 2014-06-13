<article>
    <section class="section section-short swatch-blue-white">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo __('My projects');?></h1>
            </header>
        </div>
    </section>
    <section class="section section-short swatch-white-blue">
        <div class="container">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12 text-right">
                    <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class'=>'btn btn-warning','escape' => false)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  text-default">            
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project name</th>
                                <th>Tagline</th>
                                <th>Created by</th>
                                <th>Created date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1; 
                                foreach($projects as $p):
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $this->Html->link($p['Project']['name'], array('action' => 'view', $p['Project']['id']), array('escape' => false)); ?></td>
                                <td><?php echo $p['Project']['tagline'];?></td>
                                <td></td>
                                <td><?php echo $this->Time->nice($p['Project']['created']);?></td>
                                <td class="actions">
        							<?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $p['Project']['id']), array('escape' => false)); ?>
        							<?php echo $this->Html->link('<i class="fa fa-cloud"></i>', array('controller'=>'datasets','action' => 'index','pid'=>$p['Project']['id']), array('escape' => false)); ?>
        							<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $p['Project']['id']), array('escape' => false)); ?>
        							<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $p['Project']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $p['Project']['id'])); ?>
        						</td>
                            </tr>
                            <?php 
                                $i++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</article>