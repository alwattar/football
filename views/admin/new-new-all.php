<br/>
<a href=".">home</a> | <a href="./new-new">create new</a>
<br/>
<p>All News: </p>
<?php foreach($this->news as $new){ ?>
    NEW ar TITLE => <?php echo $new->n_title_ar ?>
    <br/>
    NEW en TITLE => <?php echo $new->n_title_en ?>
    <br/>
    NEW tr TITLE => <?php echo $new->n_title_tr ?>
    <br/>
    NEW URL ar TITLE => <?php echo $new->n_title_url_ar ?>
    <br/>
    NEW URL tr TITLE => <?php echo $new->n_title_url_tr ?>
    <br/>
    NEW URL en TITLE => <?php echo $new->n_title_url_en ?>
    <br/>
    NEW USER ID => <?php echo $new->n_user ?>
    <br/>
    NEW DATE => <?php echo $new->n_date ?>
    <br/>
    NEW POSTED TIME => <?php echo $new->n_timestamp ?>
    <br/>
    <a href="?edit_new=<?php echo $new->n_id ?>">EDIT</a> | <a href="?del_new=<?php echo $new->n_id ?>">DELETE</a>
    <br/>
    =======
    <br/>
<?php } ?>
