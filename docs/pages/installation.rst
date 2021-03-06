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

Read the `ecphp/cas-bundle documentation`_ to have more information on how to enable a firewall and protect your
application.

.. _a Symfony Flex recipe: https://github.com/symfony/recipes-contrib/blob/master/ecphp/eu-login-bundle/2.0/manifest.json
.. _Composer: https://getcomposer.org
.. _ecphp/cas-bundle documentation: https://ecphp-cas-bundle.readthedocs.io/
.. _the Symfony documentation about security and Guard authentication: https://symfony.com/doc/current/security/guard_authentication.html
.. _the configuration reference: https://symfony.com/doc/current/reference/configuration/security.html
