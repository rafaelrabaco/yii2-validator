<?php

namespace rafaelrabaco\validator\tests\cases;

use Yii;
use rafaelrabaco\validator\CnpjValidator;
use rafaelrabaco\validator\tests\Test;

/**
 * CpfValidatorTest
 */
class CnpjValidatorTest extends Test
{
    public function testValidateValue()
    {
        $val = new CnpjValidator();
        $this->assertFalse($val->validate('789542284'));

        $this->assertFalse($val->validate('22222222222222'));
        $this->assertFalse($val->validate('22.222.222/2222-22'));

        $this->assertFalse($val->validate('32.458.657.0001-89'));
        $this->assertFalse($val->validate('32458657000189'));

        $this->assertTrue($val->validate('62.346.464/0001-01'));
        $this->assertTrue($val->validate('62346464000101'));
    }
}
