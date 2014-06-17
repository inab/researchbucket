<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i=1; 
            foreach($datasets as $d):
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $this->Html->link($d['Dataset']['name'], array('action' => 'view', $d['Dataset']['id']), array('escape' => false)); ?></td>
            <td>
                <?php 
                    $tags = array();
                    //debug($d);  
                    foreach ($d['Tag'] as $t){           
                            echo '<a href="" class="btn btn-xs btn-link">'.str_replace('_',' ',$t['name']).'</a>&nbsp;';

                    } 
                    
                ?>
                
            </td>
            <td class="actions">
				
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
                    
                    $('#datasets_container').html(data.responseText);
                }
            });
        }
    });
</script>