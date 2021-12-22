install:
	composer install

brain-games:
	./bin/brain-games

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

dump-autoload:
	composer dump-autoload

brain-gcd:
	./bin/brain-gcd

start-rec:
	asciinema rec

brain-progression:
	./bin/brain-progression
