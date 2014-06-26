<section class="section section-short swatch-<?php echo Configure::read('swatch1');?>">
    <div class="container">
        <header class="section-header text-center underline">
            <h1 class="headline super hairline"><?php echo __('Genomic variants explorer');?></h1>
            <p><?php echo __('');?></p>
        </header>
    </div>
</section>
<section class="section section-short has-top swatch-<?php echo Configure::read('swatch2');?>">
    <div class="decor-top">
        <svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'index'));?>">Projects</a></li>
                  <li><a href="<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'view',$project['Project']['id']));?>"><?php echo $project['Project']['name'];?></a></li>
                  <li class="active"><?php echo __('Genomic variants explorer');?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="experiments">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
                <!-- CSS3 Data Grids -->
			<!-- inputs for table column filtering -->
			<!-- number of inputs == number of table columns -->
			<input id="col1" name="#" type="checkbox" />
			<input id="col2" name="#" type="checkbox" />
			<input id="col3" name="#" type="checkbox" />
			<input id="col4" name="#" type="checkbox" />
			<input id="col5" name="#" type="checkbox" />
			<input id="col6" name="#" type="checkbox" />
			<input id="col7" name="#" type="checkbox" />
            
                <table class="qlabs_grid_container">
			
				<!-- TABLE HEADER -->
				<thead>
					<tr class="header_row">
						<td colspan="7" class="header_cell">
							<h2 class="table_header">Variants</h2> <!-- header label -->
							
							<!-- table column filtering panel (optional) -->
							<label for="table_config" class="table_config">Table Filter</label> <!-- button label -->
							<input id="table_config" name="#" type="checkbox" />
							<div class="table_config">
								<h3 class="table_config">Active columns</h3> <!-- panel header -->
								<ul>
									<li><label for="col1">Model</label></li>
									<li><label for="col2">Price</label></li>
									<li><label for="col3">Length</label></li>
									<li><label for="col4">Horsepower</label></li>
									<li><label for="col5">Fuel Type</label></li>
									<li><label for="col6">Registration Date</label></li>
									<li><label for="col7">Action</label></li>
								</ul>			
							</div>
							<!-- / -->
							
						</td>
					</tr>	
				</thead>
			
				<!-- TABLE BODY -->
				<tbody class="data_container">
				
					<!-- SUBHEADER -->
					<!-- define optional columns width here -->
					<tr class="subheader_row">
						<td class="subheader_cell"><?php echo __('Chr:position');?></td>
						<td class="subheader_cell"><?php echo __('dbSNP');?><div class="qlabs_tooltip">i<span><strong>dbSNP</strong>Annotations from http://www.ncbi.nlm.nih.gov/SNP/</span></td>
						<td class="subheader_cell"><?php echo __('Coding');?></div></td> <!-- tooltip -->
						<td class="subheader_cell"><?php echo __('Gene');?></td>
						<td class="subheader_cell"><?php echo __('Category');?></td>
						<td class="subheader_cell"><?php echo __('Predicted effects');?></td>
						<td class="subheader_cell">Action</td>
					</tr>
					<!-- / -->

					<!-- ROW 1 -->
					<tr class="data_odd">
						<td class="data_cell">PRi240</td>
						<td class="data_cell">$2,850,000.00</td>
						<td class="data_cell">14.00 m</td>
						<td class="data_cell">250 hp</td>
						<td class="data_cell">Diesel</td>
						<td class="data_cell">05 / 2004</td>
						<td class="data_cell"><label for="row_1">Details</label><div style="margin-left: 5px;" class="grid_button">Buy Now</div></td>
					</tr>
					<!-- expandable section -->
					<tr class="expanded">
						<td colspan="7">
							<input id="row_1" name="#" type="checkbox" />
							<div class="expanded">
								<div class="column_100">
									<h3 class="expanded_header">Features</h3>
									<p>Pellentesque vehicula dignissim lectus sit amet sodales. Phasellus quis ipsum tortor. Nulla facilisi. Vivamus dictum risus placerat metus pulvinar at congue libero blandit. Aenean eget augue nibh, ac lobortis nibh. Etiam lacinia commodo lacus, ut blandit ligula imperdiet vitae. In hac habitasse platea dictumst. Maecenas vestibulum nulla in erat consectetur sit amet ultrices neque volutpat. Donec luctus nisl eu justo fringilla sed malesuada leo varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis leo sapien, convallis quis tempor non, faucibus vel ligula. In et metus quam. Mauris augue tortor, fermentum at sagittis eget, tristique sed diam. Vestibulum in mi id nibh ultrices interdum eu ac massa.</p>
									<p>Pellentesque vehicula dignissim lectus sit amet sodales. Phasellus quis ipsum tortor. Nulla facilisi. Vivamus dictum risus placerat metus pulvinar at congue libero blandit. Aenean eget augue nibh, ac lobortis nibh. Etiam lacinia commodo lacus, ut blandit ligula imperdiet vitae. In hac habitasse platea dictumst. Maecenas vestibulum nulla in erat consectetur sit amet ultrices neque volutpat. Donec luctus nisl eu justo fringilla sed malesuada leo varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis leo sapien, convallis quis tempor non, faucibus vel ligula. In et metus quam. Mauris augue tortor, fermentum at sagittis eget, tristique sed diam. Vestibulum in mi id nibh ultrices interdum eu ac massa.</p>
								</div>
							</div>
						</td>
					</tr>
					<!-- / -->

					<!-- ROW 2 -->
					<tr class="data_even"> <!-- This row is highlighted! -->
						<td class="data_cell">PRi270</td>
						<td class="data_cell">$2,315,000.00</td>
						<td class="data_cell">15.00 m</td>
						<td class="data_cell">280 hp</td>
						<td class="data_cell">Diesel</td>
						<td class="data_cell">08 / 2005</td>
						<td class="data_cell"><label for="row_2">Details</label><div style="margin-left: 5px;" class="grid_button">Buy Now</div></td>
					</tr>
					<!-- expandable section -->
					<tr class="expanded">
						<td colspan="7">
							<input id="row_2" name="#" type="checkbox" />
							<div class="expanded">
								<div class="column_100">
									<h3 class="expanded_header">Features</h3>
									<p>Pellentesque vehicula dignissim lectus sit amet sodales. Phasellus quis ipsum tortor. Nulla facilisi. Vivamus dictum risus placerat metus pulvinar at congue libero blandit. Aenean eget augue nibh, ac lobortis nibh. Etiam lacinia commodo lacus, ut blandit ligula imperdiet vitae. In hac habitasse platea dictumst. Maecenas vestibulum nulla in erat consectetur sit amet ultrices neque volutpat. Donec luctus nisl eu justo fringilla sed malesuada leo varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis leo sapien, convallis quis tempor non, faucibus vel ligula. In et metus quam. Mauris augue tortor, fermentum at sagittis eget, tristique sed diam. Vestibulum in mi id nibh ultrices interdum eu ac massa.</p>
									<p>Pellentesque vehicula dignissim lectus sit amet sodales. Phasellus quis ipsum tortor. Nulla facilisi. Vivamus dictum risus placerat metus pulvinar at congue libero blandit. Aenean eget augue nibh, ac lobortis nibh. Etiam lacinia commodo lacus, ut blandit ligula imperdiet vitae. In hac habitasse platea dictumst. Maecenas vestibulum nulla in erat consectetur sit amet ultrices neque volutpat. Donec luctus nisl eu justo fringilla sed malesuada leo varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis leo sapien, convallis quis tempor non, faucibus vel ligula. In et metus quam. Mauris augue tortor, fermentum at sagittis eget, tristique sed diam. Vestibulum in mi id nibh ultrices interdum eu ac massa.</p>
								</div>
							</div>
						</td>
					</tr>
					<!-- / -->

					<!-- ROW 3 -->
					<tr class="data_odd">
						<td class="data_cell">PRi300</td>
						<td class="data_cell">$1,200,000.00</td>
						<td class="data_cell">9.00 m</td>
						<td class="data_cell">200 hp</td>
						<td class="data_cell">Diesel</td>
						<td class="data_cell">02 / 2001</td>
						<td class="data_cell"><label for="row_3">Details</label><div style="margin-left: 5px;" class="grid_button">Buy Now</div></td>
					</tr>
					<!-- expandable section -->
					<tr class="expanded">
						<td colspan="7">
							<input id="row_3" name="#" type="checkbox" />
							<div class="expanded">
								<div class="column_33">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
								<div class="column_33">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
								<div class="column_33">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
					<!-- / -->

					<!-- ROW 4 -->
					<tr class="data_even">
						<td class="data_cell">PRi420</td>
						<td class="data_cell">$950,000.00</td>
						<td class="data_cell">8.00 m</td>
						<td class="data_cell">120 hp<div class="qlabs_tooltip">i<span><strong>120 hp</strong>This tooltip is positioned above a hovered item.</span></div></td> <!-- tooltip -->
						<td class="data_cell">Diesel</td>
						<td class="data_cell">02 / 2003</td>
						<td class="data_cell"><label for="row_4">Details</label><div style="margin-left: 5px;" class="grid_button">Buy Now</div></td>
					</tr>
					<!-- expandable section -->
					<tr class="expanded">
						<td colspan="7">
							<input id="row_4" name="#" type="checkbox" checked="checked" />
							<div class="expanded">
								<div class="column_50">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
								<div class="column_50">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
					<!-- / -->

					<!-- ROW 5 -->
					<tr class="data_odd">
						<td class="data_cell">PRi750</td>
						<td class="data_cell">$3,335,000.00</td>
						<td class="data_cell">22.00 m</td>
						<td class="data_cell">500 hp</td>
						<td class="data_cell">Diesel</td>
						<td class="data_cell">10 / 2008</td>
						<td class="data_cell"><label for="row_5">Details</label><div style="margin-left: 5px;" class="grid_button">Buy Now</div></td>
					</tr>
					<!-- expandable section -->
					<tr class="expanded">
						<td colspan="7">
							<input id="row_5" name="#" type="checkbox" />
							<div class="expanded">
								<div class="column_100">
									<h4 class="expanded_header">Features</h4>
									<ul>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
										<li>Hull engine<span class="right">Two</span></li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
					<!-- / -->

				</tbody>
			</table>
            </div>
        </div>
    </div>
</section>
<script>
    $.ajax({url:'<?php echo $this->Html->Url(array('controller'=>'projects','action'=>'getGenomicVariantExperiments',$project['Project']['id']));?>',
            success:function(data,message){
                $('#experiments').html(data);
            }
    })
</script>