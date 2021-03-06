<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Content $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="content-form">
    <?php
    	$disabled= $model->isNewRecord? null:'disabled';
    	
    	$form = ActiveForm::begin([
			'id'=>'Content',
			'fieldConfig' => [
				'options' => ['tag' => 'tr','class' => 'form-group'],
				'template' => '<td class="hAlign_right padding_r10" >{label}:</td><td>{input}</td><td>{hint}</td><td width="150px">{error}</td>',
	    	],
	    ]); ?>
	 
	<table class="table">

	 <?php echo $this->render('//content/_include/_base', [
			'model' => $model,
			'chnid'=>$chnid,
			'currentChannel' => $currentChannel,
			'fields' => $fields,
	    	'form' => $form,
			
		]); ?>
		
	<?php foreach ($fields as $field ):?>
	<tr class="form-group field-content-<?= $field['name_en'] ?>">
		<td class="hAlign_right padding_r10" width="150px">
			<label class="control-label" for="content-<?= $field['name_en'] ?>"><?= $field['name'] ?></label>:</td>
		<td>
			<?php
				$formType = empty($field['back_form_type'])?'default':$field['back_form_type'];
				echo '('.$formType.')';
			 	echo $this->render('//content/_include/_forms/_'.$formType, ['model'=>$model, 'value'=>$model->$field['name_en'], 'field' => $field,]); 
			 ?>
		</td>
		<td></td>
		<td><div class="help-block"></div></td>
	</tr>
	<?php endforeach;?>
	
	</table>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
