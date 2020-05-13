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

    composer require ecphp/eu-login-bundle:^1

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

Read the `ecphp/cas-bundle documentation`_ to have more information on how to enable a firewall and protect your
application.

.. _Composer: https://getcomposer.org
.. _ecphp/cas-bundle documentation: https://cas-bundle.readthedocs.io/en/latest/pages/installation.html
