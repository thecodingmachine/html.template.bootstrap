
<div class="form-group">
    <?php
	    /* @var $object Mouf\Html\Widgets\Form\TextField */
	    $object->getLabel()->addClass('col-lg-4');
	    $object->getLabel()->addClass('control-label');
	    if($required) {
	    	$object->getLabel()->addText('<span class="text-danger">*</span>');
	    }
	    $object->getLabel()->toHtml();
    ?>
    <div class="col-lg-8 radio">
    	<?php
    		$object->getInput()->toHtml();
    		if($object->getHelpText()) {
				?>
				<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
				<?php 
			}
    	?>
	</div>
</div>