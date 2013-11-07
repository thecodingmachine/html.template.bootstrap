<div class="control-group">
	<?php
	/* @var $object Mouf\Html\Widgets\Form\CheckboxesField */

	$object->getLabel()->addClass('control-label');
	if($object->isRequired()) {
		$object->getLabel()->addText('<span class="text-danger">*</span>');
	}
	$object->getLabel()->toHtml();
    ?>
    <div class="controls">
    	<?php 
		foreach ($object->getCheckboxes() as $checkbox) {
			$checkbox->toHtml();
		}
		if($object->getHelpText()) {
			?>
			<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
			<?php
		}
		?>
	</div>
</div>
		