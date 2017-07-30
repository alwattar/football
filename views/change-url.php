<div id="player"></div>
<script>
 var player = jwplayer('player').setup({
     width: "100%",
     height: "480",
     autostart: true,
     file: "<?php echo $this->s_url ?>"
 });
</script>
