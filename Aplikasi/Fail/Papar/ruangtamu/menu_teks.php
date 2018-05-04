<?php
$ulangmenu = array('Program','Headcount','Quranic','Kehadiran','Pelajar',
	'Peperiksaan','Lain-lain','Tools');
	
foreach($ulangmenu as $tajukbesar):?>
<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" 
	data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<?php echo $tajukbesar?><span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<li><a href="#">Action</a></li>
		<li><a href="#">Another action</a></li>
		<li><a href="#">Something else here</a></li>
		<li role="separator" class="divider"></li>
		<li><a href="#">Separated link</a></li>
	</ul>
</div>
<?php
endforeach;
