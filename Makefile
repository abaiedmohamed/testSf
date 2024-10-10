DOCKER_COMPOSE_DEV     = docker-compose -f docker-compose.yml
EXEC_BACK              = $(DOCKER_COMPOSE_DEV) exec -w /var/www www

docker-start: ## Start the project
	$(DOCKER_COMPOSE_DEV)  up --build -d

docker-stop: ## Stop the project
	$(DOCKER_COMPOSE_DEV) stop

docker-kill: ## Destroy the project
	$(DOCKER_COMPOSE_DEV) kill
	$(DOCKER_COMPOSE_DEV) down 	

back-clear-cache: ## Clear the cache
	$(EXEC_BACK) bin/console c:c

npm-run-watch: ## Update files JS and CSS
	$(EXEC_BACK) npm run watch		

back-unit-test: ## Launch unit tests
	$(EXEC_BACK) bin/phpunit

phpstan-quality: ## phpstan tools
	$(EXEC_BACK) vendor/bin/phpstan analyse		