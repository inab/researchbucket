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
            <ol class="breadcrumb">
              <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">Projects</a></li>
              <li class="active">Add</li>
            </ol>
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
					<?php echo $this->Form->input('years', array('class' => 'form-control', 'placeholder' => 'Duration of the project'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('current_year', array('class' => 'form-control', 'placeholder' => 'Current year'));?>
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
        </div>
    </section>
</article>