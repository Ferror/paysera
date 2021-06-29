ci:
	composer validate
	bin/phpunit tests
	vendor/bin/phpstan analyze -c phpstan.neon
	vendor/bin/ecs check
fix:
	vendor/bin/ecs check --fix
coverage:
	bin/phpunit tests --coverage-html coverage
run:
	composer install --no-interaction --prefer-dist
	exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf
