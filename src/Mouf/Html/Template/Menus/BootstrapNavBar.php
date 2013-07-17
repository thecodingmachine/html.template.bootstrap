<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Html\Template\Menus;

use Mouf\Html\Widgets\Menu\MenuInterface;
use \Mouf\Html\HtmlElement\HtmlElementInterface;
use \Mouf\Html\Widgets\Menu\MenuItemInterface;

/**
 * This class is in charge of rendering a Bootstrap navbar.
 * <p>The navbar can contain most of the time a menu renderer, eventually a search form, etc...</p>
 * <p>The rendering is performed according to Twitter Bootstrap markup.</p>
 * 
 * @Component
 */
class BootstrapNavBar implements HtmlElementInterface {
	
	/**
	 * The elements of the navbar
	 *
	 * @Important
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
	 * If checked, the navbar will be rendered in dark shades instead of bright shades.
	 * 
	 * @var boolean
	 */
	public $inverted;
	
	/**
	 * If checked, the navbar will be fixed at the top.
	 *
	 * @var boolean
	 */
	public $fixed;
	
	/**
	 * Initialize the object, optionnally with the array of menu items to be displayed.
	 *
	 * @param array<HtmlElementInterface> $children
	 */
	public function __construct($children = array()) {
		$this->children = $children;
	}
	
	public function toHtml() {
		echo '<div class="navbar'.($this->inverted?' navbar-inverse':'').($this->fixed?' navbar-fixed-top':'').'">';
		echo '<div class="navbar-inner">';
		echo '<div class="container">';
		
		if ($this->title) {
			echo '<a class="brand" href="'.ROOT_URL.$this->titleLink.'">'.$this->title.'</a>';
		}
		
		foreach ($this->children as $child) {
			$child->toHtml();
		}
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}
?>