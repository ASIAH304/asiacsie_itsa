<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</div>
<footer class="footer text-center">
	<p><?php echo $this->site_name;?> © Jingxun Lai. All rights reserved.</p>
</footer>
<?php echo $this->assets->show_js(true);?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//120.108.113.38/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 4]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//120.108.113.38/piwik/piwik.php?idsite=4" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html>
