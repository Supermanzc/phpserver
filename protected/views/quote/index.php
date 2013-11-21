<h2>每日一句</h2>
<div id="quote-of-the-day">
	<?php $this->renderPartial('_quote', array(
		'quote' => $quote,
	))?>
</div>
<?php echo CHtml::ajaxLink('下一个', array('getQuote'),
	array('update' => '#quote-of-the-day'))?>