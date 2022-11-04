.PHONY: build
build:
	docker build -t erighetto/comuni-italiani-php:latest .

.PHONY: update
update:
	docker run --rm -it -v "${PWD}:/app" erighetto/comuni-italiani-php php ./bin/minicli update
	date '+%F %H:%M %Z' >| update_at.txt