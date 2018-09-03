<?php

			$UniqId=$data['UniqId']; 
			$id=1;
			$model=new \B\Users\Model();
			$build=new \MS\Core\Helper\Builder ('B\Users');
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$nullCheck=$model->where('UniqId',$UniqId)->get();

			//dd($model->where('UniqId',$UniqId)->get()->first());
			
			if($nullCheck =! null ){
				$data=$model->where('UniqId',$UniqId)->get()->first()->toArray();
			}else{
				$data=[];
			}



			if(array_key_exists('Password',$data))$data['Password']=\MS\Core\Helper\Comman::en($data['Password'], ENCRYPTION_KEY);
			$text="After clicking save it will automatically sign out you from Current Session.";
			$build->title("Edit User")->content($id,$data)->note($text)->action("editUserPost");

			$build->btn([
									'action'=>"\B\Users\Controller@view_all_users",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								]);

			$build->btn([
									//'action'=>"\\B\\MAS\\Controller@editCompany",
									'color'=>"btn-success",
									'icon'=>"fa fa-floppy-o",
									'text'=>"Save"
								]);


		//	$build->content="<div class='ms-mod-tab'>".$build->content."</div>";

		//	dd($build->view()->render());
			echo $build->view();


?>

