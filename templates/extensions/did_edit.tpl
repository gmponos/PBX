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

<form id="adduser" style="margin: 10px;" method = "POST" action="did_edit.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Κεφαλικός αριθμός</td>
<td class="right">{$trunk}</td></tr>
<tr><td class="left">Διεπιλογικός Αριθμός </td>
<td class="right">{$did_number}</td></tr>
<tr><td class="left">Δρομολόγηση προς:</td>
<td class="right"><SELECT id="type" name="type">
{if $type eq 'extension'}
<option value="extension" selected="selected">Εσωτερικό</option>
<option value="group">Ομάδα κλήσεων</option>
<option value="fax">fax</option>
{/if}
{if $type eq 'fax'}
<option value="extension">Εσωτερικό</option>
<option value="group">Ομάδα κλήσεων</option>
<option value="fax" selected="selected">fax</option>
{/if}
{if $type eq 'group'}
<option value="extension">Εσωτερικό</option>
<option value="group" selected="selected">Ομάδα κλήσεων</option>
<option value="fax">fax</option>
{/if}
{if $type eq ''}
<option value="extension">Εσωτερικό</option>
<option value="group">Ομάδα κλήσεων</option>
<option value="fax">fax</option>
{/if}
<input type="text" name="type_data" value="{$type_data}" /></td></tr>
<input type="Hidden" name="operation" value="update">
<input type="Hidden" name="did_number" value="{$did_number}">
<input type="Hidden" name="trunk" value="{$trunk}"></td></tr>
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Αποθήκευση" /></td></tr>
</table>
</form>




</table>
</form>
</div>
