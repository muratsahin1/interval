class Animal
	constructor: (@name) ->

	move: (meters) ->
		alert @name + " moved #{meters}m."

sam = new Animal "Sam"
sam.move(100)