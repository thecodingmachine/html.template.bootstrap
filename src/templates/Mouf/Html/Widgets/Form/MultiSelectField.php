<?php
use Mouf\Html\HtmlElement\HtmlString;
use Mouf\Html\Tags\Select;
/* @var $object Mouf\Html\Widgets\Form\MultiSelectField */
?>
<div class="form-group <?php echo $object->getName() ?>">
    <?php
	    /* @var $object Mouf\Html\Widgets\Form\TextField */
	    $object->getLabel()->addClass('col-lg-4');
	    $object->getLabel()->addClass('control-label');
	    if($object->isRequired()) {
	    	$object->getLabel()->addText('<span class="text-danger">*</span>');
	    }
	    $object->getLabel()->toHtml();
    ?>
    <div class="col-lg-8">
    	<?php
    		$first = true;
	    	foreach ($object->getSelects() as $select){
	    		/* @var $select Select */
	    		$select->addClass('form-control');
	    		$select->toHtml();
	    		$showRemove = true;
	    		if ($first){
	    			$first = false;
	    			if ($object->isRequired()){
	    				$showRemove = false;
	    			}
	    		}
	    		if ($showRemove){
		    		$removeElem = $object->getRemoveElement();
		    		$removeElem->addDataAttribute('target', $select->getDataAttributes()['id']);
		    		$removeElem->addClass("mouf-remove-dd-item")->addClass('glyphicon glyphicon-remove');
		    		$removeElem->toHtml();
	    		}
	    	}
    	
    		if($object->getHelpText()) {
				?>
				<span class="help-block"><?php $object->getHelpText()->toHtml() ?></span>
				<?php 
			}
			
			?>
			<pre style="display: none" id="<?php echo $object->getSelectTemplate()->getDataAttributes()['id']?>">
			<?php
			$object->getSelectTemplate()->addClass('form-control');
			$object->getSelectTemplate()->toHtml();
			$removeElem = $object->getRemoveElement();
			$removeElem->addDataAttribute('target', $object->getSelectTemplate()->getDataAttributes()['id']);
			$removeElem->addClass("mouf-remove-dd-item")->addClass('glyphicon glyphicon-remove');
			$removeElem->toHtml();
			?>
			</pre>
			<?php 
			$addElem = $object->getAddElement();
			$addElem->addDataAttribute('target', $object->getSelectTemplate()->getDataAttributes()['id']);
			$addElem->addDataAttribute('next', count($object->getSelects()));
			$addElem->addClass('mouf-add-dd-item')->addClass('glyphicon glyphicon-plus');
			$addElem->toHtml();
			?>
	</div>
	<script type="text/javascript">
	<!--
	$(document).on('click', '.mouf-remove-dd-item', function(){
		var target = $('select[data-id='+$(this).attr('data-target')+']');
		target.remove();
		$(this).remove();
	});
	$('.mouf-add-dd-item').click(function(){
		var index = parseInt($(this).data('next'));
		var selector = $(this).attr('data-target');
		var template = $('#'+selector);
		var html = template.html();
		html = html.replace(new RegExp('mouftemplate', 'g'), index);
		html = html.replace("data-name", "name");
		template.before(html);
		$(this).data('next', index + 1 );
		$(this).attr('data-next', index + 1 );
	});
	//-->
	</script>
</div>

    
    
