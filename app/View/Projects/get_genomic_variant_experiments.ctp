<h2>Variants: <?php echo $this->Number->format($total, array(
    'places' => 0,
    'escape' => false,
    'before' => '',
    'decimals' => '.',
    'thousands' => ','
));?>
</h2>
<table class="table">
    <thead>
        <tr>
            <th><a href="#" data-toggle="tooltip" data-placement="top" title="Genomic DNA change, shown as {chromosome}:g.{start}{ref}>Variant">DNA Change</a></th>
            <th><a href="#" data-toggle="tooltip" data-placement="top" title="The RS code of a variant that is recorded in dbSNP">RS</a></th>
            <th><a href="#" data-toggle="tooltip" data-placement="top" title="Global Minor Allele Frequency of the variant, from 1000 genomes project data">GMAF</a></th>
            <th><a href="#" data-toggle="tooltip" data-placement="top" title="The diploid genotype determined">GT</a></th>
            <th><a href="#" data-toggle="tooltip" data-placement="top" title="Number of Donors affected by Mutation Filtered by Current Search Criteria / unfiltered # donors the mutation is observed."># Donors affected</a></th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($variants as $v):
            
            $gt = '';
            $samples_count = 0;
            if(isset($v->_source->data)){
                $samples_count = count($v->_source->data);
                foreach ($v->_source->data as $d){
                    if(isset($d->mut_data)){
                        foreach ($d->mut_data as $md){
                            if(isset($md->key) and $md->key == 'GT'){
                                switch($md->value){
                                    case '0/0':
                                        $gt = 'Hom Ref (0/0)';
                                        break;
                                    case '0/1':
                                        $gt = 'Het (0/1)';
                                        break;
                                    case '1/1':
                                        $gt = 'Hom Alt (1/1)';
                                        break;        
                                }
                            }
                        } 
                    }
                }
            }
            
            
            
        ?>
           <tr>
               <td><?php echo 'Chr'.$v->_source->chromosome.':g.'.$v->_source->chromosome_start.$v->_source->mutated_from_allele.'>'.$v->_source->mutated_to_allele;?></td>
               <td><?php echo ((isset($v->_source->mutation_ident->RScode)))?'<a target="_blank" href="http://www.ncbi.nlm.nih.gov/SNP/snp_ref.cgi?type=rs&rs='.$v->_source->mutation_ident->RScode.'">'.$v->_source->mutation_ident->RScode.'</a>':'';?></td>
               <td><?php echo ((isset($v->_source->mutation_ident->other[0]->value)))?$v->_source->mutation_ident->other[0]->value:'';?></td>
               <td><?php echo $gt;?></td>
               <td><?php echo $samples_count;?></td>
           </tr>
        <?php endforeach;?>    
    </tbody>
    
</table>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>