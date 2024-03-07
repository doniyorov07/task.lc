<?php

use common\models\ModelToData;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        ModelToData::getAuthItems(),
    ) ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ModelToData::getUsers(),
        'language' => 'uzz',
        'options' => ['placeholder' => 'Professorni tanlang...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
