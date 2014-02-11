<?php namespace Interval\Matrix;

/**
 * Class of real intervals
 */
class Interval {
	const POSITIVE_INFINITY = PHP_INT_MAX;
	const NEGATIVE_INFINITY = self::POSITIVE_INFINITY;

	private $min;
	private $max;

	public function __construct($min, $max) {
		$this->min = min($min, $max);
		$this->max = max($min, $max);
	}

	public function Min() { return $this->min; }
	public function Max() { return $this->max; }

	public function Contains($val) {
		return $this->min <= $val && $this->max >= $val;
	}

	public function Center() {
		return 0.5 * ($this->min + $this->max);
	}

	public function Width() {
		return $this->max - $this->min;
	}

	public function Abs() {
		return max(abs($this->min), abs($this->max));
	}

	/**
	 * Computes the distance of intervals
	 * @param Interval $I
	 * @return double
	 */
	public function DistanceFrom(Interval $I) {
		return max(abs($this->min - $I->min), abs($this->max - $I->max));
	}
}
