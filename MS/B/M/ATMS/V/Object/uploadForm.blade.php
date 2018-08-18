<?php 





			$id=1;
		$build=new \MS\Core\Helper\Builder ('/B/ATMS');

		$build->title("Add Agency")->heading(['Basic Details of Agency'])->content($id)->action("agencyAdd")->btn([
								'action'=>"\\B\\AMS\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->heading(['Conern Person Details'])->extraFrom('2')->heading(['Login Details For Agency'])->extraFrom('3')->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							]);


		return $build->view();



?>