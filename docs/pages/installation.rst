.. _installation:

Installation
============

This package has `a Symfony Flex recipe`_ that will install configuration files for you.

Default configuration files will be copied in the `dev` environment.

Step 1
~~~~~~

The easiest way to install it is through Composer_

.. code-block:: bash

    composer require ecphp/eu-login-bundle

Step 2
~~~~~~

Edit the configuration file `config/packages/dev/cas_bundle.yaml` and make the necessary changes to fit your needs.

See more on the dedicated :ref:`configuration` page.

Step 3
~~~~~~

This is the crucial part of your application's security configuration.

Edit the security settings of your application by edition the file `config/packages/security.yaml`.

.. code-block:: yaml

    security:
        firewalls:
            main:
                anonymous: ~
                guard:
                    provider: eulogin
                    authenticators:
                        - cas.guardauthenticator

        access_control:
            - { path: ^/api, role: ROLE_CAS_AUTHENTICATED }
            - { path: ^/admin, role: ROLE_CAS_AUTHENTICATED }

This configuration example will trigger the authentication on paths starting
with `/api` or `/admin`, therefore make sure that at least such paths exists.

Feel free to change these configuration to fits your need. Have a look at
`the Symfony documentation about security and Guard authentication`_ and `the configuration reference`_.

.. _a Symfony Flex recipe: https://github.com/symfony/recipes-contrib/blob/master/ecphp/eu-login-bundle/2.0/manifest.json
.. _Composer: https://getcomposer.org
.. _the Symfony documentation about security and Guard authentication: https://symfony.com/doc/current/security/guard_authentication.html
.. _the configuration reference: https://symfony.com/doc/current/reference/configuration/security.html
