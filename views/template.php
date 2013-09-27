<!DOCTYPE html><?php /* @var $this Mouf\Html\Template\BootstrapTemplate */?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php 
		if ($this->enableResponsiveDesign) {
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php
		}
		 
		/* @var $this \Mouf\Html\Template\MoufTemplate\MoufTemplate */
		if ($this->favIconUrl) { ?>
		<link rel="icon" type="image/png" href="<?php echo ROOT_URL.$this->favIconUrl; ?>" />
		<?php } ?>
		<title><?php echo $this->getTitle() ?></title>
		<?php 
		$webLibraryManager = $this->getWebLibraryManager();
		if ($webLibraryManager) {
			$this->getWebLibraryManager()->toHtml();
		}
		?>
	</head>
	<?php
	$contentSize = 12;
	
	$leftHtml = null;
	if ($this->left != null) {
		ob_start();
		$this->left->toHtml();
		$leftHtml = ob_get_clean();
		
		if ($leftHtml) {
			$contentSize -= $this->leftColumnSize;
		}
	}
	$rightHtml = null;	
	if ($this->right != null) {
		ob_start();
		$this->right->toHtml();
		$rightHtml = ob_get_clean();
		
		
		if ($rightHtml) {
			$contentSize -= $this->rightColumnSize;
		}
	}
	
	$footerHtml = null;	
	if ($this->footer != null) {
		ob_start();
		$this->footer->toHtml();
		$footerHtml = ob_get_clean();
	}
	?>
	<body>
		<?php if ($this->logoUrl): ?>
			<div id="header">
				<div id="logo">
					<a href="<?php echo ROOT_URL ?>">
						<img src="<?php echo ROOT_URL.$this->logoUrl ?>" alt="" />
					</a>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->header != null) { ?>
			<?php $this->header->toHtml();?>
		<?php } ?>
		<div class="container">
			<div class="row">
				<?php if ($leftHtml != null) { ?>
					<div id="sidebar-left" class="sidebar col-md-<?php echo $this->leftColumnSize ?>">
						<?php if ($this->wrapLeftSideBarInWell) { echo '<div class="well">'; } ?>
						<?php echo $leftHtml;?>
						<?php if ($this->wrapLeftSideBarInWell) { echo '</div>'; } ?>
					</div>
				<?php } ?>
				<div id="content" class="col-md-<?php echo $contentSize; ?>">
					<?php 
					if ($this->content != null) {
						$this->content->toHtml();
					}
					?>
				</div>
				<?php if ($rightHtml != null) { ?>
					<div id="sidebar-right" class="sidebar col-md-<?php echo $this->rightColumnSize ?>">
						<?php if ($this->wrapRightSideBarInWell) { echo '<div class="well">'; } ?>
						<?php echo $rightHtml;?>
						<?php if ($this->wrapRightSideBarInWell) { echo '</div>'; } ?>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<?php if ($footerHtml != null) { ?>
					<div id="footer" class="col-md-<?php echo $contentSize ?>">
						<?php echo $footerHtml;?>
					</div>
				<?php } ?>
			</div>
		</div>
	</body>
</html>