<?php

namespace common\helpers;

use Yii;

trait Mailer {

    public function sendEmail($title, $view)
    {
        Yii::$app->mailer->compose($view, [$view => $this])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject($title . ' #' . $this->id)
            ->send();

        Yii::$app->mailer->compose($view, [$view => $this])
            ->setTo(Yii::$app->params['adminEmail2'])
            ->setFrom(Yii::$app->params['adminEmail2'])
            ->setSubject($title . ' #' . $this->id)
            ->send();
    }
}