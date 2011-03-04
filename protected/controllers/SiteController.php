<?php

class SiteController extends Controller
{

	public function actionIndex(){
		
		$model=new Lectures('search');
		
		if(isset($_GET['Lectures'])){
		
			$model->attributes=$_GET['Lectures'];
		
		}
		
		$this->vars['model'] = $model;
		
		$this->render('index');

	}

	public function actionCrawl(){
		
		$nextrun = Yii::app()->params['nextrun'];
		
		if(time() < $nextrun){
			$this->vars['message'] = 'Crawl complete';
			return $this->render('crawl');
		}
		
		$count = Yii::app()->params['count'];
		
		$lectopia = New lectopiaCheck();
		
		for($i = $count; $i < $count + 2; $i++){
			
			if(Lectures::byLecID($i) == Null){
			
				$lecture = New Lectures;
				$new = True;
				
			}else{	
				
				$lecture = Lectures::byLecID($i);
				$new = False;
				
			}
			
			$lectopia->checkURL($i);
			
			$lecture->lecture_id = $i;
			
			$class = $lectopia->extractdata();
			
			$lecture->code = $class->code;
			
			$lecture->description = $class->description;
			
			$lecture->count = $class->count;
			

			
			if($lecture->code != Null){
				$lecture->save();
			}else if($new == False){
				$lecture->delete();
			}
		
		}
		
		if($count > 1000){
			Settings::saveSetting('count', 0);
			Settings::saveSetting('nextrun', time() + (7 * 24 * 60 * 60));
		}else{
			Settings::saveSetting('count', $count + 2);
			Settings::saveSetting('nextrun', time());
		}
		
		$this->vars['message'] = 'Complete';
		return $this->render('crawl');
		
	}

}