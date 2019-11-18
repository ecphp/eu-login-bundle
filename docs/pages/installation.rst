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

Add the line `drupol\\EuloginBundle\\EuloginBundle::class => ['all' => true],` to `config/bundles.php` array.

Step 3
~~~~~~

Recursively copy the content of the `Resources` directory in `config/` folder.

See more on :ref:`configuration` page.

.. _Composer: https://getcomposer.org
