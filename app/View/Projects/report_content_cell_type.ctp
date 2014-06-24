<div class="row">
    <div class="col-md-12">
        <h2 class="text-center" style="color:#000;"><?php echo __('Experiment\'s coverage per sample');?></h2>
        <table class="table">
            <thead>
                <th><?php echo __('Experiment type');?></th>
                <th>Female</th>
                <th>Male</th>
            </thead>
            <tbody>
                <?php foreach ($experiments as $k=>$v):?>
                <tr>
                    <td><a href="#" style="color:#000;"><?php echo $k;?></a></td>
                    <td><span style="color:#000"><?php echo (isset($v['Female']))?count($v['Female']):'-';?></span></td>
                    <td><span style="color:#000"><?php echo (isset($v['Male']))?count($v['Male']):'-';?></span></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
