<?php
$this->pageTitle = 'Lectopia Catalogue';

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$this->vars['model']->search(),
	'filter'=>$this->vars['model'],
	'columns'=>array(
		array(
			'name'=>'code',
			'value'=>'$data->code',
			'htmlOptions'=>array('width' => 50)
		),
		array(
			'name'=>'description',
			'value'=>'$data->description'
		),
		array(
			'name'=>'count',
			'value'=>'$data->count',
			'filter' => False,
			'htmlOptions'=>array('width' => 20, 'style'=>'text-align: center;')
		),
		array(
			'name'=>'lecture_id',
			'type'=>'raw',
			'filter' => False,
			'value'=>'\'<a href="http://lectopia.recordings.uq.edu.au/lectopia/lectopia.lasso?ut=\'.$data->lecture_id.\'" target="_blank">View</a>\'',
			'htmlOptions'=>array('width' => 50, 'style'=>'text-align: center;')
		)
	)
));