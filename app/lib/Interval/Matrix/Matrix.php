<?php namespace Interval\Matrix;

class Matrix {

	protected $n, $m;
	protected $data = array();

	public function __construct($n, $m) {
		$this->n = $n;
		$this->m = $m;

		for ($i = 0; $i < $this->n; $i++) {
			$this->data[$i] = array();
			for ($j = 0; $j < $this->m; $j++) {
				$this->data[$i][$j] = new Interval(0, 0);
			}
		}
	}

	public function RowSize() { return $this->n; }
	public function ColSize() { return $this->m; }

	public function Set($i, $j, Interval $val) {
		$i = abs($i);
		$j = abs($j);
		if ($i >= $this->n || $j >= $this->m)
			throw new Exception("Illegal dimensions");

		$this->data[$i][$j] = $val;
	}

	public function Get($i, $j) {
		$i = abs($i);
		$j = abs($j);
		if ($i >= $this->n || $j >= $this->m)
			throw new Exception("Illegal dimensions");

		return $this->data[$i][$j];
	}

	public function Transpose() {
		$result = new Matrix($this->m, $this->n);
		for ($i = 0; $i < $this->n; $i++) {
			for ($j = 0; $j < $this->m; $j++) {
				$result->Set($j, $i, $this->data[$i][$j]);
			}
		}

		return $result;
	}

	public function IsPointMatrix() {
		for ($i = 0; $i < $this->n; $i++) {
			for ($j = 0; $j < $this->m; $j++) {
				if ($this->data[$i][$j]->Min() != $this->data[$i][$j]->Max())
					return false;
			}
		}

		return true;
	}

	public function LeftAugment(Matrix $T) {
		if ($this->n != $T->n)
			throw new Exception("Illegal dimensions");

		$result = new Matrix($this->n, $this->m + $T->m);

		for ($i = 0; $i < $result->n; $i++) {
			for ($j = 0; $j < $result->m; $j++) {
				if ($j < $T->m)
					$result->data[$i][$j] = $T->data[$i][$j];
				else
					$result->data[$i][$j] = $this->data[$i][$j - $T->m];
			}
		}

		return $result;
	}

	public function RightAugment(Matrix $T) {
		return $T->LeftAugment($this);
	}

}