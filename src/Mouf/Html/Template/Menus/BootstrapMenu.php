<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Html\Template\Menus;

use \Mouf\Html\HtmlElement\HtmlElementInterface;
use \Mouf\Html\Widgets\Menu\MenuItemInterface;
use Mouf\Html\Widgets\Menu\Menu;

/**
 * This class is in charge of rendering a menu. It contains a menu and can transform it in HTML using the toHtml() method.
 * <p>The rendering is performed according to Twitter Bootstrap markup.</p>
 * 
 */
class BootstrapMenu extends Menu {
	
	/**
	 * If checked, the navbar will be pushed on the right side.
	 *
	 * @var boolean
	 */
	public $pullRight;
	
	/**
	 * Check this to render in a navbar
	 *
	 * @var boolean
	 */
	public $navbar;
	
	/**
	 * If checked, the navbar will be rendered as tabs
	 *
	 * @var boolean
	 */
	public $tabs;
	
	/**
	 * If checked, the nav items will be justified
	 *
	 * @var boolean
	 */
	public $justified;
	
	
	/**
	 * If checked, the navbar will be rendered as pills
	 *
	 * @var boolean
	 */
	public $pills;
	
	/**
	 * If checked, the navbar will be rendered vertically
	 *
	 * @var boolean
	 */
	public $stacked;
	
	
// 	private function renderHtmlMenuItem(MenuItemInterface $menuItem, $level = 0) {
// 		if (!$menuItem->isHidden()) {
			
// 			$menuItemStyleIcon = $menuItem->getAdditionalStyleByType('Mouf\\Html\\Widgets\\Menu\\MenuItemStyleIcon');
// 			if($menuItemStyleIcon) {
// 				$img = '<img src="'.$menuItemStyleIcon->getUrl().'" /> ';
// 			} else {
// 				$img = '';
// 			}
			
			
// 			$children = $menuItem->getChildren();
// 			echo '<li class="';
// 			$menuCssClass = $menuItem->getCssClass();
// 			echo $menuCssClass;
// 			if ($menuItem->isActive()) {
// 				echo ' active';
// 			}

// 			if ($children) {
// 				if ($level == 0) {
// 					echo ' dropdown';
// 				} else {
// 					echo ' dropdown-submenu';
// 				}
// 			}
// 			echo '">';
			
			
			
			
			
// 			// Note: restriction from bootstrap: a menu cannot be clickable and have children at the same time
// 			if ($children) {
// 				if ($level == 0) {
// 					echo '<a class="dropdown-toggle"
// 					data-toggle="dropdown"
// 					href="#">
// 					'.$img.$menuItem->getLabel().'
// 					<b class="caret"></b>
// 					</a>';
// 				} else {
// 					echo '<a href="#">
// 					'.$img.$menuItem->getLabel().'
// 					</a>';
// 				}
// 				echo '<ul class="dropdown-menu">';
// 				foreach ($children as $child) {
// 					/* @var $child MenuItemInterface */
// 					$this->renderHtmlMenuItem($child, $level+1);
// 				}
// 				echo '</ul>';
// 			} else {
// 				$url = $menuItem->getLink();
// 				if ($url !== null) {
// 					echo '<a href="'.htmlentities($url, ENT_QUOTES).'" >';
// 				}
// 				echo $img.$menuItem->getLabel();
// 				if ($url !== null) {
// 					echo '</a>';
// 				}
// 			}
			
// 			echo '</li>';
// 		}
// 	}

}
?>