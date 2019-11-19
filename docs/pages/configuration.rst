.. _configuration:

Configuration
=============

Example of configuration file in `config/packages/eulogin_cas.yaml`:

.. code:: yaml

    cas:
      base_url: https://webgate.ec.europa.eu/cas
      protocol:
        login:
          path: /login
          allowed_parameters:
            - service
            - renew
            - gateway
        serviceValidate:
          allowed_parameters:
            - format
            - pgtUrl
            - renew
            - service
            - ticket
            - userDetails
          path: /serviceValidate
          default_parameters:
            userDetails: "true"
            format: XML
            pgtUrl: cas_bundle_proxy_callback
        logout:
          path: /logout
          allowed_parameters:
            - service
          default_parameters:
            service: homepage
        proxy:
          path: /proxy
          allowed_parameters:
            - targetService
            - pgt
        proxyValidate:
          path: /proxyValidate
          allowed_parameters:
            - format
            - pgtUrl
            - renew
            - service
            - ticket
            - userDetails
          default_parameters:
            userDetails: "true"
            format: XML
            pgtUrl: cas_bundle_proxy_callback