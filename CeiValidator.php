<?php
namespace rafaelrabaco\validator;

use yii\helpers\Json;
use yii\validators\Validator;
use Yii;

/**
 * CeiValidator checks if the attribute value is a valid CEI.
 *
 * @author Guilherme Lessa <gl-lessa@hotmail.com>
 */
class CeiValidator extends Validator
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
        $cei = preg_replace('/[^0-9_]/', '', $value);
        $valid  = strlen($cei) == 12;

        if ($valid) {
            $cei = str_split($cei, 1);
            $sum = (7 * $cei[0]) + (4 * $cei[1]) + (1 * $cei[2]) + (8 * $cei[3]) + (5 * $cei[4]) + (2 * $cei[5]) +
                   (1 * $cei[6]) + (6 * $cei[7]) + (3 * $cei[8]) + (7 * $cei[9]) + (4 * $cei[10]);

            $dv = abs(10 - ($sum%10 + $sum/10) % 10);
            $valid = ($cei[11] == $dv);
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
                    ], Yii::$app->language),
        ];

        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        ValidationAsset::register($view);
        return 'rabaco.validation.cei(value, messages, ' . Json::encode($options) . ');';
    }

}
