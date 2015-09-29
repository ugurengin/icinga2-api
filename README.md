# icinga2-api

Installation:
Access to icinga2 server, then execute following commands

########################################################
 mkdir /var/www/html/
 git clone https://github.com/ugurengin/icinga2-api.git
 mv icinga2-api api
########################################################

In simply to add a new host object using http request on any remote machine, you can either use curl or base UI php page.

With curl:
curl -X GET -s "http://icinga-url/api/add_host.php?hostname=ugurengin.com&displayname=ugur-web-site&hostaddr=ugurengin.com&product=hede&os=Linux&Add=Submit"

After execute command above,so you may see that created a file which contains configuration parameteres in repository.d/hosts folder of icinga2.

object Host "ugurengin.com" {
import "generic-api-host"
address = "ugurengin.com"
check_command = "hostalive"
display_name = "ugur-web-site"
vars.os = "Linux"
vars.product = "hede"
}

- To get it if really host is added as properly after curl execution, run command below or look at the icinga2 UI.

icinga2 repository host list|grep ugur
Host 'ugurengin.com'

- Special note that if you correlate all base services with "vars.os=Linux" tag, so related services will be integrated with added host.

######################################
 Teşekkürler, Thanks, Spasiba, Dekuji
######################################

