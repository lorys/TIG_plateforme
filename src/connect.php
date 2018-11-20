<?php

	if (!isset($_GET['code']))
	{
?>
<div onClick="this.setAttribute('class', 'cs-loader'); self.location.href='https://api.intra.42.fr/oauth/authorize?client_id=ee2274db984d1904f03045dab4f61a3b97b2fa433f2b8e82a0206cc6fabe00fb&redirect_uri=http://localhost:8080/&response_type=code';" class="connect">
  <div class="cs-loader-inner">
    <label>	●</label>
    <label>	●</label>
    <label>	●</label>
    <label>	●</label>
  </div>
</div>
<?php
	}
?>