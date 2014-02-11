<?php namespace Interval\Matrix;

/**
 * Class of real intervals
 */
class Interval {
	const POSITIVE_INFINITY = PHP_INT_MAX;
	const NEGATIVE_INFINITY = self::POSITIVE_INFINITY;

	private $min;
	private $max;

	/**
	 * Interval constructor
	 * @param double $min lower bound
	 * @param double $max upper bound
	 */
	public function __construct($min, $max) {
		$this->min = min($min, $max);
		$this->max = max($min, $max);
	}

	public function Min() { return $this->min; }
	public function Max() { return $this->max; }

	public function Contains($val) {
		return $this->min <= $val && $this->max >= $val;
	}

	/**
	 * Computes the center of the interval
	 * @return double
	 */
	public function Center() {
		return 0.5 * ($this->min + $this->max);
	}

	/**
	 * Computes the width of the interval
	 * @return double
	 */
	public function Width() {
		return $this->max - $this->min;
	}

	/**
	 * Computes the absolute value of the interval
	 * @return double
	 */
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

	/**
	 * Computes the sum of intervals
	 * @param Interval $I
	 * @return Interval
	 */
	public function Add(Interval $I) {
		return new Interval($this->min + $I->min, $this->max + $I->max);
	}

	/**
	 * Computes the difference of intervals
	 * @param Interval $I
	 * @return Interval
	 */
	public function Subtract(Interval $I) {
		return new Interval($this->min - $I->max, $this->max - $I->min);
	}

	/**
	 * Computes the multiplication of intervals
	 * @param Interval $I
	 * @return Interval
	 */
	public function Multiplication(Interval $I) {
		return new Interval(
			min($this->min * $I->min, min($this->min * $I->max, min($this->max * $I->min, $this->max * $I->max))),
			max($this->min * $I->min, max($this->min * $I->max, max($this->max * $I->min, $this->max * $I->max)))
		);
	}

	/**
	 * Computes the quotient of intervals
	 * @param Interval $I
	 * @throws Exception if $I contains zero
	 * @return Interval
	 */
	public function Divide(Interval $I) {
		if ($I->Contains(0))
			throw new Exception("Divided by zero");

		$temp1 = new Interval($this->min, $this->max);
		$temp2 = new Interval(1 / $I->max, 1 / $I->min);

		return $temp1->Multiplication($temp2);
	}

	/**
	 * Computes the intersect of intervals
	 * @param Interval $I
	 * @return Interval
	 */
	public function Intersect(Interval $I) {
		if ($this->max < $I->min || $I->max < $this->min)
			return null;

		return new Interval(max($this->min, $I->min), min($this->max, $I->max));
	}

	/**
	 * Decides whether the intervals are equal
	 * @param Interval $I
	 * @return bool
	 */
	public function Equals(Interval $I) {
		return $this->min == $I->min && $this->max == $I->max;
	}

	/**
	 * Interval inequality
	 * @param Interval $I
	 * @return bool
	 */
	public function Less(Interval $I) {
		return $this->max < $I->min;
	}

	/**
	 * Interval inequality
	 * @param Interval $I
	 * @return bool
	 */
	public function LessOrEqual(Interval $I) {
		return $this->max <= $I->min;
	}

	/**
	 * Interval inequality
	 * @param Interval $I
	 * @return bool
	 */
	public function Greater(Interval $I) {
		return $this->min > $I->max;
	}

	/**
	 * Interval inequality
	 * @param Interval $I
	 * @return bool
	 */
	public function GreaterOrEqual(Interval $I) {
		return $this->min >= $I->max;
	}

	public function __toString() {
		if ($this->min != $this->max)
			return "[" . $this->min . "," . $this->max . "]";
		return $this->min;
	}
}
