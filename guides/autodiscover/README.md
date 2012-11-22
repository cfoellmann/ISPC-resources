# ISPC-resources > Guides
## Autodiscover (Outlook) + Autoconfig (Thunderbird)

### Intro

### Placeholders
* my-service.com = The domain you run your "autodiscover" service on
* my-mail.com = The domain you want to activate autodiscover and autoconfig for

### ISPConfig Config (Apache HTTPD)
* Add domain: `discover.my-service.com`

* Add Sites > Website with the following settings:

`Domain: discover.my-service.com`

`Auto-Subdomain = NONE`

`Options > Apache Directives:`

```
ServerAlias autoconfig.* autodiscover.*
RewriteEngine On
RewriteCond %{HTTPS} !on [OR]
RewriteCond %{HTTP_HOST} !^discover\.my-service\.com$
RewriteRule ^(.*)$ https://discover.my-service.com$1 [R=301]
```

Optional:
* Do what you do to make the website (discover.my-service.com) work with SSL

### DNS Config
* for my-mail.com set

```
CNAME autodiscover.my-mail.com -> discover.my-service.com
CNAME autoconfig.my-mail.com -> discover.my-service.com
```

### XML files
* change `autodiscover.xml` and `config-v1.1.xml` to meet your configuration

* copy `autodiscover.xml` to `https://discover.my-service.com/autodiscover/autodiscover.xml`
* copy `config-v1.1.xml` to `https://discover.my-service.com/mail/config-v1.1.xml`

### Credits
Tutorial by [Antal Delahaije (admxnl)](http://bugtracker.ispconfig.org/index.php?do=details&task_id=2152#comment3208)
Edited by [Christian Foellmann (cfoellmann)](https://github.com/cfoellmann)