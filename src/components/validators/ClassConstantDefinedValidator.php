<?php

namespace degordian\webhooks\components\validators;

use Yii;
use yii\validators\Validator;

class ClassConstantDefinedValidator extends Validator
{
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} "{value}" is not defined as a class constant');
        }
    }

    public function validateValue($value)
    {
        if (!is_string($value)) {
            return null;
        }

        try {
            if (!defined($value)) {
                return [$this->message, []];
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }
}
