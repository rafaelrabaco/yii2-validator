Yii 2 Validator
=========================

Yii2 Extension that provide validations and features for Brazilian and Portugal localization

* CPF: Cadastro de pessoa física **(BR)**
* CNPJ: Cadastro nacional de pessoa jurídica **(BR)**
* CEI: Cadastro específico no INSS **(BR)**
* NIF: Número de identificação fiscal **(PT)**
 
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat-square&maxAge=3600)](http://www.yiiframework.com/)
[![CircleCI](https://img.shields.io/circleci/project/github/rafaelrabaco/yii2-validator.svg?style=flat-square)](https://circleci.com/gh/rafaelrabaco/yii2-validator)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E=7.0-8892BF.svg?style=flat-square)](https://php.net)
[![Latest Stable Version](https://img.shields.io/packagist/v/rafaelrabaco/yii2-validator.svg?style=flat-square)](https://packagist.org/packages/rafaelrabaco/yii2-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/rafaelrabaco/yii2-validator.svg?style=flat-square)](https://packagist.org/packages/rafaelrabaco/yii2-validator)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist rafaelrabaco/yii2-validator "*"
```

or add

```
"rafaelrabaco/yii2-validator": "*"
```

to the require section of your `composer.json` file.

Usage
-----
Add the rules as the following example


```php

use Yii;
use yii\base\Model;
use rafaelrabaco\validator\CpfValidator;
use rafaelrabaco\validator\CnpjValidator;
use rafaelrabaco\validator\CeiValidator;
use rafaelrabaco\validator\NifValidator;

class PersonForm extends Model
{
	public $name;
	public $cpf;
	public $cnpj;
	public $cei;
	public $nif;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			// name is required
			['name', 'required'],
			// cpf validator
			['cpf', CpfValidator::className()],
			// cnpj validator
			['cnpj', CnpjValidator::className()],
			// cei validator
			['cei', CeiValidator::className()]
			// nif validator
			['nif', NifValidator::className()]
		];
	}
}
```
