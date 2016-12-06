
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'birthCountry.CountryName',
		'currentCountry.CountryName',
		'currentCity.CityName',
		'originalCountry.CountryName',
		'originalCity.CityName',
	),
)); ?>


                
            