.PHONY: update
update:
	docker container run --rm -v ${PWD}:/app/ php:8.1-cli php /app/bin/minicli update