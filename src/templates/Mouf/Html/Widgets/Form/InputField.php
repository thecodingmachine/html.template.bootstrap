<div class="control-group">
    <?php
        /* @var $object Mouf\Html\Widgets\Form\InputField */
            $object->getLabel()->addClass('control-label');
    if ($object->isRequired()) {
        $object->getLabel()->addText('<span class="text-danger">*</span>');
    }
        $object->getLabel()->toHtml();
    ?>
    <div class="controls">
        <?php
            $object->getInput()->addClass('form-control');
            $object->getInput()->toHtml();
        if ($object->getHelpText()) {
            ?>
                <span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
                <?php
        }
        ?>
    </div>
</div>
    
    
