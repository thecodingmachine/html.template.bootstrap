<?php
/*
 * Copyright (c) 2012 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Html\Template;

use Mouf\Html\Template\BaseTemplate\BaseTemplate;
use Mouf\Html\HtmlElement\HtmlElementInterface;

/**
 * Template class for Mouf.
 * This class relies on /views/mouf.php for the design
 *
 * @Component
 */
class BootstrapTemplate extends BaseTemplate
{

    const TEMPLATE_ROOT_URL = "vendor/mouf/html.template.bootstrap/";

    
    /**
     * The left menu of the template.
     *
     * @var HtmlElementInterface
     */
    protected $left;
    
    /**
     * The right menu of the template.
     *
     * @var HtmlElementInterface
     */
    protected $right;
    
    /**
     * The header of the template.
     *
     * @var HtmlElementInterface
     */
    protected $header;
    
    /**
     * The footer of the template.
     *
     * @var HtmlElementInterface
     */
    protected $footer;
    
    /**
     * The number of blocks of the left column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the left column, the size of the column is 0.
     *
     * @var int
     */
    protected $leftColumnSize = 2;
    
    /**
     * The number of blocks of the right column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the right column, the size of the column is 0.
     *
     * @var int
     */
    protected $rightColumnSize = 2;
    
    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     * @var bool
     */
    protected $wrapLeftSideBarInWell = false;
    
    /**
     * Whether we should or not put the right sidebar in a Bootstrap "well" element.
     *
     * @var bool
     */
    protected $wrapRightSideBarInWell = false;
    
    /**
     * The URL of the favicon, relative to the ROOT_URL.
     * If empty, no favicon is passed.
     *
     * @Property
     * @var string
     */
    public $favIconUrl;
    
    /**
     * The URL of the favicon, relative to the ROOT_URL.
     * If empty, no favicon is passed.
     *
     * @Property
     * @var string
     */
    public $logoUrl;
    
    /**
     * Whether Bootstrap responsive design should be enabled or disabled.
     *
     * @Property
     * @var boolean
     */
    public $enableResponsiveDesign;
    
    /**
     * Whether Bootstrap fluid layout should be enabled or disabled.
     *
     * @Property
     * @var boolean
     */
    public $enableFluidLayout = false;
    
    /**
     * Draws the template.
     */
    public function toHtml()
    {
        // Let's register the template renderer in the default renderer.
        $this->getDefaultRenderer()->setTemplateRendererInstanceName($this->getTemplateRendererInstanceName());
        
        header('Content-Type: text/html; charset=utf-8');
        include __DIR__."/../../../../views/template.php";
    }
    
    /**
     * The left menu of the template.
     *
     * @Property
     * @param HtmlElementInterface $left
     */
    public function setLeft(HtmlElementInterface $left): void
    {
        $this->left = $left;
    }
    
    /**
     * The right menu of the template.
     *
     * @Property
     * @param HtmlElementInterface $right
     */
    public function setRight(HtmlElementInterface $right): void
    {
        $this->right = $right;
    }
    
    /**
     * The header of the template.
     *
     * @Property
     * @param HtmlElementInterface $header
     */
    public function setHeader(HtmlElementInterface $header): void
    {
        $this->header = $header;
    }
    
    /**
     * The footer of the template.
     *
     * @Property
     * @param HtmlElementInterface $footer
     */
    public function setFooter(HtmlElementInterface $footer): void
    {
        $this->footer = $footer;
    }

    /**
     * The number of blocks of the left column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the left column, the size of the column is 0.
     *
     * @Property
     * @param int $leftColumnSize
     */
    public function setLeftColumnSize(int $leftColumnSize): void
    {
        $this->leftColumnSize = $leftColumnSize;
    }
    
    /**
     * The number of blocks of the right column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the right column, the size of the column is 0.
     *
     * @Property
     * @param int $rightColumnSize
     */
    public function setRightColumnSize(int $rightColumnSize): void
    {
        $this->rightColumnSize = $rightColumnSize;
    }
    
    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     * @param bool $wrapLeftSideBarInWell
     */
    public function setWrapLeftSideBarInWell(bool $wrapLeftSideBarInWell): void
    {
        $this->wrapLeftSideBarInWell = $wrapLeftSideBarInWell;
    }

    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     * @param bool $wrapRightSideBarInWell
     */
    public function setWrapRightSideBarInWell(bool $wrapRightSideBarInWell): void
    {
        $this->wrapRightSideBarInWell = $wrapRightSideBarInWell;
    }
}
