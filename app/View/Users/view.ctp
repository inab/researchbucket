<div class="users view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('User'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit User'), array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete User'), array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Firstname'); ?></th>
		<td>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Surname'); ?></th>
		<td>
			<?php echo h($user['User']['surname']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin User'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_user']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Name'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Headline'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_headline']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Description'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Location'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_location']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Url'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_url']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Image'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_image']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Url Authenticated'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_url_authenticated']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Access Token'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_access_token']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Linkedin Access Token Expires'); ?></th>
		<td>
			<?php echo h($user['User']['linkedin_access_token_expires']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

