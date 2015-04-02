<div class="col-md-12">
    <?php
    if (!empty($message)) {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
                <span class="sr-only"><?php echo __("Close");?></span></button>
            <?php echo $message; ?>
        </div>
        <?php }?>
    <div class="block">
        <div class="header">
            <h2><?php echo __("Engines Listing");?></h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo __('Engine Name'); ?></th>
                    <th><?php echo __('Username'); ?></th>
                    <th><?php echo __('Engine ID'); ?></th>
                    <th><?php echo __('Engine Domain'); ?></th>
                    <th><?php echo __('Created At'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($engines as $key => $value) {
                    $id = $value["Engine"]["id"];?>
                <tr>
                    <td>
                        <?php echo $value['Engine']['name']?>
                    </td>
                    <td><?php echo $value['User']['first_name'];?></td>
                    <td><?php echo $value['Engine']['engine_id'];?></td>
                    <td><?php echo $value['Engine']['domain_name'];?></td>

                    <td><?php echo $value['Engine']['created'];?></td>
                    <td>
                        <?php
                        $updateProfile = '<i class="fa fa-pencil-square-o bigger-130"></i>';
                        echo $this->Html->link(
                            $updateProfile,
                            array("controller"=>"engines","action" => "update", $id),
                            array("class" => "text-success", "escape"=> false,'title'=>__('Update Profile')));
                        ?>
                        |
                        <?php
                        $removeText = '<i class="fa fa-trash bigger-130"></i>';
                        echo $this->Form->postLink(
                            $removeText,
                            array("controller"=>"engines","action" => "remove", $id),
                            array('confirm' => 'Are you sure to remove it?', "class" => "text-danger", "escape"=> false,
                                "title" => __("Remove Engines"))
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
