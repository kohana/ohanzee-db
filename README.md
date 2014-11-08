# Ohanzee Components

Ohanzee is a set of PHP components that are dependency free, PSR compatible, and well documented. The design is guided by SOLID, DRY, and KISS (the SDK) philosophies.

Many were originally part of the Kohana PHP Framework.

# Testing

```
composer install --dev
phpunit --bootstrap=vendor/autoload.php tests
```

The default database connection details are:

- hostname: localhost
- database: ohanzee
- username: ohanzee
- password: (empty)

These values can be modified by creating a `.env` file in the root of the project:

```ini
PHPUNIT_TEST_HOSTNAME=server
PHPUNIT_TEST_DATABASE=testing
PHPUNIT_TEST_USERNAME=jane
PHPUNIT_TEST_PASSWORD=likesblue
```

The `.env` file is a standard ini file and will be loaded using [dotenv](https://github.com/vlucas/phpdotenv).

Any of the parameters can also be passed directly on the commandline:

```
PHPUNIT_TEST_USERNAME=joe PHPUNIT_TEST_PASSWORD=likesgreen \
  phpunit --bootstrap=vendor/autoload.php tests
```
