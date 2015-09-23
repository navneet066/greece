<?php if (!empty($message)) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                class="sr-only">Close</span></button>
        <?php echo $message; ?>
    </div>
<?php } ?>
<div>
    <?php
    $url = array("controller" => "translation_jobs", "action" => "create_by_engine", $id);
    echo $this->Form->create("TranslationJob", array("url" => $url, "class" => "form-horizontal", "type" => "file",
        "role" => "form", 'novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
        <h4><strong>Translation SetUp</strong></h4>
    </div>
    <h4><strong><?php echo __("Engine Detail") ?></strong></h4>

    <div class="">
        <div class="form-group">
            <label class="col-sm-3 control-label"> Name(*)</label>

            <div class="col-sm-6">
                <?php echo $this->Form->input('', array("class" => "form-control",
                    "type" => "text", "placeholder" => $engine['Engine']['name'], "readonly")); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Source Language(*)</label>

            <div class="col-sm-6">
                <?php
                $languageName = $this->requestAction(array("controller" => "translation_jobs",
                    "action" => "getLanguageName", $engine['Engine']['s_language'], "plugin" => null));
                echo $this->Form->input('', array("type" => "text", "class" => "form-control",
                    "placeholder" => $languageName, "readonly"));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Target Language(*)</label>

            <div class="col-sm-6">
                <?php
                $languageName = $this->requestAction(array("controller" => "translation_jobs",
                    "action" => "getLanguageName", $engine['Engine']['t_language'], "plugin" => null));
                echo $this->Form->input('', array("type" => "text", "class" => "form-control",
                    "placeholder" => $languageName, "readonly"));
                ?>
            </div>
        </div>
        <h4><strong><?php echo __("Translation file") ?></strong></h4>

        <div class="form-group">
            <label class="col-sm-3 control-label">Translation File</label>

            <div class="col-sm-6">
                <?php echo $this->Form->input('TranslationJob.translation_file', array("class" => "form-control",
                    "type" => "file"));
                echo "( *.tmx, *.xlf, *.txt )"; ?>
            </div>
        </div>
        <h4><strong>Glossaries</strong></h4>

        <div class="form-group">
            <label class="col-sm-3 control-label">High Priority Glossaries</label>

            <div class="col-sm-6">
                <?php echo $this->Form->input("TranslationJob.high_gloss", array("class" => "form-control", "type" => "file"));
                echo "( *.csv, *.txt )"; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Low Priority Glossaries</label>

            <div class="col-sm-6">
                <?php echo $this->Form->input("TranslationJob.low_gloss", array("class" => "form-control", "type" => "file"));
                echo "( *.csv, *.txt )"; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-9">
                <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#engineInfo"
                        aria-expanded="false" aria-controls="engineInfo">
                    More Info
                </button>
            </div>
        </div>
    </div>
    <div class="collapse" id="engineInfo">
        <div style="border-bottom: groove;margin-bottom: 20px;">
            <strong>Advanced Settings</strong>
        </div>
        <div class="col-sm-offset-3">
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->input("TranslationJob.hybrid", array('type' => "checkbox")); ?>
                    Hybrid
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->input("TranslationJob.engine_high_gloss", array('type' => "checkbox")); ?>
                    Use Engine High Glossary.
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->input("TranslationJob.engine_low_gloss", array('type' => "checkbox")); ?>
                    Use Engine Low Glossary
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"></label>

        <div class="col-md-6">
            <div class="btn-group pull-right" role="group">
                <?php echo $this->Form->button('RESET', array(
                    'class' => ' btn btn-default',
                    'type' => 'reset',
                    'escape' => false)); ?>
                <?php echo $this->Form->button('SUBMIT', array(
                    'class' => 'btn btn-success',
                    'type' => 'submit',
                    'escape' => false)); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
