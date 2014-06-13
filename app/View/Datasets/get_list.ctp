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
                    foreach ($d['Tag'] as $t){
                        echo '<a href="" class="btn btn-xs btn-link">'.$t['name'].'</a>&nbsp;';
                    } 
                    
                ?>
                
            </td>
            <td class="actions">
				<?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $d['Dataset']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $d['Dataset']['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $d['Dataset']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $d['Dataset']['id'])); ?>
			</td>
        </tr>
        <?php 
            $i++;
            endforeach;
        ?>
    </tbody>
</table>