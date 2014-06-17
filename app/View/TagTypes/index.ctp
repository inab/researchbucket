<article>
    <section class="section section-short swatch-blue-white">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo __('Metadata Attributes');?></h1>
            </header>
        </div>
    </section>
    
    <section class="section section-short swatch-white-blue">
        <div class="container">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12 text-right">
                    <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Attribute'), array('controller' => 'tagTypes', 'action' => 'add'), array('class'=>'btn btn-warning','escape' => false)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  text-default">            
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
        				<thead>
        					<tr>
        						<th><?php echo $this->Paginator->sort('id'); ?></th>
        						<th><?php echo $this->Paginator->sort('name'); ?></th>
        						<th><?php echo $this->Paginator->sort('created'); ?></th>
        						<th><?php echo $this->Paginator->sort('modified'); ?></th>
        						<th class="actions"></th>
        					</tr>
        				</thead>
        				<tbody>
        				<?php foreach ($tagTypes as $tagType): ?>
        					<tr>
        						<td><?php echo h($tagType['TagType']['id']); ?>&nbsp;</td>
        						<td><?php echo h($tagType['TagType']['name']); ?>&nbsp;</td>
        						<td><?php echo h($tagType['TagType']['created']); ?>&nbsp;</td>
        						<td><?php echo h($tagType['TagType']['modified']); ?>&nbsp;</td>
        						
        						<td class="actions">
        							<?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $tagType['TagType']['id']), array('escape' => false)); ?>
        							<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $tagType['TagType']['id']), array('escape' => false)); ?>
        							<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $tagType['TagType']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $tagType['TagType']['id'])); ?>
        						</td>
        					</tr>
        				<?php endforeach; ?>
        				</tbody>
        			</table>
        
        			<p>
        				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
        			</p>
        
        			<?php
        			$params = $this->Paginator->params();
        			if ($params['pageCount'] > 1) {
        			?>
        			<ul class="pagination pagination-sm">
        				<?php
        					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
        					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
        					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
        				?>
        			</ul>
        			<?php } ?>
                </div>
            </div>
        </div>
    </section>
</article>
