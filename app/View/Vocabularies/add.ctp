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
            <ol class="breadcrumb">
              <li><a href="<?php echo $this->Html->Url(array('controller'=>'vocabularies','action'=>'index'));?>">Vocabularies</a></li>
              <li class="active">Add</li>
            </ol>
            <?php echo $this->Form->create('Vocabulary', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('url', array('type'=>'text','class' => 'form-control', 'placeholder' => 'Url'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('is_ontology', array('class' => 'form-control','options' => array('NO','YES'),'placeholder' => 'Is Ontology'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
        </div>
    </section>
</article>