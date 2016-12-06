
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FatherIsAlive',
		'relationDID.FatherName',
		'MotherIsAlive',
                'relationDID.MotherFullName',
                'relationDID.ParentPhone',
                'relationDID.ParentPhone2',
                'familyRelation.RelationName',
		//'relationDID.documentType.DocumentTypeID',
                array(
                        'name'=>'DocumentTypeID',
                        'value'=> $model->relationDID->documentType ? $model->relationDID->documentType->TypeName : "-"
                ),
                'relationDID.DocumentID',
                'relationDID.RelativeName',
                'relationDID.RelativePhone',
	),
)); ?>


                
            