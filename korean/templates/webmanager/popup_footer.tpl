</center>
<script language="Javascript" type="text/javascript">
<!--

function setCookie( name, value, expiredays ) 
    { 
        var todayDate = new Date(); 
        todayDate.setDate( todayDate.getDate() + expiredays ); 
        document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
        } 

function closeWin() 
{ 
        setCookie( "POP_{POP_ID}", "done" , 1); 
        self.close(); 
} 

{PRINT_QUESTION}

//-->
</script>
<!-- BEGIN switch_not_printable -->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">    
	<tr> 
		<td><hr /></td>
	</tr>
        <tr>
            <td align="right">
                <span class="genmed">
		<!--<input type="checkbox" name="Notice" value="checkbox" onClick="closeWin()">-->
		{NO_MORE_TODAY}
		&nbsp;<a href="javascript:window.close();">Ã¢´Ý±â</a>&nbsp;</span>
   	    </td>
        </tr>
    </table>
<!-- END switch_not_printable -->

</body>
</html>
