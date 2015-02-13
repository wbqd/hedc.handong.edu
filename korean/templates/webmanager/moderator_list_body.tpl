<p /><span class="cattitle">Moderator List</span> 
<table width="90%" cellpadding="2" cellspacing="1" border="0"> 
<tr> 
        <th>User ID</th> 
        <th>User Name</th> 
        <th>Post Count</th> 
        <th>Rank Title</th> 
</tr> 
<!-- BEGIN moderator_row --> 
<tr> 
        <td align="center">{moderator_row.USER_ID}</td> 
        <td>{moderator_row.USERNAME}</td> 
        <td align="right">{moderator_row.USER_POSTS}</td> 
        <td align="center">{moderator_row.RANK_TITLE}</td>
        <td align="center">{moderator_row.CURRENT_USER}</td> 
</tr> 
<!-- END moderator_row --> 
</table> 
<form action="moderator_list.php" method="post" id="my_status">
<input type="text" name="cf_test" /><input type="submit" value="gogo" class="button2" />
</form>
<span class="copyright">Copyright &copy; <a href="http://www.phpbbdoctor.com" class="copyright">phpBB Doctor</a>. 
<p />