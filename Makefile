test:
	./vendor/bin/phpunit tests
fix:
	./vendor/bin/php-cs-fixer fix ./src
	./vendor/bin/php-cs-fixer fix ./tests
run:
	php ./result.php