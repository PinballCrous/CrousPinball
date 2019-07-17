(() => {
	// plugins
	Matter.use(MatterAttractors);

	$levelDisplay = $("#levelDisplay");
	$monthDisplay = $("#monthDisplay");

	// constants
	const PATHS = {
		DOME: '0 0 0 250 19 250 20 231.9 25.7 196.1 36.9 161.7 53.3 129.5 74.6 100.2 100.2 74.6 129.5 53.3 161.7 36.9 196.1 25.7 231.9 20 268.1 20 303.9 25.7 338.3 36.9 370.5 53.3 399.8 74.6 425.4 100.2 446.7 129.5 463.1 161.7 474.3 196.1 480 231.9 480 250 500 250 500 0 0 0',
		DROP_LEFT: '0 0 20 0 70 100 20 150 0 150 0 0',
		DROP_RIGHT: '50 0 68 0 68 150 50 150 0 100 50 0',
		APRON_LEFT: '0 0 180 120 0 120 0 0',
		APRON_RIGHT: '180 0 180 120 0 120 180 0'
	};
	const COLOR = {
		OUTER: '#FFFFFF',
		INNER: '#E30000',
		BUMPER: '#A80606',
		BUMPER_LIT: '#FF0000',
		PADDLE: '#A80606',
		PINBALL: '#E30000'
	};
	const GRAVITY = 0.55;
	const WIREFRAMES = false;
	const BUMPER_BOUNCE = 1.5;
	const PADDLE_PULL = 0.002;
	const MAX_VELOCITY = 60;

	// score elements
	let $currentScore = $('.current-score span');
	let $highScore = $('.high-score span');
	let $levelScore = $('.lvl-score span');

	// shared variables
	let currentScore, highScore, levelScore;
	let engine, world, render, pinball, stopperGroup;
	let leftPaddle, leftUpStopper, leftDownStopper, isLeftPaddleUp;
	let rightPaddle, rightUpStopper, rightDownStopper, isRightPaddleUp;
	let levelCurrent = 1;
	let shownc = false;
	let shownr = false;
	let showno = false;
	let shownu = false;
	let showns = false;
	let isReset = true;
	function load() {
		init();
		createStaticBodies();
		createPaddles();
		createPinball();
		createEvents();

	}

	function init() {

		// engine (shared)
		engine = Matter.Engine.create();

		// world (shared)
		world = engine.world;
		world.bounds = {
			min: { x: 0, y: 0},
			max: { x: 500, y: 800 }
		};
		world.gravity.y = GRAVITY;

		// render (shared)
		render = Matter.Render.create({
			element: $('.container')[0],
			engine: engine,
			options: {
				width: world.bounds.max.x,
				height: world.bounds.max.y,
				wireframes: WIREFRAMES,
				background: COLOR.BACKGROUND
			}
		});
		Matter.Render.run(render);

		// runner
		let runner = Matter.Runner.create();
		Matter.Runner.run(runner, engine);

		// used for collision filtering on various bodies
		stopperGroup = Matter.Body.nextGroup(true);

		// starting values
		currentScore = 0;
		highScore = 0;
		levelScore = 0;
		isLeftPaddleUp = false;
		isRightPaddleUp = false;
	}

	function createStaticBodies() {
		Matter.World.add(world, [
			// table boundaries (top, bottom, left, right)
			boundary(250, -30, 500, 100),
			boundary(250, 830, 500, 100),
			boundary(-30, 400, 100, 800),
			boundary(530, 400, 100, 800),

			// dome
			path(239, 86, PATHS.DOME),

			// pegs (left-most, left, mid, right, right-most)
			wall(100, 140, 10, 40, COLOR.INNER, 0, 5),
			wall(150, 140, 10, 40, COLOR.INNER, 0, 5),
			wall(200, 140, 10, 40, COLOR.INNER, 0, 5),
			wall(250, 140, 10, 40, COLOR.INNER, 0, 5),
			wall(300, 140, 10, 40, COLOR.INNER, 0, 5),
			wall(350, 140, 10, 40, COLOR.INNER, 0, 5),

			// top bumpers (left, mid, right)
			bumper(105, 250),
			bumper(225, 250),
			bumper(345, 250),

			// bottom bumpers (left, right)
			bumper(165, 340),
			bumper(285, 340),

			// shooter lane wall
			wall(440, 520, 20, 530, COLOR.OUTER),

			// drops (left, right)
			path(25, 360, PATHS.DROP_LEFT),
			path(425, 360, PATHS.DROP_RIGHT),

			// slingshots (left, right)
			wall(120, 510, 20, 120, COLOR.INNER),
			wall(330, 510, 20, 120, COLOR.INNER),

			// out lane walls (left, right)
			wall(59, 529, 20, 160, COLOR.INNER),
			wall(391, 529, 20, 160, COLOR.INNER),

			// flipper walls (left, right);
			wall(100, 630, 20, 115, COLOR.INNER, -0.96),
			wall(350, 630, 20, 115, COLOR.INNER, 0.96),

			// aprons (left, right)
			path(79, 740, PATHS.APRON_LEFT),
			path(371, 740, PATHS.APRON_RIGHT),

			// reset zones (center, right)
			reset(225, 50),
			reset(465, 30)
		]);
	}

	function createPaddles() {

		// these bodies keep paddle swings contained, but allow the ball to pass through
		leftUpStopper = stopper(160, 591, 'left', 'up');
		leftDownStopper = stopper(140, 743, 'left', 'down');
		rightUpStopper = stopper(290, 591, 'right', 'up');
		rightDownStopper = stopper(310, 743, 'right', 'down');
		Matter.World.add(world, [leftUpStopper, leftDownStopper, rightUpStopper, rightDownStopper]);
		


		// this group lets paddle pieces overlap each other
		let paddleGroup = Matter.Body.nextGroup(true);

		// Left paddle mechanism
		let paddleLeft = {};
		paddleLeft.paddle = Matter.Bodies.trapezoid(170, 660, 20, 80, 0.33, {
			label: 'paddleLeft',
			angle: 1.57,
			chamfer: {},
			render: {
				fillStyle: COLOR.PADDLE
			}
		});
		paddleLeft.brick = Matter.Bodies.rectangle(172, 672, 40, 80, {
			angle: 1.62,
			chamfer: {},
			render: {
				visible: false
			}
		});
		paddleLeft.comp = Matter.Body.create({
			label: 'paddleLeftComp',
			parts: [paddleLeft.paddle, paddleLeft.brick]
		});
		paddleLeft.hinge = Matter.Bodies.circle(142, 660, 5, {
			isStatic: true,
			render: {
				visible: false
			}
		});
		Object.values(paddleLeft).forEach((piece) => {
			piece.collisionFilter.group = paddleGroup
		});
		paddleLeft.con = Matter.Constraint.create({
			bodyA: paddleLeft.comp,
			pointA: { x: -29.5, y: -8.5 },
			bodyB: paddleLeft.hinge,
			length: 0,
			stiffness: 0
		});
		Matter.World.add(world, [paddleLeft.comp, paddleLeft.hinge, paddleLeft.con]);
		Matter.Body.rotate(paddleLeft.comp, 0.57, { x: 142, y: 660 });

		// right paddle mechanism
		let paddleRight = {};
		paddleRight.paddle = Matter.Bodies.trapezoid(280, 660, 20, 80, 0.33, {
			label: 'paddleRight',
			angle: -1.57,
			chamfer: {},
			render: {
				fillStyle: COLOR.PADDLE
			}
		});
		paddleRight.brick = Matter.Bodies.rectangle(278, 672, 40, 80, {
			angle: -1.62,
			chamfer: {},
			render: {
				visible: false
			}
		});
		paddleRight.comp = Matter.Body.create({
			label: 'paddleRightComp',
			parts: [paddleRight.paddle, paddleRight.brick]
		});
		paddleRight.hinge = Matter.Bodies.circle(308, 660, 5, {
			isStatic: true,
			render: {
				visible: false
			}
		});
		Object.values(paddleRight).forEach((piece) => {
			piece.collisionFilter.group = paddleGroup
		});
		paddleRight.con = Matter.Constraint.create({
			bodyA: paddleRight.comp,
			pointA: { x: 29.5, y: -8.5 },
			bodyB: paddleRight.hinge,
			length: 0,
			stiffness: 0
		});
		Matter.World.add(world, [paddleRight.comp, paddleRight.hinge, paddleRight.con]);
		Matter.Body.rotate(paddleRight.comp, -0.57, { x: 308, y: 660 });
	}

	function createPinball() {

		// x/y are set to when pinball is launched
		pinball = Matter.Bodies.circle(465, 765, 14, {
			label: 'pinball',
			collisionFilter: {
				group: stopperGroup
			},
			render: {
				fillStyle: COLOR.PINBALL
			},
			isStatic: true
		});
		Matter.World.add(world, pinball);
		levelCurrent = 1;
		updateLevel(1);
	}

	function createEvents() {
		// events for when the pinball hits stuff
		Matter.Events.on(engine, 'collisionStart', function(event) {
			let pairs = event.pairs;
			pairs.forEach(function(pair) {
				if (pair.bodyB.label === 'pinball') {
					switch (pair.bodyA.label) {
						case 'reset':
							resetPinball();
							levelCurrent = 1;
							updateLevel(1);
							$('#c').css("color", "");
							$('#cent').addClass("hidden");
							$('#r').css("color", "");
							$('#regi').addClass("hidden");
							$('#o').css("color", "");
							$('#oeuv').addClass("hidden");
							$('#u').css("color", "");
							$('#univ').addClass("hidden");
							$('#s').css("color", "");
							$('#scol').addClass("hidden");
							shownc = false;
							shownr = false;
							showno = false;
							shownu = false;
							showns = false;
							break;
						case 'bumper':
							pingBumper(pair.bodyA);
							break;
					}
				}
			});
		});

		// regulate pinball
		Matter.Events.on(engine, 'beforeUpdate', function(event) {

			let letter = document.querySelector('#letter');
			if (pinball.position.x < 150 && pinball.position.x > 110 && pinball.position.y > 140 && pinball.position.y < 170) {
				$('#c').css("color", "red");
				$('#cent').removeClass("hidden");
				setTimeout(updateScore(currentScore + 10), 500);
				if (shownc == false){
					letter.play();
					$('#centr').css("visibility", "visible");
					shownc = true;
					setTimeout(function(){
						$('#centr').css("visibility", "hidden");
					},500);
				}
			}

			if (pinball.position.x < 200 && pinball.position.x > 160 && pinball.position.y > 140 && pinball.position.y < 170) {
				$('#r').css("color", "red");
				$('#regi').removeClass("hidden");
				setTimeout(updateScore(currentScore + 10), 500);
				if (shownr == false){
					letter.play();
					$('#regio').css("visibility", "visible");
					shownr = true;
					setTimeout(function(){
						$('#regio').css("visibility", "hidden");
					},500);
				}
			}

			if (pinball.position.x < 250 && pinball.position.x > 210 && pinball.position.y > 140 && pinball.position.y < 170) {
				$('#o').css("color", "red");
				$('#oeuv').removeClass("hidden");
				setTimeout(updateScore(currentScore + 10), 500);
				if (showno == false){
					letter.play();
					$('#oeuvr').css("visibility", "visible");
					showno = true;
					setTimeout(function(){
						$('#oeuvr').css("visibility", "hidden");
					},500);
				}
			}

			if (pinball.position.x < 300 && pinball.position.x > 260 && pinball.position.y > 140 && pinball.position.y < 170) {
				$('#u').css("color", "red");
				$('#univ').removeClass("hidden");
				setTimeout(updateScore(currentScore + 10), 500);
				if (shownu == false){
					letter.play();
					$('#unive').css("visibility", "visible");
					shownu = true;
					setTimeout(function(){
						$('#unive').css("visibility", "hidden");
					},500);
				}
			}

			if (pinball.position.x < 350 && pinball.position.x > 310 && pinball.position.y > 140 && pinball.position.y < 170) {
				$('#s').css("color", "red");
				$('#scol').removeClass("hidden");
				setTimeout(updateScore(currentScore + 10), 500);
				if (showns == false){
					letter.play();
					$('#scola').css("visibility", "visible");
					showns = true;
					setTimeout(function(){
						$('#scola').css("visibility", "hidden");
					},500);
				}
			}

			var theme = document.querySelector('#theme');
			theme.play();
			// Musique de theme ligne 271!


			// bumpers can quickly multiply velocity, so keep that in check
			Matter.Body.setVelocity(pinball, {
				x: Math.max(Math.min(pinball.velocity.x, MAX_VELOCITY), -MAX_VELOCITY),
				y: Math.max(Math.min(pinball.velocity.y, MAX_VELOCITY), -MAX_VELOCITY),
			});

			// cheap way to keep ball from going back down the shooter lane
			if (pinball.position.x > 450 && pinball.velocity.y > 0) {
				Matter.Body.setVelocity(pinball, { x: 0, y: -10 });
			}
		});

		// mouse drag (god mode for grabbing pinball)
		Matter.World.add(world, Matter.MouseConstraint.create(engine, {
			mouse: Matter.Mouse.create(render.canvas),
			constraint: {
				stiffness: 0.2,
				render: {
					visible: false
				}
			}
		}));

		let soundPaddle = document.querySelector('#PADDLE');
		// keyboard paddle events
		$('body').on('keydown', function(e) {
			if (e.which === 37) { // left arrow key
				isLeftPaddleUp = true;
				soundPaddle.play();
			} else if (e.which === 39) { // right arrow key
				isRightPaddleUp = true;
				soundPaddle.play();
			}
		});
		$('body').on('keyup', function(e) {
			if (e.which === 37) { // left arrow key
				isLeftPaddleUp = false;
			} else if (e.which === 39) { // right arrow key
				isRightPaddleUp = false;
			}
		});

		$('body').on('keyup', function(e) {
			if (e.which === 32) { // space key
				if (isReset) {
					launchPinball();

					let launch = document.querySelector('#launch');
					launch.play();
				}
			}
		});


		// click/tap paddle events
		$('.left-trigger')
			.on('mousedown touchstart', function(e) {
				isLeftPaddleUp = true;
				soundPaddle.play();
			})
			.on('mouseup touchend', function(e) {
				isLeftPaddleUp = false;
			});

		$('.right-trigger')
		.on('mousedown touchstart', function(e) {
				isRightPaddleUp = true;
				soundPaddle.play();
			})
			.on('mouseup touchend', function(e) {
				isRightPaddleUp = false;
			});

	}

	function launchPinball() {
		updateScore(0);
		isReset = false;
		Matter.Body.setStatic(pinball, false);
		Matter.Body.setPosition(pinball, { x: 465, y: 765 });
		Matter.Body.setVelocity(pinball, { x: 0, y: -25 + rand(-2, 2) });
		Matter.Body.setAngularVelocity(pinball, 0);

	}
 
	function resetPinball() {
		isReset = true;
		Matter.Body.setStatic(pinball, true);
		Matter.Body.setPosition(pinball, { x: 465, y: 765 });
	}

	function pingBumper(bumper) {
		updateScore(currentScore + 10);
		var blaster = document.querySelector('#blaster');
		blaster.play();

		// flash color
		bumper.render.fillStyle = COLOR.BUMPER_LIT;
		setTimeout(function() {
			bumper.render.fillStyle = COLOR.BUMPER;
		}, 100);
	}

	function updateScore(newCurrentScore) {
		currentScore = newCurrentScore;
		$currentScore.text(currentScore);

		//Create a condition level
		if (currentScore%500 == 0 && currentScore != 0) {
			levelCurrent++;
			updateLevel(levelCurrent);
		}
		highScore = Math.max(currentScore, highScore);
		$highScore.text(highScore);
	}

	//create a level
	function updateLevel(newCurrentLevel){
		$levelDisplay.empty()
		$levelDisplay.append("Level "+newCurrentLevel);
		setTimeout(function(){$levelDisplay.empty();}, 1000);
		levelScore = newCurrentLevel;
		$levelScore.text(levelScore);
		
		if (levelCurrent=="10") { 
			
			//alert("Saviez vous que grâce aux restos U, les étudiants issus de tous les milieux ont la possibilité de prendre à l’extérieur de chez eux un repas par jour pour 3,25 € ? C’est une véritable mission de service public, une aide matérielle financée par l’Etat à travers le Cnous et les Crous.");
		 
		
		}
	}

	// matter.js has a built in random range function, but it is deterministic
	function rand(min, max) {
		return Math.random() * (max - min) + min;
	}

	// outer edges of pinball table
	function boundary(x, y, width, height) {
		return Matter.Bodies.rectangle(x, y, width, height, {
			isStatic: true,
			render: {
				fillStyle: COLOR.OUTER
			}
		});
	}

	// wall segments
	function wall(x, y, width, height, color, angle = 0, border = 10) {
		return Matter.Bodies.rectangle(x, y, width, height, {
			angle: angle,
			isStatic: true,
			chamfer: { radius: border },
			render: {
				fillStyle: color
			}
		});
	}

	// bodies created from SVG paths
	function path(x, y, path) {
		let vertices = Matter.Vertices.fromPath(path);
		return Matter.Bodies.fromVertices(x, y, vertices, {
			isStatic: true,
			render: {
				fillStyle: COLOR.OUTER,

				// add stroke and line width to fill in slight gaps between fragments
				strokeStyle: COLOR.OUTER,
				lineWidth: 1
			}
		});
	}

	// round bodies that repel pinball
	function bumper(x, y) {
		let bumper = Matter.Bodies.circle(x, y, 25, {
			label: 'bumper',
			isStatic: true,
			render: {
				fillStyle: COLOR.BUMPER
			}
		});

		// for some reason, restitution is reset unless it's set after body creation
		bumper.restitution = BUMPER_BOUNCE;

		return bumper;
	}

	// invisible bodies to constrict paddles
	function stopper(x, y, side, position) {
		// determine which paddle composite to interact with
		let attracteeLabel = (side === 'left') ? 'paddleLeftComp' : 'paddleRightComp';

		return Matter.Bodies.circle(x, y, 40, {
			isStatic: true,
			render: {
				visible: false,
			},
			collisionFilter: {
				group: stopperGroup
			},
			plugin: {
				attractors: [
					// stopper is always a, other body is b
					function(a, b) {
						if (b.label === attracteeLabel) {
							let isPaddleUp = (side === 'left') ? isLeftPaddleUp : isRightPaddleUp;
							let isPullingUp = (position === 'up' && isPaddleUp);
							let isPullingDown = (position === 'down' && !isPaddleUp);
							if (isPullingUp || isPullingDown) {
								return {
									x: (a.position.x - b.position.x) * PADDLE_PULL,
									y: (a.position.y - b.position.y) * PADDLE_PULL,
								};
							}
						}
					}
				]
			}
		});
	}

	// contact with these bodies causes pinball to be relaunched
	function reset(x, width) {
		isReset = true;
		return Matter.Bodies.rectangle(x, 781, width, 2, {
			label: 'reset',
			isStatic: true,
			render: {
				fillStyle: '#fff'
			}
		});
	}

	window.addEventListener('load', load, false);

	
})();

// Chrono
	var startTime = 0
	var start = 0
	var end = 0
	var diff = 0
	var timerID = 0
	function chrono(){
		end = new Date()
		diff = end - start
		diff = new Date(diff)
		var msec = diff.getMilliseconds()
		var sec = diff.getSeconds()
		var min = diff.getMinutes()
		var hr = diff.getHours()-1
		if (min < 10){
			min = "0" + min
		}
		if (sec < 10){
			sec = "0" + sec
		}
		if(msec < 10){
			msec = "00" +msec
		}
		else if(msec < 100){
			msec = "0" +msec
		}
		document.getElementById("timelaps").innerHTML = hr + ":" + min + ":" + sec
		timerID = setTimeout("chrono()", 10)

		if (min == 0 && sec == 45) {
			$monthDisplay.empty()
			$monthDisplay.append("Janvier");
			setTimeout(function(){$monthDisplay.empty();}, 3000);
		}else if (min == 1 && sec == 30) {
			$monthDisplay.empty()
			$monthDisplay.append("Février");
			setTimeout(function(){$monthDisplay.empty();}, 3000);
		} else if (min == 2 && sec == 20) {
			$monthDisplay.empty()
			$monthDisplay.append("Mars");
			setTimeout(function(){$monthDisplay.empty();}, 3000);
		} else if(min == 3 && sec == 0){
			$monthDisplay.empty()
			$monthDisplay.append("Avril");
			setTimeout(function(){$monthDisplay.empty();}, 3000);
		}else if(min == 3 && sec == 15){
			$monthDisplay.empty()
			$monthDisplay.append("15 Avril dernier jour pour vous inscrire au CROUS");
			setTimeout(function(){$monthDisplay.empty();}, 3000);
		}

	}

	function chronoStart(){
		start = new Date()
		chrono()
	}