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

<form id="adduser" style="margin: 10px;" method = "POST" action="forwardings.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Εσωτερικό</td>
<td class="right">{$extension}</td></tr>
<tr><td class="left">Αριθμός εκτροπής</td>
<td class="right"><input type="text" name="target" value="{$target}" />
<tr><td class="left">Τύπος εκτροπής</td>
<td class="right"><SELECT id="condition" name="condition">
{if $condition eq 'CFA'}
<option value="CFA" selected="selected">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
{/if}
{if $condition eq 'CFU'}
<option value="CFA">Άμεση</option>
<option value="CFU" selected="selected">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
{/if}
{if $condition eq 'CFB'}
<option value="CFA">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB" selected="selected">Κατειλημμένο</option>
{/if}
{if $condition eq ''}
<option value="CFA">Άμεση</option>
<option value="CFU">Μη διαθέσιμο</option>
<option value="CFB">Κατειλημμένο</option>
{/if}
</td></tr>
<tr id="fwd_timeout" name="fwd_timeout"><td class="left">Μετά από (sec)</td>
<td class="right"><input type="text" name="timeout" value="{$timeout}" />
<input type="Hidden" name="operation" value="update">
<input type="Hidden" name="extension" value="{$extension}">
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Αποθήκευση"/><input type="submit" name="delete" value="Διαγραφή" class="go_red" onclick="if (confirm('Θέλετε να διαγράψετε την εκτροπή;')) return true; else return false;"/></td></tr>
</table>
</form>
</table>
</form>
</div>
