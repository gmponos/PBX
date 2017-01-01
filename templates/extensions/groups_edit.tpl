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

<table cellspacing="1" class="form"> 
<tr><td class="left">Όνομα Ομάδας</td>
<td class="right">{$group_name}<br></td></tr>
<tr><td class="left">Εσωτερικός Αριθμός</td>
<td class="right">{$group_number}</td></tr>
<tr><td colspan=2 class="left">&nbsp</td></tr>
<form id="add_member" style="margin: 10px;" method = "POST" action="groups_edit.php">
<td class="left"><input type="text" name="group_member" /></td><td><input type="submit" class="go" value="Προσθήκη Μέλους" /></td></tr>
<input type="Hidden" name="group_number" value="{$group_number}">
<input type="Hidden" name="group_name" value="{$group_name}">
<input type="Hidden" name="operation" value="add_member">
</form>
<tr><td colspan=2 class="left">&nbsp</td></tr>
<tr><td colspan=2 class="right">Μέλη Ομάδας</td></tr>
{section name=i loop=$data}
<tr><td class="right">{$data[i].member} - {$data[i].assigned_name}</td><td class="right"> <form id="within_table" name=del_{$data[i].member} method="POST" action="groups_edit.php" onclick="if (confirm('Θέλετε να διαγράψετε το εσωτερικό από την ομάδα;')) return true; else return false;">
            <input type="Hidden" name="group_number" value="{$group_number}">
            <input type="Hidden" name="group_name" value="{$group_name}">
            <input type="Hidden" name="group_member" value="{$data[i].member}">
            <input type="Hidden" name="operation" value="delete_member">
            <input type="image" src='images/del-16.png' title="Πατήστε για διαγραφή" /></form></td>
            </form>
</td></tr>
{/section}
</table>
</div>
