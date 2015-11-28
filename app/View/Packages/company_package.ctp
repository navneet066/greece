<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo __("Package Listing")?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="package_index">
                <thead>
                <tr>
                    <th><?php echo __("Package Name")?></th>
                    <th><?php echo __("Disk Storage")?></th>
                    <th><?php echo __("Compute Hours")?></th>
                    <th><?php echo __("Total Engines")?></th>
                    <th><?php echo __("Language Pairs")?></th>
                    <th><?php echo __("Max Translate words")?></th>
                    <th><?php echo __("Selected By")?></th>
                    <th><?php echo __("Selected Date")?></th>
                    <th><?php echo __("Action")?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($packages as $key => $value) {
                    $id = $value["Package"]["id"];?>
                    <tr>
                        <td><?php echo $value['Package']['name']?></td>
                        <td><?php echo $value['Package']['disk_storage'];?></td>
                        <td><?php echo $value['Package']['compute_hours'];?></td>
                        <td><?php echo $value['Package']['number_of_engines'];?></td>
                        <td><?php echo $value['Package']['lang_pairs'];?></td>
                        <td><?php echo $value['Package']['max_translated_words']?>
                        <td><?php echo $value['User']['full_name']?></td>
                        <td><?php echo $value['UserPackage']['created']?></td>
                        <td>
                            <?php
                            $updateProfile = '<i class="fa fa-pencil-square-o bigger-130"></i>';
                            echo $this->Html->link(
                                $updateProfile,
                                array("controller"=>"packages","action" => "preview", $id),
                                array("class" => "text-success", "escape"=> false,'title'=>__('See Full Package Detail')));
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
