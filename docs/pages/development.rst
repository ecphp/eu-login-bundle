.. _development:

Development
===========

In order to test efficiently, is to test the library against a real CAS server.

If you're not able to use one, the best is to work with a local CAS server.

If you want to setup your own local CAS server in less than 2 minutes,
use the repo `crpeck/cas-overlay-docker`_ and you'll have something working
really quickly.

Don't forget to setup the HTTPS certificates because the communication between
the CAS server and your application MUST be in HTTPS, and I haven't found a way
yet to disable this for testing purposes.

If you prefer to use your local machine, there are already `some documentation on Github`_.

If you want to test against `EU Login`_, make sure that your application respond on the ``localhost`` hostname, it's the
only domain for which it will work.
However, only basic authentication will work and it will not be possible to enable authentication with proxy because
the hostname ``localhost`` will not be accessible from the Internet.

Maintainers
-----------

See the `MAINTAINERS.txt`_ file.

Contributors
------------

See the `Github insights page`_.

.. _crpeck/cas-overlay-docker: https://github.com/crpeck/cas-overlay-docker
.. _some documentation on Github: https://apereo.github.io/cas/developer/Build-Process.html
.. _MAINTAINERS.txt: https://github.com/ecphp/eu-login-bundle/blob/master/MAINTAINERS.txt
.. _Github insights page: https://github.com/ecphp/eu-login-bundle/graphs/contributors
.. _EU Login: https://ecas.ec.europa.eu/cas/
