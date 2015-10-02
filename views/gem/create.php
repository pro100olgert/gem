<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gem */

$this->title = Yii::t('app', 'Add Gem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
