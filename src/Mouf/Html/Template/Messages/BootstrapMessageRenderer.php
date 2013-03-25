<?php
/*
 * Copyright (c) 2013 Marc Teyssier
*
* See the file LICENSE.txt for copying permission.
*/
namespace Mouf\Html\Template\Messages;

use Mouf\Html\Widgets\MessageService\Widget\MessageRendererInterface;

use Mouf\Html\Widgets\MessageService\Service\UserMessageInterface;

/**
 * Default message renderer (render each message as a div)
 * @author Marc Teyssier
 *
 */
class BootstrapMessageRenderer implements MessageRendererInterface {
	/**
	 * (non-PHPdoc)
	 * @see \Mouf\Html\Widgets\MessageService\Widget\MessageRendererInterface::render()
	 */
	function render(UserMessageInterface $message, $nbRepeat) {

		$html = $message->getMessage();
		$type = $message->getType();
		
		echo "<div class='alert alert-".$type."'>";
		echo $html;
		if ($nbRepeat > 1) {
			// TODO: translate this.
			echo " (message repeated ".$nbRepeat." times)";
		}
		echo "</div>";
	}
}