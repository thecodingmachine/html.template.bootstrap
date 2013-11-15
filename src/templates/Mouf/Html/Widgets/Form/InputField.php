<div class="form-group <?php echo $object->getInput()->getName()?>">
    <?php
	    /* @var $object Mouf\Html\Widgets\Form\InputField */
	    $object->getLabel()->addClass('col-lg-4');
	    $object->getLabel()->addClass('control-label');
	    if($object->isRequired()) {
	    	$object->getLabel()->addText('<span class="text-danger">*</span>');
	    }
	    $object->getLabel()->toHtml();
    ?>
    <div class="col-lg-8">
    	<?php
    		$object->getInput()->addClass('form-control');
    		$object->getInput()->toHtml();
    		if($object->getHelpText()) {
				?>
				<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
				<?php 
			}
    	?>
	</div>
</div>
    
    
