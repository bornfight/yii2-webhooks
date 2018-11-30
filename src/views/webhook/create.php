<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \degordian\webhooks\models\Webhook */

$this->title = 'Create Webhook';
$this->params['breadcrumbs'][] = ['label' => 'Webhooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webhook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
