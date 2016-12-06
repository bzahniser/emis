<?php
/* @var $this CycleController */
/* @var $model Cycle */

$this->breadcrumbs=array(
	'Cycles'=>array('admin'),
	$model->CycleID,
);

$this->menu=array(
		array('label'=>'Cycles', 'url'=>array('cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('cycleexam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('cycleexam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('cyclesubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('cyclesubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('Cycleenrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('Cycleenrolment/create')),
);
?>

<h1> Cycle #<?php echo $model->CycleName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'CycleID',
		'CycleName',
		'CycleDescription',
                'program.ProgramName',
		'course.CourseName',
		'level.LevelName',
		'country.CountryName',
		'city.CityName',
		'center.CenterName',
		'Room',
		'StartDate',
		'EndDate',
		'age.RangeName',
		'AgeFlexability',
		'NumberOfStudent',
		'NumberOfHours',
		'facilitator.FacilitatorFullName',
                'coordinator.CoordinatorFullName',
		'Certification',
		'Transportation',
                'CycleEnd',
                'CycleEndDate',
                'CycleEndTS',
                'CycleEndBy',
            'AttendancePerSubject',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
