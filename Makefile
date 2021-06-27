ci:
	bin/phpunit
	vendor/bin/ecs check
	vendor/bin/phpstan
