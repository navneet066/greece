<?php if(!empty($packages)){
    foreach($packages as $key => $value){
        $id = $value['Package']['id'];?>
        <div class="col-md-6 col-sm-6 text-center" style="border: dashed">
            <h1><?php echo $value['Package']['name']; ?></h1>
            <p><?php echo "Disk Capacity : " .$value['Package']['disk_storage']?></p>
            <p><?php echo "Compute Hours : " .$value['Package']['compute_hours']?></p>
            <p><?php echo "Total Engine : ". $value['Package']['number_of_engines']?></p>
            <p><?php echo "Language Pairs : ". $value['Package']['lang_pairs']?></p>
            <p><?php echo "Max Translated words : ". $value['Package']['max_translated_words']?></p>
            <p><?php echo "Min Hour per job : ". $value['Package']['min_hour_per_job']?></p>
            <p><?php echo "Min rate word : ". $value['Package']['min_rate_word']?></p>
            <p><?php echo "Min rate mb : " .$value['Package']['min_rate_mb']?></p>
            <p><?php echo "Extra rate add word : " .$value['Package']['extra_rate_add_word']?></p>
            <p><?php echo "Extra rate add mb : " .$value['Package']['extra_rate_add_mb']?></p>
            <p><?php echo "Extra rate add hour : " .$value['Package']['extra_rate_add_hour']?></p>
            <p><?php echo "Extra rate add engine : " .$value['Package']['extra_rate_add_engine']?></p>
            <p><?php echo "Valid Days : " .$value['Package']['valid_days']?></p>
            <p><?php echo "Price : " .$value['Package']['price']?></p>
            <p>
                <?php echo $this->Html->link('Select this', array("controller" =>"packages", "action" =>"select_package",
                    $id), array('type' => 'submit', 'class' => "btn btn-success"));?>
            </p>
        </div>
   <?php }?>
    <div class="clearfix"></div>
<?php }?>
