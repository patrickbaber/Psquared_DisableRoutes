Psquared_DisableRoutes
======================

An extension for disabling unused routes in Magento.

How
---

After installation there are two new configuration options in the Magento admin panel under System -> Configuration ->
General -> Web -> Disable Routes. The first option is for enabling/disabling the main task of the extension. The second
option is a Regular Expression for defining which routes you want to disable. The default value disables the following
routes:

* catalogsearch/term/popular
* catalog/seo_sitemap/category
* tag/list
