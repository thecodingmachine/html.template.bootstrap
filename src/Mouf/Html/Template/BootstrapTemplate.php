<?php
/*
 * Copyright (c) 2012 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Html\Template;

use Mouf\Html\Renderer\Renderable;
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
    //use Renderable;
    use Renderable {
        Renderable::toHtml as toHtmlRenderer;
    }

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
     * The css class applied to the container div.
     * @var string
     */
    protected $containerClass = "container";

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
        //$this->favIconUrl = self::TEMPLATE_ROOT_URL."images/favicon.png";
        //$this->logoUrl = self::TEMPLATE_ROOT_URL."images/logo.png";
    }

    /**
     * Draws the template.
     */
    public function toHtml()
    {
        // Let's register the template renderer in the default renderer.
        $this->getDefaultRenderer()->setTemplateRenderer($this->getTemplateRenderer());

        header('Content-Type: text/html; charset=utf-8');
        //Renderable::toHtml();// __DIR__."/../../../../views/template.php";
        $this->toHtmlRenderer();
    }

    /**
     * The left menu of the template.
     *
     * @Property
     * @param HtmlElementInterface $left
     */
    public function setLeft(HtmlElementInterface $left)
    {
        $this->left = $left;
    }

    /**
     * The right menu of the template.
     *
     * @Property
     * @param HtmlElementInterface $right
     */
    public function setRight(HtmlElementInterface $right)
    {
        $this->right = $right;
    }

    /**
     * The header of the template.
     *
     * @Property
     * @param HtmlElementInterface $header
     */
    public function setHeader(HtmlElementInterface $header)
    {
        $this->header = $header;
    }

    /**
     * The footer of the template.
     *
     * @Property
     * @param HtmlElementInterface $footer
     */
    public function setFooter(HtmlElementInterface $footer)
    {
        $this->footer = $footer;
    }

    /**
     * The content of the template.
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * The left menu of the template.
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * The right menu of the template.
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * The header of the template.
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * The footer of the template.
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * The number of blocks of the left column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the left column, the size of the column is 0.
     *
     * @Property
     * @param int $leftColumnSize
     */
    public function setLeftColumnSize($leftColumnSize)
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
    public function setRightColumnSize($rightColumnSize)
    {
        $this->rightColumnSize = $rightColumnSize;
    }

    /**
     * The number of blocks of the left column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the left column, the size of the column is 0.
     *
     */
    public function getLeftColumnSize()
    {
        return $this->leftColumnSize;
    }

    /**
     * The number of blocks of the right column.
     * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
     * If you are not using the right column, the size of the column is 0.
     *
     */
    public function getRightColumnSize()
    {
        return $this->rightColumnSize;
    }

    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     * @param bool $wrapLeftSideBarInWell
     */
    public function setWrapLeftSideBarInWell($wrapLeftSideBarInWell)
    {
        $this->wrapLeftSideBarInWell = $wrapLeftSideBarInWell;
    }

    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     * @param bool $wrapRightSideBarInWell
     */
    public function setWrapRightSideBarInWell($wrapRightSideBarInWell)
    {
        $this->wrapRightSideBarInWell = $wrapRightSideBarInWell;
    }

    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     *
     */
    public function getWrapLeftSideBarInWell()
    {
        return $this->wrapLeftSideBarInWell;
    }

    /**
     * Whether we should or not put the left sidebar in a Bootstrap "well" element.
     */
    public function getWrapRightSideBarInWell()
    {
        return $this->wrapRightSideBarInWell;
    }

    /**
     * The css class applied to the container div.
     * @param string $containerClass
     */
    public function setContainerClass($containerClass)
    {
        $this->containerClass = $containerClass;
    }
}
