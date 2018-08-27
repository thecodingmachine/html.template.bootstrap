<?php
require_once __DIR__."/../../../autoload.php";

use Mouf\Actions\InstallUtils;
use Mouf\MoufManager;
use Mouf\Html\Renderer\ChainableRendererInterface;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();

$contentBlock = InstallUtils::getOrCreateInstance("block.content", "Mouf\\Html\\HtmlElement\\HtmlBlock", $moufManager);
$leftBlock = InstallUtils::getOrCreateInstance("block.left", "Mouf\\Html\\HtmlElement\\HtmlBlock", $moufManager);
$rightBlock = InstallUtils::getOrCreateInstance("block.right", "Mouf\\Html\\HtmlElement\\HtmlBlock", $moufManager);
$headerBlock = InstallUtils::getOrCreateInstance("block.header", "Mouf\\Html\\HtmlElement\\HtmlBlock", $moufManager);
$footerBlock = InstallUtils::getOrCreateInstance("block.footer", "Mouf\\Html\\HtmlElement\\HtmlBlock", $moufManager);

$template = InstallUtils::getOrCreateInstance("bootstrapTemplate", "Mouf\\Html\\Template\\BootstrapTemplate", $moufManager);

$contentProperty = $template->getProperty("content");
if ($contentProperty->getValue() == null) {
    $contentProperty->setValue($contentBlock);
}

$leftProperty = $template->getProperty("left");
if ($leftProperty->getValue() == null) {
    $leftProperty->setValue($leftBlock);
}

$rightProperty = $template->getProperty("right");
if ($rightProperty->getValue() == null) {
    $rightProperty->setValue($rightBlock);
}

$headerProperty = $template->getProperty("header");
if ($headerProperty->getValue() == null) {
    $headerProperty->setValue($headerBlock);
}

$footerProperty = $template->getProperty("footer");
if ($footerProperty->getValue() == null) {
    $footerProperty->setValue($footerBlock);
}

$webLibraryManager = $moufManager->getInstanceDescriptor('defaultWebLibraryManager');
if ($webLibraryManager && $template->getProperty('webLibraryManager')->getValue() == null) {
    $template->getProperty('webLibraryManager')->setValue($webLibraryManager);
}

$bootstrapRenderer = InstallUtils::getOrCreateInstance("bootstrapRenderer", "Mouf\\Html\\Renderer\\FileBasedRenderer", $moufManager);
$bootstrapRenderer->getProperty("directory")->setValue("vendor/mouf/html.template.bootstrap/src/templates");
$bootstrapRenderer->getProperty("cacheService")->setValue($moufManager->getInstanceDescriptor("rendererCacheService"));
$bootstrapRenderer->getProperty("type")->setValue(ChainableRendererInterface::TYPE_TEMPLATE);
$bootstrapRenderer->getProperty("priority")->setValue(0);
$template->getProperty("templateRenderer")->setValue($bootstrapRenderer);
$template->getProperty("defaultRenderer")->setValue($moufManager->getInstanceDescriptor("defaultRenderer"));

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();
