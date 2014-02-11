<?php

use Interval\Matrix\Interval;

class IntervalTest extends TestCase {

	public function testIntervalContainsValue() {
		$I = new Interval(2.1, 2.6);
		$this->assertTrue($I->Contains(2.2));
		$this->assertTrue($I->Contains(2.3));
		$this->assertTrue($I->Contains(2.35));
		$this->assertTrue($I->Contains(2.59999));
		$this->assertTrue($I->Contains(2.1));
		$this->assertFalse($I->Contains(2.09));
	}

	public function testIntervalCenter() {
		$I = new Interval(1, 2);
		$this->assertTrue($I->Center() == 1.5);
		$I = new Interval(1, 3);
		$this->assertTrue($I->Center() == 2);
		$I = new Interval(10, 13);
		$this->assertTrue($I->Center() == 11.5);
	}

	public function testIntervalDistance() {
		$I1 = new Interval(1,2);
		$I2 = new Interval(14,20);
		$this->assertTrue($I1->DistanceFrom($I2) == 18);
	}

}