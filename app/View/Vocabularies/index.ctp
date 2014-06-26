<article>
    <section class="section section-short swatch-blue-white">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline super hairline"><?php echo __('Vocabularies');?></h1>
            </header>
        </div>
    </section>
    <section class="section section-short swatch-white-blue">
        <div class="container">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12 text-right">
                    <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Vocabulary'), array('controller' => 'vocabularies', 'action' => 'add'), array('class'=>'btn btn-warning','escape' => false)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  text-default">            
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
        				<thead>
        					<tr>
        						<th><?php echo $this->Paginator->sort('name'); ?></th>
              						<th><?php echo $this->Paginator->sort('url'); ?></th>
        						<th><?php echo $this->Paginator->sort('is_ontology'); ?></th>
        						<th class="actions"></th>
        					</tr>
        				</thead>
        				<tbody>
        				<?php foreach ($vocabularies as $vocabulary): ?>
        					<tr>
        						<td><?php echo h($vocabulary['Vocabulary']['name']); ?>&nbsp;</td>
        						<td><?php echo h($vocabulary['Vocabulary']['url']); ?>&nbsp;</td>
        						<td><?php echo h($vocabulary['Vocabulary']['is_ontology']); ?>&nbsp;</td>
        						<td class="actions">
        							<?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $vocabulary['Vocabulary']['id']), array('escape' => false)); ?>
        							<?php echo $this->Html->link('<i class="fa fa-edit"></i></span>', array('action' => 'edit', $vocabulary['Vocabulary']['id']), array('escape' => false)); ?>
        							<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $vocabulary['Vocabulary']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $vocabulary['Vocabulary']['id'])); ?>
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