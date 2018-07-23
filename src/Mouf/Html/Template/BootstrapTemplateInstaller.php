<?php
/*
 * Copyright (c) 2013-2014 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\Template;

use Mouf\Html\Utils\WebLibraryManager\Components\ComponentsIntegrationService;
use Mouf\Installer\PackageInstallerInterface;
use Mouf\MoufManager;
use Mouf\Actions\InstallUtils;
use Mouf\Html\Renderer\ChainableRendererInterface;

/**
 * An installer class for the Bootstrap template.
 */
class BootstrapTemplateInstaller implements PackageInstallerInterface
{

    /**
     * (non-PHPdoc)
     * @see \Mouf\Installer\PackageInstallerInterface::install()
     */
    public static function install(MoufManager $moufManager)
    {
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


        // Now, let's modify the component.bootstrap component because it does not feature the CSS files:
        $jqueryWebLibrary = InstallUtils::getOrCreateInstance("component.jquery", "Mouf\\Html\\Utils\\WebLibraryManager\\WebLibrary", $moufManager);
        $jqueryWebLibrary->getProperty("jsFiles")->setValue(array("https://code.jquery.com/jquery-3.3.1.slim.min.js"));

        $popperWebLibrary = InstallUtils::getOrCreateInstance("component.popper", "Mouf\\Html\\Utils\\WebLibraryManager\\WebLibrary", $moufManager);
        $popperWebLibrary->getProperty("jsFiles")->setValue(array("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"));

        $bootstrapWebLibrary = InstallUtils::getOrCreateInstance("component.bootstrap", "Mouf\\Html\\Utils\\WebLibraryManager\\WebLibrary", $moufManager);
        $bootstrapWebLibrary->getProperty("cssFiles")->setValue(array("https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"));
        $bootstrapWebLibrary->getProperty("jsFiles")->setValue(array("https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"));

        $webLibraryManagers = $webLibraryManager->getProperty('webLibraries')->getValue();
        $webLibraryManagers[] = $jqueryWebLibrary;
        $webLibraryManagers[] = $popperWebLibrary;
        $webLibraryManagers[] = $bootstrapWebLibrary;
        $webLibraryManager->getProperty('webLibraries')->setValue($webLibraryManagers);

        // Let's rewrite the MoufComponents.php file to save the component
        $moufManager->rewriteMouf();
    }
}
