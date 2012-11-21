# ISPC-resources > Guides
## Autodiscover (Outlook) + Autoconfig (Thunderbird)

### Intro

### Placeholders
* my-service.com = The domain you run your "autodiscover" service on
* my-mail.com = The domain you want to activate autodiscover and autoconfig for

### ISPConfig Config
1. Add domains:
    * autodiscover.my-service.com
    * autoconfig.my-service.com

2. Add Sites > Website:
    * Domain: autodiscover.my-service.com
    * Auto-Subdomain = NONE

3. Add Sites > Aliasdomain for website
    * Domain: autoconfig.my-service.com
    * Parent Website: autodiscover.my-service.com
    * Redirect Type: No redirect
    * Auto-Subdomain: NONE

Optional:
4. Do what you do to make the website work with SSL

### DNS Config
1. for my-mail.com set
    * CNAME autodiscover.my-mail.com -> autodiscover.my-service.com
    * CNAME autoconfig.my-mail.com -> autoconfig.my-service.com

### Webserver Config
#### Apache (HTTPD)

### Credits
Tutorial by [Antal Delahaije (admxnl)](http://bugtracker.ispconfig.org/index.php?do=details&task_id=2152#comment3208)