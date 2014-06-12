<div class="users form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit User'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?></li>
														</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('firstname', array('class' => 'form-control', 'placeholder' => 'Firstname'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('surname', array('class' => 'form-control', 'placeholder' => 'Surname'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_user', array('class' => 'form-control', 'placeholder' => 'Linkedin User'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_name', array('class' => 'form-control', 'placeholder' => 'Linkedin Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_headline', array('class' => 'form-control', 'placeholder' => 'Linkedin Headline'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_description', array('class' => 'form-control', 'placeholder' => 'Linkedin Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_location', array('class' => 'form-control', 'placeholder' => 'Linkedin Location'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_url', array('class' => 'form-control', 'placeholder' => 'Linkedin Url'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_image', array('class' => 'form-control', 'placeholder' => 'Linkedin Image'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_url_authenticated', array('class' => 'form-control', 'placeholder' => 'Linkedin Url Authenticated'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_access_token', array('class' => 'form-control', 'placeholder' => 'Linkedin Access Token'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('linkedin_access_token_expires', array('class' => 'form-control', 'placeholder' => 'Linkedin Access Token Expires'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
