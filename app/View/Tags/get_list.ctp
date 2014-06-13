<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Tag Name</th>
            <th>Type</th>
            <th>Datasets</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i=1; 
            foreach($tags as $t):
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $this->Html->link($t['Tag']['name'], array('action' => 'view', $t['Tag']['id']), array('class'=>'btn btn-xs btn-link','escape' => false)); ?></td>
            <td>
                <?php echo $this->Form->create('Tag',array('url'=>array('controller'=>'tags','action'=>'edit',$t['Tag']['id'])),array('role' => 'form')); ?>
                <?php echo $this->Form->hidden('id',array('value'=>$t['Tag']['id']));?>
                <?php echo $this->Form->input('tag_type_id', array('div'=>false,'label'=>false,'options' => $tag_types,'selected'=>$t['Tag']['tag_type_id'],'empty' => '(choose one)','onchange'=>'submitForm(this)'));?>
                <?php echo $this->Form->end() ?>
            </td>
            <td><?php echo count($t['Dataset']);?></td>
            <td class="actions">
				<?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $t['Tag']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $t['Tag']['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $t['Tag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $t['Tag']['id'])); ?>
			</td>
        </tr>
        <?php 
            $i++;
            endforeach;
        ?>
    </tbody>
</table>
<script>
    function submitForm(handler){
        
        $.ajax($(handler).closest('form').attr('action'), {
            'async': true,
            'method': 'POST',
            'data':$(handler).closest('form').serialize(),
            'complete': function(data, textStatus, jqXHR) {
                
                $('#datasets_container').html(data.responseText);
            }
        });
    }    
</script>