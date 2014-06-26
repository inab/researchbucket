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
            <td><?php echo $this->Html->link($t['t']['name'], array('action' => 'view', $t['t']['id']), array('class'=>'btn btn-xs btn-link','escape' => false)); ?></td>
            <td>
                <?php echo $this->Form->create('Tag',array('url'=>array('controller'=>'tags','action'=>'edit',$t['t']['id'])),array('role' => 'form')); ?>
                <?php echo $this->Form->hidden('id',array('value'=>$t['t']['id']));?>
                <?php echo $this->Form->input('tag_type_id', array('div'=>false,'label'=>false,'options' => $tag_types,'selected'=>$t['t']['tag_type_id'],'empty' => '(choose one)','onchange'=>'submitForm(this)'));?>
                <?php echo $this->Form->end() ?>
            </td>
            <td><?php echo count($t['d']);?></td>
            <td class="actions">
				<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $t['t']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $t['t']['id'])); ?>
			</td>
        </tr>
        <?php 
            $i++;
            endforeach;
        ?>
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

<script>
    $('.pagination li a').bind('click',function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        if(link){    
            $.ajax(link, {
                'async': true,
                'complete': function(data, textStatus, jqXHR) {
                    
                    $('#tags_container').html(data.responseText);
                }
            });
        }
    })

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