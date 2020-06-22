.. _installation:

Installation
============

This package does not yet have a Symfony Flex recipe. Installation steps must be done manually.

Default configuration files will be copied in the `dev` environment except for the file defining
the services.

Step 1
~~~~~~

The easiest way to install it is through Composer_

.. code-block:: bash

    composer require ecphp/eu-login-bundle

Step 2
~~~~~~

Make sure that the bundle is enabled in `config/bundles.php`.

You should see a line that looks like the following:

.. code-block:: php

    EcPhp\\EuLoginBundle\\EuLoginBundle::class => ['all' => true],

Step 3
~~~~~~

As this package depends on the package `ecphp/cas-bundle`, you will need to copy
some configuration files from that package first.

.. code-block:: bash

    cp -ar vendor/ecphp/cas-bundle/Resources/config/* config/

Then, copy the configuration files from the bundle `ecphp/eu-login-bundle` in your application

.. code-block:: bash

    cp -ar vendor/ecphp/eu-login-bundle/Resources/config/* config/

.. warning:: It is important to play those commands in the proper order.

Step 4
~~~~~~

Edit the configuration file `config/packages/dev/cas_bundle.yaml` and make the necessary changes to fit your needs.

See more on the dedicated :ref:`configuration` page.

Step 5
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

.. _Composer: https://getcomposer.org
.. _the Symfony documentation about security and Guard authentication: https://symfony.com/doc/current/security/guard_authentication.html
.. _the configuration reference: https://symfony.com/doc/current/reference/configuration/security.html
