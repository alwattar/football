<?php
$nsections = $this->allNSections;
?>
<br/>
<a href=".">home</a> | <a href="./new-new">create a new</a>
<br/>
<br/>
<form method="post" name="new-nsec-form">
    AR Name: <input name="ns_name" type="text"/><br/>
    EN Name:  <input name="ns_name_en" type="text"/><br/>
    TR Name:  <input name="ns_name_tr" type="text"/><br/>
    <button>Create</button>
</form>
---------------
<br/>
<?php foreach($nsections as $sec){ ?>
    section AR Name: <?php echo $sec->ns_name ?> <br/>
    section EN Name: <?php echo $sec->ns_name_en ?> <br/>
    section TR Name: <?php echo $sec->ns_name_tr ?> <br/>
    section Time: <?php echo $sec->ns_time ?> <br/>
    <a href="<?php echo ADMIN_PATH ?>/new-nsec?edit_id=<?php echo $sec->ns_id ?>">Edit</a> | <a href="<?php echo ADMIN_PATH ?>/new-nsec?del_id=<?php echo $sec->ns_id ?>">DELETE</a>
    <br/>
    ====
    <br/>
<?php } ?>
