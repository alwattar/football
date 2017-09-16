<?php
$sec = $this->the_sec;
?>
<br/>
<a href="./new-nsec">back</a>
<form method="post" name="new-nsec-form">
    AR Name: <input name="ns_name" type="text" value="<?php echo $sec->ns_name ?>"/><br/>
    EN Name:  <input name="ns_name_en" type="text" value="<?php echo $sec->ns_name_en ?>"/><br/>
    TR Name:  <input name="ns_name_tr" type="text" value="<?php echo $sec->ns_name_tr ?>"/><br/>
    <button>Save</button>
</form>
