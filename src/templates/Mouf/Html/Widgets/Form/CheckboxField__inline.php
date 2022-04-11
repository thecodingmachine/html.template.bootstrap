<?php
/* @var $object Mouf\Html\Widgets\Form\CheckBoxField */
$input = $object->getInput();
$label = $object->getLabel();
$text = $label->getChildren();
if (count($text) > 0) {
    $text = $text[0];
}
$label->setChildren([$input]);
if ($text !== null) {
    $label->addChild($text);
}
$label->addClass("checkbox-inline");
$label->toHtml();
