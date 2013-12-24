CCCEmailTemplateBundle
======================

Email template form type with Ajax (using jQuery) to populate a textarea field and list/insert/update/delete pages
to manage email templates in a Doctrine-managed database.  Highly experimental and subject to change.  Use at your own risk.

Installation
------------

### Add the package to your dependencies

``` json
{
    "require": {
        "ccc/email-template-bundle": "dev-master"
        ...
    }
}
```

### Register the bundle in your kernel

``` php
public function registerBundles()
{
    $bundles = array(
        // ...
        new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        new CCC\EmailTemplateBundle\EmailTemplateBundle(),
        // ...
    );
```

### Update your packages

``` bash
$ php composer.phar update
```

### Update your database schema

``` bash
$ php app/console doctrine:schema:update
```

### Add routes

``` yaml
# app/config/routing.yml
ccc_email_template:
    resource: "@CCCEmailTemplateBundle/Resources/config/routing.yml"
    prefix:   /
```

### Translations

If you wish to use default text provided in this bundle, you have to make
sure you have translator enabled in your config.

``` yaml
# app/config/config.yml

framework:
    translator: ~
```

Usage
-----
After populating database with some templates you can use by:

``` php
$builder
    ->add('email_template', 'email_template_select', array(
        'required' => false,
        'label' => 'email'
    ));
```
See /email-template/select for an example

Routes
------
Available in config/routing/emailtemplate.yml

* `/email-template/` - lists all templates available
* `/email-template/new` - create a new template
* `/email-template/{id}/show` - show the details of a template
* `/email-template/{id}/edit` - edit a template
* `/email-template/{id}/delete` - delete a template

