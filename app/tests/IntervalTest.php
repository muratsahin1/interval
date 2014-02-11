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

	public function testIntervalEquality() {
		$I1 = new Interval(1,2.5);
		$I2 = new Interval(2,6);
		$I3 = new Interval(1,2.5);
		$this->assertTrue($I1->Equals($I3));
		$this->assertFalse($I1->Equals($I2));
		$this->assertTrue($I3->Equals($I1));
	}

	public function testIntervalOperators() {
		$I1 = new Interval(1,2.5);
		$I2 = new Interval(2,6);
		$I3 = $I1->Add($I2);
		$I4 = $I2->Subtract($I1);
		$I5 = $I1->Multiplication($I2);
		$I6 = $I2->Divide($I1);
		$this->assertTrue($I3->Equals(new Interval(3, 8.5)));
		$this->assertTrue($I4->Equals(new Interval(-0.5, 5)));
		$this->assertTrue($I5->Equals(new Interval(2, 15)));
		$this->assertTrue($I6->Equals(new Interval(0.8, 6)));
	}

	public function testIntervalOutput() {
		$I = new Interval(2.4, 3);
		$this->assertTrue($I == "[2.4,3]");
		$this->assertFalse($I == "[2,4,3]");
	}

}