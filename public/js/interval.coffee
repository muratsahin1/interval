class Interval
	constructor: (num) ->
		@min = num
		@max = num

	min: ->
		return @min

	max: ->
		return @max

I = new Interval 2
console.log(I.min)
console.log(I.max)
