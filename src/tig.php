<script src="src/script.js">	
</script>
<div class="logged" onClick="if (confirm('Se d&eacute;connecter ?')) { self.location.href='?deco'; }">
<?= $_SESSION['login'] ?>
</div>
<div class="contact">
Contact</div>
	<input type="text" id="propose" class="propose" onKeyDown="if (event.Code == 'Enter') { send_propose(document.getElementById('propose').value); }"/>
	<button onClick="send_propose(document.getElementById('propose').value);" class="submit">&gt;</button>
<div class="cs-loader" id="loading">
  <div class="cs-loader-inner">
    <label>	●</label>
    <label>	●</label>
    <label>	●</label>
    <label>	●</label>
  </div>
</div>
<script>
	refresh_posts();
	document.getElementById('loading').style.display='none';
</script>
<div id="posts">
	
</div>