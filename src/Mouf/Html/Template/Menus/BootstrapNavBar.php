<?php
/*
 * Copyright (c) 2012 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Html\Template\Menus;

use Mouf\Html\HtmlElement\HtmlElementInterface;
use Mouf\Html\Renderer\Renderable;

/**
 * This class is in charge of rendering a Bootstrap navbar.
 * <p>The navbar can contain most of the time a menu renderer, eventually a search form, etc...</p>
 * <p>The rendering is performed according to Twitter Bootstrap markup.</p>
 *
 * @Component
 */
class BootstrapNavBar implements HtmlElementInterface
{

    use Renderable;

    /**
     * The elements of the navbar
     *
     * @var array<HtmlElementInterface>
     */
    public $children = array();

    /**
     * The navbar title
     *
     * @Property
     * @var string
     */
    public $title;

    /**
     * The link the navbar title points to, relative to the ROOT_URL.
     * Defaults to "".
     *
     * @Property
     * @var string
     */
    public $titleLink = "";

    /**
     * If checked, the navbar will be rendered in dark shades instead of bright shades. This is a shorthand for setting either :
     *  - navbar-dark bg-dark (TRUE)
     *  - navbar-light bg-light (FALSE)
     *
     * @var boolean
     */
    public $inverted;

    /**
     * The mode of the Nav Bar : can be one of 'dark' or 'light'. This mainly will apply nav-bar-$mode class for inner items color.
     * @Property
     * @var string
     */
    private $mode;

    /**
     * The background of the Nav Bar : can be one of 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'white', 'transparent'.
     * @Property
     * @var string
     */
    private $background;

    /**
     * Display the menu with the maximum width<br />
     * If the parameter fixed is set, this is not used
     *
     * @var boolean
     */
    public $allWidth;

    /**
     * Fixed the navigation bar to the <b>top</b> or <b>bottom</b>. Please insert top or bottom.<br />
     * <strong class="text-error">Caution :</strong><br />
     * For <b>top</b> you must be add "body { padding-top: 70px; }" in your css<br />
     * For <b>bottom</b> you must be add "body { padding-bottom: 70px; }" in your css
     *
     * @var string
     */
    public $fixed;

    /**
     * Initialize the object, optionnally with the array of menu items to be displayed.
     *
     * @Important
     * @param array<HtmlElementInterface> $children
     */
    public function __construct($children = array())
    {
        $this->children = $children;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode ?? ($this->inverted ? 'dark' : 'light');
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getBackground(): string
    {
        return $this->background ?? ($this->inverted ? 'dark' : 'light');
    }

    /**
     * @param string $background
     */
    public function setBackground(string $background): void
    {
        $this->background = $background;
    }


}
