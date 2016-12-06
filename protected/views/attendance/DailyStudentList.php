

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">        
    <?php {  

        //$Grd=  AttendanceDetails::findAll("SessionDate='".date('Y-m-d')."'");
        $Grd=new AttendanceDetails('Search');
        $Grd->unsetAttributes();
        if (isset($_GET['AttendanceDetails'])) {
            $Grd->attributes = $_GET['AttendanceDetails'];
        }
        $Grd->SessionDate=date('Y-m-d');
        
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $Grd->search(),
            'filter' => $Grd,
            //'summaryText' => '',
            
            'columns'=>array(
                'FullName',
                'ArabicFullName',
                'DocumentID',
                'CourseName',
                'LevelName',
                'TimeFrom',
                'TimeTo'
            )
        ));
        }?>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->                      