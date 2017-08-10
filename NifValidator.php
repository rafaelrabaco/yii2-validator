<?php

namespace rafaelrabaco\validator;

use Yii;
use yii\validators\Validator;
use yii\helpers\Json;

/**
 * NifValidator checks if the attribute value is a valid NIF.
 *
 * @author Rafael Rabaço <rafaelrabaco@gmail.com>
 */
class NifValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', "{attribute} is invalid.");
        }
    }

    /**
     * @inheritdoc
     */
    protected function validateValue($value)
    {
        $valid = true;

        if (!is_numeric($value) || strlen($value) != 9) {
            $valid = false;
        }

        if ($valid) {
            $NIF = str_split($value);
            $NIF[0] = $NIF[0] * 9;
            $NIF[1] = $NIF[1] * 8;
            $NIF[2] = $NIF[2] * 7;
            $NIF[3] = $NIF[3] * 6;
            $NIF[4] = $NIF[4] * 5;
            $NIF[5] = $NIF[5] * 4;
            $NIF[6] = $NIF[6] * 3;
            $NIF[7] = $NIF[7] * 2;
            $NIF[8] = $NIF[8] * 1;

            $total = ($NIF[0] + $NIF[1] + $NIF[2] + $NIF[3] + $NIF[4] + $NIF[5] + $NIF[6] + $NIF[7]);
            $divisao = ($total / 11);
            $checkDivisao = $total - (intval($divisao) * 11);

            if ($checkDivisao == 1 || $checkDivisao == 0) {
                $comparador = 0;
            } else {
                $comparador = 11 - $checkDivisao;
            }

            if ($NIF[8] != $comparador) {
                $valid = false;
            }
        }

        return ($valid) ? [] : [$this->message, []];
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($object, $attribute, $view)
    {
        $options = [
            'message' => Yii::$app->getI18n()->format($this->message, [
                'attribute' => $object->getAttributeLabel($attribute),
            ], Yii::$app->language)
        ];

        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        ValidationAsset::register($view);
        return 'rabaco.validation.nif(value, messages, ' . Json::encode($options) . ');';
    }
}