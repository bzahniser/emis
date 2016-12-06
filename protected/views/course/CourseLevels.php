<div id="mtreeview" style="width: 250px;border: 1px solid GRAY;float:left">
<?php
	$this->widget('application.extensions.MTreeView.MTreeView',array(
		'collapsed' => true,
		'animated' => 'fast',
		'htmlOptions' => array(
			'class' => 'treeview-famfamfam', //there are some classes that ready to use
		),
		'table' => 'V_CourseTreeLevel', //what table the menu would come from
		'hierModel' => 'adjacency', //hierarchy model of the table
		'conditions' => array('Course=:visible', array(':visible' => $CourseID)), //other conditions if any. 
		//declaration of fields
		'fields' => array(
			'text' => 'title',
			'alt' => false,
			'icon' => false,
			'tooltip' => false,
			'task' => false,
			'url' => array('/Course/WidgetView', array('id' => 'Oid'))
		),
		'ajaxOptions'=>array('update'=>'#mtreeview-target1')
	));
?>
</div>
<div id="mtreeview-target1" style="border: 1px solid gray;margin-left: 260px;min-height: 300px">
Click on any link of the tree at the left...
</div>
<p>&nbsp;</p>
<hr>