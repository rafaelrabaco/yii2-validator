<?php
/**
 * @link https://github.com/yiibr/yii2-br-validator
 * @license https://github.com/yiibr/yii2-br-validator/blob/master/LICENSE
 */

namespace rafaelrabaco\validator;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the javascript files for client validation.
 */
class ValidationAsset extends AssetBundle
{
    public $sourcePath = '@rafaelrabaco/validator/assets';
    public $js = [
        'rabaco.validation.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
