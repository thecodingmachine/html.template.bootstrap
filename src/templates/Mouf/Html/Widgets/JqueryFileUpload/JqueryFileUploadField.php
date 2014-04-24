<div class="control-group">
<?php
	use Mouf\Html\Widgets\JqueryFileUpload\JqueryFileUploadField;
	/* @var $object JqueryFileUploadField */
	
	$object->getLabel()->addClass('control-label');
	if($object->isRequired()) {
		$object->getLabel()->addText('<span class="text-danger">*</span>');
	}
	$object->getLabel()->toHtml();
	?>
	    <div class="controls">
	    	<?php 
			$object->getJqueryFileUploadWidget()->toHtml();
			if($object->getHelpText()) {
				?>
				<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
				<?php
			}
			?>
		</div>
	</div>
			