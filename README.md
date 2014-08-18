# Ohanzee Components

Ohanzee is a set of PHP components that are dependency free, PSR compatible, and well documented. The design is guided by SOLID, DRY, and KISS (the SDK) philosophies.

Many were originally part of the Kohana PHP Framework.

# Testing

```
composer install --dev
phpunit --bootstrap=vendor/autoload.php tests
```

to set the database host, user, or password:

```
PHPUNIT_TEST_HOSTNAME=myhostname PHPUNIT_TEST_USERNAME=bob PHPUNIT_TEST_PASSWORD=secret \
  phpunit --bootstrap=vendor/autoload.php tests
```
