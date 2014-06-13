<div class="datasetsTags view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Datasets Tag'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Datasets Tag'), array('action' => 'edit', $datasetsTag['DatasetsTag']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Datasets Tag'), array('action' => 'delete', $datasetsTag['DatasetsTag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $datasetsTag['DatasetsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Datasets Tags'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Datasets Tag'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Datasets'), array('controller' => 'datasets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Dataset'), array('controller' => 'datasets', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tags'), array('controller' => 'tags', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tag'), array('controller' => 'tags', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($datasetsTag['DatasetsTag']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Dataset'); ?></th>
		<td>
			<?php echo $this->Html->link($datasetsTag['Dataset']['name'], array('controller' => 'datasets', 'action' => 'view', $datasetsTag['Dataset']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tag'); ?></th>
		<td>
			<?php echo $this->Html->link($datasetsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $datasetsTag['Tag']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

