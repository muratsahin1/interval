<?php

use Interval\Matrix\Interval;
use Interval\Matrix\Matrix;

class MatrixTest extends TestCase {

	public function testMatrixTranspose() {
		$M = new Matrix(3, 2);
		$M->Set(0, 0, new Interval(1, 1));
		$M->Set(0, 1, new Interval(2, 2));
		$M->Set(1, 0, new Interval(3, 3));
		$M->Set(1, 1, new Interval(4, 4));
		$M->Set(2, 0, new Interval(5, 5));
		$M->Set(2, 1, new Interval(6, 6));
		$T = $M->Transpose();

		$this->assertTrue($T->Get(0, 0)->Equals(new Interval(1, 1)));
		$this->assertTrue($T->Get(0, 1)->Equals(new Interval(3, 3)));
		$this->assertTrue($T->Get(0, 2)->Equals(new Interval(5, 5)));
		$this->assertTrue($T->Get(1, 0)->Equals(new Interval(2, 2)));
		$this->assertTrue($T->Get(1, 1)->Equals(new Interval(4, 4)));
		$this->assertTrue($T->Get(1, 2)->Equals(new Interval(6, 6)));
	}

	public function testPointMatrix() {
		$M1 = new Matrix(2, 2);
		$M2 = new Matrix(2, 2);
		$M1->Set(0, 0, new Interval(1, 1));
		$M1->Set(0, 1, new Interval(1, 1));
		$M1->Set(1, 0, new Interval(1, 1));
		$M1->Set(1, 1, new Interval(1, 1));
		$M2->Set(0, 0, new Interval(1, 1));
		$M2->Set(0, 1, new Interval(1, 1));
		$M2->Set(1, 0, new Interval(1, 1));
		$M2->Set(1, 1, new Interval(1, 1.1));

		$this->assertTrue($M1->IsPointMatrix());
		$this->assertTrue(!$M2->IsPointMatrix());
	}

	public function testAugmentMatrix() {
		$M1 = new Matrix(2, 2);
		$M2 = new Matrix(2, 1);
		$M1->Set(0, 0, new Interval(1, 1));
		$M1->Set(0, 1, new Interval(2, 2));
		$M1->Set(1, 0, new Interval(3, 3));
		$M1->Set(1, 1, new Interval(4, 4));
		$M2->Set(0, 0, new Interval(10, 10));
		$M2->Set(1, 0, new Interval(100, 100));

		$augmentedLeft = $M1->LeftAugment($M2);

		$this->assertTrue($augmentedLeft->Get(0, 0)->Equals($M2->Get(0, 0)));
		$this->assertTrue($augmentedLeft->Get(0, 1)->Equals($M1->Get(0, 0)));
		$this->assertTrue($augmentedLeft->Get(0, 2)->Equals($M1->Get(0, 1)));
		$this->assertTrue($augmentedLeft->Get(1, 0)->Equals($M2->Get(1, 0)));
		$this->assertTrue($augmentedLeft->Get(1, 1)->Equals($M1->Get(1, 0)));
		$this->assertTrue($augmentedLeft->Get(1, 2)->Equals($M1->Get(1, 1)));

		$augmentedRight = $M1->RightAugment($M2);

		$this->assertTrue($augmentedRight->Get(0, 0)->Equals($M1->Get(0, 0)));
		$this->assertTrue($augmentedRight->Get(0, 1)->Equals($M1->Get(0, 1)));
		$this->assertTrue($augmentedRight->Get(0, 2)->Equals($M2->Get(0, 0)));
		$this->assertTrue($augmentedRight->Get(1, 0)->Equals($M1->Get(1, 0)));
		$this->assertTrue($augmentedRight->Get(1, 1)->Equals($M1->Get(1, 1)));
		$this->assertTrue($augmentedRight->Get(1, 2)->Equals($M2->Get(1, 0)));
	}

}