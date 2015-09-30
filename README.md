<h1 id="icinga2-api">icinga2-api</h1>

<p><strong>Add and remove host object</strong></p>

<p>Installation: <br>
Access to icinga2 server, then execute following commands</p>

<pre><code>mkdir /var/www/html/
cd /var/www/html/
git clone https://github.com/ugurengin/icinga2-api.git
mv icinga2-api api
</code></pre>

<p>In simply to add a new host object using http request on any remote machine, you can either use curl or base UI php page.</p>

<p>With Curl:</p>

<p><code>curl -X GET -s "http://icinga2-url/api/add_host.php?hostname=ugurengin.com&amp;displayname=ugur-web-site&amp;hostaddr=ugurengin.com&amp;product=hede&amp;os=Linux&amp;Add=Submit"</code></p>

<p>After execute command above,so you may see that created a file which contains configuration parameteres in repository.d/hosts folder of icinga2.</p>

<pre><code>object Host "ugurengin.com" {
import "generic-api-host" 
address = "ugurengin.com" 
check_command = "hostalive"
display_name = "ugur-web-site"
vars.os = "Linux" 
vars.product = "hede"
} 
</pre></code>

To get it if really host is added as properly after curl execution, run command below or look at the icinga2 UI.</p>

<pre><code>icinga2 repository host list|grep ugur
Host 'ugurengin.com'
</code></pre>

<p>Special note that if you correlate all base services with "vars.os=Linux" tag, so related services will be integrated with added host.</p>

<p><strong>Tesekkurler, Thanks, Spasiba, Dekuji</strong></p>
