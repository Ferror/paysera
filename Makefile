ci:
	composer validate
	bin/phpunit tests
	vendor/bin/phpstan analyze -c phpstan.neon
