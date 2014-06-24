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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#general" data-toggle="tab">General</a></li>
              <li><a href="#data" data-toggle="tab">Data storage source</a></li>
              <li><a href="#results" data-toggle="tab">Results storage source</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="general">
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
 
              </div>
              <div class="tab-pane" id="data">
                  <?php for($i=0;$i<3;$i++):?>
                  <div class="row" style="margin-bottom:5px;">
                      <div class="col-md-1">
                        <p style="color:#6692a6"><?php echo($i+1);?></p>
                        <?php 
                            if (isset($this->request->data['Storage'][$i]['id'])){
                                 echo $this->Form->hidden('Storage.'.$i.'.id',array('value'=>$this->request->data['Storage'][$i]['id']));
                            }
                        ?>
                        <?php 
                            if (isset($this->request->data['Project']['id'])){
                                echo $this->Form->hidden('Storage.'.$i.'.project_id',array('value'=>$this->request->data['Project']['id']));
                            }
                            echo $this->Form->hidden('Storage.'.$i.'.type',array('value'=>'data'));
                        ?>
                      </div>
                      <div class="col-md-3">
                          <?php echo $this->Form->input('Storage.'.$i.'.url', array('type'=>'text','div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Url'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo $this->Form->input('Storage.'.$i.'.path', array('type'=>'text','div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Base path'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo $this->Form->input('Storage.'.$i.'.username', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Username'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo $this->Form->input('Storage.'.$i.'.password', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Password'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo  $this->Form->input('Storage.'.$i.'.type', array('div'=>false,'label'=>false,'options' => array('FTP','SFTP'),'default'=>'FTP','empty' => '(choose one)'));?>
                      </div>
                  </div>   
                  <?php endfor;?>
              </div>
              <div class="tab-pane" id="results">
                  <?php for($i=3;$i<6;$i++):?>
                  <div class="row" style="margin-bottom:5px;">
                      <div class="col-md-1">
                        <p style="color:#6692a6"><?php echo($i-2);?></p>
                        <?php 
                            if (isset($this->request->data['Storage'][$i]['id'])){
                                 echo $this->Form->hidden('Storage.'.$i.'.id',array('value'=>$this->request->data['Storage'][$i]['id']));
                            }
                        ?>
                        <?php 
                            if (isset($this->request->data['Project']['id'])){
                                echo $this->Form->hidden('Storage.'.$i.'.project_id',array('value'=>$this->request->data['Project']['id']));
                            }
                            echo $this->Form->hidden('Storage.'.$i.'.type',array('value'=>'result'));
                        ?>
                      </div>
                      <div class="col-md-5">
                          <?php echo $this->Form->input('Storage.'.$i.'.url', array('type'=>'text','div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Url'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo $this->Form->input('Storage.'.$i.'.username', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Username'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo $this->Form->input('Storage.'.$i.'.password', array('div'=>false,'label'=>false,'class' => 'form-control', 'placeholder' => 'Password'));?>
                      </div>
                      <div class="col-md-2">
                          <?php echo  $this->Form->input('Storage.'.$i.'.type', array('div'=>false,'label'=>false,'options' => array('FTP'),'default'=>'FTP','empty' => '(choose one)'));?>
                      </div>
                  </div>   
                  <?php endfor;?>
              </div>
            </div>
            <div style="margin-top:10px;"><?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?></div>
            <?php echo $this->Form->end() ?>
        </div>
    </section>
</article>