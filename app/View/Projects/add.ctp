<div class="projects form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Project'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Projects'), array('action' => 'index'), array('escape' => false)); ?></li>
														</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Project', array('role' => 'form','type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tagline', array('class' => 'form-control', 'placeholder' => 'Tagline'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('short_description', array('class' => 'form-control', 'placeholder' => 'Short Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('logo', array('class' => 'form-control', 'placeholder' => 'Logo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Project.image', array('type' => 'file','class' => 'form-control'));?>
				    <?php echo $this->Form->input('Project.image_dir', array('type' => 'hidden')); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('youtube', array('class' => 'form-control', 'placeholder' => 'Youtube Video ID'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
