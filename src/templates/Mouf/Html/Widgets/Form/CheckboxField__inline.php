<?php 
/* @var $object Mouf\Html\Widgets\Form\CheckBoxField */
$input = $object->getInput();
$label = $object->getLabel();
$label->addChild($input);
$label->addClass("checkbox-inline");
$label->toHtml();
?>
<!-- 
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
</label>
 -->