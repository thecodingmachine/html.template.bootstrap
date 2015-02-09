<?php
use Mouf\Html\Widgets\Form\Styles\LayoutStyle;
use Mouf\Html\Widgets\Form\SelectField;
/* @var $object SelectField */

//Check for styles
$inline = $object->getLayout() != null && $object->getLayout()->getLayoutType() == LayoutStyle::LAYOUT_INLINE;
if ($inline) {
    $ratio = $object->getLayout()->getLayoutRatio();
    $labelRatio = 12 / $ratio;
    $fieldRatio = 12 - $labelRatio;
}
?>
<div class="form-group <?php echo $object->getSelect()->getName() ?>">
    <?php
        /* @var $object Mouf\Html\Widgets\Form\TextField */
        if ($inline) {
            $object->getLabel()->addClass("col-lg-".$labelRatio);
        }
        $object->getLabel()->addClass('control-label');
        if ($required) {
            $object->getLabel()->addText('<span class="text-danger">*</span>');
        }
        $object->getLabel()->toHtml();
    ?>
    <div class="<?php echo $inline ? "col-lg-".$fieldRatio : ""; ?>">
    	<?php
            $object->getSelect()->addClass('form-control');
            $object->getSelect()->toHtml();
            if ($object->getHelpText()) {
                ?>
				<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
				<?php

            }
        ?>
	</div>
</div>
