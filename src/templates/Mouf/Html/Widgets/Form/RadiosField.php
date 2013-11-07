<div class="control-group">
	<?php
	/* @var $object Mouf\Html\Widgets\Form\RadiosField */

	$object->getLabel()->addClass('control-label');
	if($required) {
		$object->getLabel()->addText('<span class="text-danger">*</span>');
	}
	$object->getLabel()->toHtml();
    ?>
    <div class="controls">
    	<?php 
		foreach ($object->getRadios() as $radio) {
			$radio->toHtml();
		}
		if($object->getHelpText()) {
			?>
			<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
			<?php
		}
		?>
	</div>
</div>
