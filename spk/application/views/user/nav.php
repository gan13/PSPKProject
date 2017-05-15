<?php

$menu=array(
	'Kriteria'=>array(		
		'icon'=>'fa fa-code',
		'slug'=>'data',
		'child'=>array(
				'Tambah Kriteria'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/data/kriteria/add",
					'target'=>"",
				),
				'Data Kriteria'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/data/kriteria",
					'target'=>"",
				),				
			),
	),
	'Alternatif'=>array(		
		'icon'=>'fa fa-code',
		'slug'=>'data',
		'child'=>array(
				'Tambah alternatif'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/data/alternatif/add",
					'target'=>"",
				),
				'Data alternatif'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/data/alternatif",
					'target'=>"",
				),				
			),
	),
	'Master'=>array(		
		'icon'=>'fa fa-money',
		'slug'=>'master',
		'child'=>array(
				'Matriks Kriteria'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/master/kriteria",
					'target'=>"",
					),
				'Matriks Alternatif'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/master/alternatif",
					'target'=>"",
					),			
			),
	),	
);
?>