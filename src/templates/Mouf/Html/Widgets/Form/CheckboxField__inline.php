<?php 
/* @var $object Mouf\Html\Widgets\Form\CheckBoxField */
$input = $object->getInput();
$label = $object->getLabel();
$text = $label->getChildren();
$text = $text[0];
$label->setChildren([$input]);
$label->addChild($text);
$label->addClass("checkbox-inline");
$label->toHtml();