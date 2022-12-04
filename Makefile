.PHONY: build
build:
	docker build -t erighetto/comuni-italiani-php:latest .

.PHONY: update
update:
	docker run --rm -t -v "${PWD}/data.json:/app/data.json" -v "${PWD}/update_at.txt:/app/update_at.txt" erighetto/comuni-italiani-php php ./bin/minicli update
	date '+%F %H:%M %Z' >| update_at.txt