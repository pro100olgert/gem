<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'formula') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'traits_color') ?>

    <?php // echo $form->field($model, 'transparency') ?>

    <?php // echo $form->field($model, 'hardness') ?>

    <?php // echo $form->field($model, 'shine') ?>

    <?php // echo $form->field($model, 'cleavage') ?>

    <?php // echo $form->field($model, 'cleavage_way') ?>

    <?php // echo $form->field($model, 'structure_type') ?>

    <?php // echo $form->field($model, 'separate_state') ?>

    <?php // echo $form->field($model, 'bend') ?>

    <?php // echo $form->field($model, 'shape') ?>

    <?php // echo $form->field($model, 'satellites') ?>

    <?php // echo $form->field($model, 'formation') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'image_name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
