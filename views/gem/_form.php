<?php

use app\models\Color;
use app\models\Shine;
use kartik\widgets\TouchSpin;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Gem */
/* @var $form yii\widgets\ActiveForm */

$lang = 'ru';
?>

<div class="gem-form">

    <?php $form = ActiveForm::begin([
        'options'     => [
            'class'   => 'form-horizontal',
            'enctype' => 'multipart/form-data',
        ],
        'fieldConfig' => [
            'template' => "<div class=\"col-md-2\">{label}</div>\n" .
                "<div class=\"col-md-10\">{input}</div>\n" .
                "<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'       => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
        ],
    ]);
    ?>

    <?= $form->field($model, 'formula')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'color')->widget(Select2::classname(), [
        'language'      => $lang,
        'data'          => ArrayHelper::map(Color::find()->asArray()->all(), 'id', 'name'),
        'options'       => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'tags'               => true,
            'tokenSeparators'    => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'         => true,
        ],
        'pluginEvents ' => [
            "select2:select" => "function(param) { log(param); }",
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'traits_color')->widget(Select2::classname(), [
        'language'      => $lang,
        'data'          => ArrayHelper::map(Color::find()->asArray()->all(), 'id', 'name'),
        'options'       => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'tags'               => true,
            'tokenSeparators'    => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'         => true,
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'transparency')->widget(Select2::classname(), [
        'language'      => $lang,
        'data'          => $model->getTransparencyList(),
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'hardness')->textInput() ?>

    <?php
    echo $form->field($model, 'shine')->widget(Select2::classname(), [
        'language'      => $lang,
        'data'          => ArrayHelper::map(Shine::find()->asArray()->all(), 'id', 'name'),
        'options'       => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'tags'               => true,
            'tokenSeparators'    => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear'         => true,
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'cleavage')->widget(Select2::classname(), [
        'language'      => $lang,
        'data'          => $model->getCleavageList(),
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'cleavage_way')->widget(TouchSpin::classname(), [
        'pluginOptions' => [
            'initval'        => 0,
            'min'            => 0,
            'max'            => 3,
            'step'           => 1,
            'buttonup_txt'   => '<i class="glyphicon glyphicon-plus"></i>',
            'buttondown_txt' => '<i class="glyphicon glyphicon-minus"></i>',
        ],
    ]);
    ?>

    <?= $form->field($model, 'structure_type')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'separate_state')->widget(Select2::classname(), [
        'language'      => $lang,
        //        'value'         => array_pop(array_keys($model->getSeparateStates())),
        'data'          => $model->getSeparateStates(),
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'bend')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shape')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satellites')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'formation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="col-sm-12">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
