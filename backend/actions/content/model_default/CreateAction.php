<?php

namespace backend\actions\content\model_default;

use Yii;

use components\LuLu;
use common\models\Channel;
use common\models\content\CommonContent;
use backend\actions\content\ContentAction;


class CreateAction extends ContentAction
{
	public function run($chnid)
	{	
		$currentChannel=Channel::findOne($chnid);
		$this->currentTableName = $currentChannel['table'];
		
		$model = new CommonContent($currentChannel['table']);
		$model->setIsNewRecord(true);
		
		if ($model->load($_POST)) {
				
			$this->saveContent($model,true);
				
			return $this->redirect(['index', 'chnid' => $chnid]);
		} else {
			$locals = $this->initContent($model,$currentChannel);
		
			$tplName = $this->getTpl($chnid, 'create');
			
			return $this->render($tplName, $locals);
		}
	}
	

}
