.. _installation:

Installation
============

This package does not yet have a Symfony Flex recipe. Installation steps must be done manually.

Step 1
~~~~~~

The easiest way to install it is through Composer_

.. code-block:: bash

    composer require drupol/eulogin-bundle

Step 2
~~~~~~

Edit the file `config/bundles.php` and add the line `drupol\\EuloginBundle\\EuloginBundle::class => ['all' => true],`.

Step 3
~~~~~~

Recursively copy the content of the `Resources/config` folder in `config/` folder.

.. code-block:: bash

    cp -ar vendor/drupol/eulogin-bundle/Resources/config/* config/

Step 4
~~~~~~

Edit the configuration file `config/packages/eulogin_cas.yaml` and make the necessary changes to fit your needs.

See more on the dedicated :ref:`configuration` page.

.. _Composer: https://getcomposer.org
