# Composer Dotenv

Whenever Composer is activated in a project with a `.env` file, this plugin will use the
[`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) library to load this configuration
file into the PHP envrionment.

This plugin works well with `incenteev/composer-parameter-handler`
[which allows you to map environment variables to parameters.][incenteev]. *This* plugin runs when composer
is activated, and ParameterHandler finds that configuration in the environment after your dependencies
have been installed or updated.

[phpdotenv]: https://github.com/vlucas/phpdotenv
[incenteev]: https://github.com/Incenteev/ParameterHandler#using-environment-variables-to-set-the-parameters

## Example

If your `.env` file contains:

```
SECRET_FOR_ME="123456"
```

And your `composer.json` file contains:

```json
{
    "require": {
        "incenteev/composer-parameter-handler": "~2.0",
        "bangpound/composer-dotenv": "~1.0@dev"
    },
    "extra": {
        "incenteev-parameters": {
            "file": "app/config/parameters.yml",
            "env-map": {
                "secret": "SECRET_FOR_ME"
            }
        }
    },
    "scripts": {
        "post-install-cmd": [
            "Incenteev\\ParameterHandler\\ScriptHandler::buildParameters"
        ],
        "post-update-cmd": [
            "Incenteev\\ParameterHandler\\ScriptHandler::buildParameters"
        ]
    },
}
```

Then after running composer update or install, your `app/config/parameters.yml`
will contain:

```yaml
# This file is auto-generated during the composer install
parameters:
    secret: 123456
```

## Settings

In the `extra` property of the root repository, specify the