<div>
{if $error ne ''}
<div id="error" class="error" width=500px>
{$error}
</div>
{/if}

{if $info ne ''}
<div id="info" class="info">
{$info}
</div>
{/if}

<form id="addgroup" style="margin: 10px;" method = "POST" action="groups_add.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Όνομα Ομάδας</td>
<td class="right"><input type="text" name="group_name" value="{$group_name}" /><br></td></tr>
<tr><td class="left">Εσωτερικός Αριθμός</td>
<td class="right"><input type="text" name="group_number" value="{$group_number}" /><br></td></tr>
<tr><td class="left">Ηχογράφηση κλήσεων</td>
<td class="right"><input type="radio" name="call_recording" value="t" checked="yes"/>Ναί<input type="radio" name="call_recording" value="f"/>Όχι</td></tr>
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Προσθήκη" /></td></tr>
</table>
</form>
</div>
