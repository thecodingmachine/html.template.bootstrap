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
class BootstrapTemplate extends BaseTemplate  {

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
	public $header;
	
	/**
	 * The footer of the template.
	 * 
	 * @var HtmlElementInterface
	 */
	protected $footer;
	
	/**
	 * The main menu
	 * 
	 * @var Menu
	 */
	protected $menu;
	
	/**
	 * The number of blocks of the left column.
	 * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
	 * If you are not using the left column, the size of the column is 0.
	 * 
	 * @var int
	 */
	protected $leftColumnSize;
	
	/**
	 * The number of blocks of the right column.
	 * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
	 * If you are not using the right column, the size of the column is 0.
	 * 
	 * @var int
	 */
	protected $rightColumnSize;
	
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
	 * Default constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->favIconUrl = self::TEMPLATE_ROOT_URL."images/favicon.png";
		$this->logoUrl = self::TEMPLATE_ROOT_URL."images/logo.png";
	}

	/**
	 * Draws the template.
	 */
	public function toHtml(){
		header('Content-Type: text/html; charset=utf-8');

		include __DIR__."/../../../../views/template.php";
	}
	
	/**
	 * The left menu of the template.
	 *
	 * @Property
	 * @param HtmlElementInterface $left
	 */
	public function setLeft(HtmlElementInterface $left) {
		$this->left = $left;
	}
	
	/**
	 * The right menu of the template.
	 *
	 * @Property
	 * @param HtmlElementInterface $right
	 */
	public function setRight(HtmlElementInterface $right) {
		$this->right = $right;
	}
	
	/**
	 * The header of the template.
	 *
	 * @Property
	 * @param HtmlElementInterface $header
	 */
	public function setHeader(HtmlElementInterface $header) {
		$this->header = $header;
	}
	
	/**
	 * The footer of the template.
	 *
	 * @Property
	 * @param HtmlElementInterface $footer
	 */
	public function setFooter(HtmlElementInterface $footer) {
		$this->footer = $footer;
	}
	
	/**
	 * The menu of the template, or null if your template has no menu
	 * 
	 * @Property
	 * @param Menu $menu
	 */
	public function setMenu($menu) {
		$this->menu = $menu;
	}

	/**
	 * The number of blocks of the left column.
	 * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
	 * If you are not using the left column, the size of the column is 0.
	 *
	 * @Property
	 * @var int
	 */
	public function setLeftColumnSize($leftColumnSize) {
		$this->leftColumnSize = $leftColumnSize;
	}
	
	/**
	 * The number of blocks of the right column.
	 * A bootstrap page is split in 12 blocks so this should be a number between 1 and 11.
	 * If you are not using the right column, the size of the column is 0.
	 *
	 * @Property
	 * @var int
	 */
	public function setRightColumnSize($rightColumnSize) {
		$this->rightColumnSize = $rightColumnSize;
	}
		
}
?>