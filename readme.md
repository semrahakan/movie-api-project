This is a Symfony Flex project with Docker.
When a search term and year is given a movie API is called and
the result, which contains title, year, director and rating,
is returned.

**To run the project;**
docker-compose up

**To run unit tests**
vendor/bin/codecept run unit

**To run functional tests**
vendor/bin/codecept run functional