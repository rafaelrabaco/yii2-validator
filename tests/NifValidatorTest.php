<?php

namespace rafaelrabaco\validator\tests;

use Yii;
use rafaelrabaco\validator\NifValidator;


/**
 * NifValidatorTest
 */
class NifValidatorTest extends TestCase
{
    public function testValidateValue()
    {
        $val = new NifValidator();
        $this->assertFalse($val->validate(''));
        $this->assertFalse($val->validate('44443345_'));
        $this->assertFalse($val->validate('444433454'));
        $this->assertFalse($val->validate('444433'));
        $this->assertFalse($val->validate('W44433454'));
        $this->assertFalse($val->validate('*@3789987'));
        $this->assertFalse($val->validate('76121245654345654'));
        $this->assertFalse($val->validate('[23232323'));
        $this->assertFalse($val->validate('209733455'));
        $this->assertFalse($val->validate('514328787'));
        $this->assertFalse($val->validate('218495386'));
        $this->assertFalse($val->validate('102633511'));
        $this->assertFalse($val->validate('108475407'));
        $this->assertFalse($val->validate('090883715'));

        $this->assertTrue($val->validate('209733454'));
        $this->assertTrue($val->validate('514328789'));
        $this->assertTrue($val->validate('218795386'));
        $this->assertTrue($val->validate('232092079'));
        $this->assertTrue($val->validate('190883715'));
        $this->assertTrue($val->validate('102623511'));
        $this->assertTrue($val->validate('108435407'));

        $this->assertTrue($val->validate('285826646'));
        $this->assertTrue($val->validate('192374400'));
        $this->assertTrue($val->validate('576950424'));
        $this->assertTrue($val->validate('589202154'));
        $this->assertTrue($val->validate('641904525'));
        $this->assertTrue($val->validate('657464449'));
        $this->assertTrue($val->validate('854703764'));
        $this->assertTrue($val->validate('834620405'));
        $this->assertTrue($val->validate('856286370'));
        $this->assertTrue($val->validate('948681039'));
        $this->assertTrue($val->validate('988506378'));
        $this->assertTrue($val->validate('956948189'));
        $this->assertTrue($val->validate('295882034'));
        $this->assertTrue($val->validate('198364750'));
        $this->assertTrue($val->validate('101405855'));
        $this->assertTrue($val->validate('184043166'));
        $this->assertTrue($val->validate('152767347'));
        $this->assertTrue($val->validate('179146874'));
        $this->assertTrue($val->validate('572289774'));

    }
}
