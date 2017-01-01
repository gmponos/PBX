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

<form id="adduser" style="margin: 10px;" method = "POST" action="extensions_edit.php">
<table cellspacing="1" class="form"> 
<tr><td class="left">Εσωτερικός Αριθμός</td>
<td class="right"><input type="text" name="extension" value="{$extension}" /><br></td></tr>
<tr><td class="left">Κωδικός SIP</td>
<td class="right"><input type="text" name="password" value="{$password}" disabled="disabled" /><br></td></tr>
<tr><td class="left">Αριθμός PIN</td>
<td class="right"><input type="text" name="pin" value="{$pin}" /><br></td></tr>
<tr><td class="left">Όνομα</td>
<td class="right"><input type="text" name="name" value="{$name}" /><br></td></tr>
<tr><td class="left">Επώνυμο</td>
<td class="right"><input type="text" name="surname" value="{$surname}" /><br></td></tr>
<tr><td class="left">Αναγνώριση κλήσης</td>
<td class="right"><input type="text" name="cid" value="{$cid}" /><br></td></tr>
<tr><td class="left">E-mail</td>
<td class="right"><input type="text" name="email" value="{$email}" /><br></td></tr>
<tr><td class="left">Τμήμα</td>
<td class="right"><SELECT name="extension_group"> 
{section name=i loop=$groups}
{html_options values=$groups[i].callgroup output=$groups[i].group_description selected="$extension_group"}
{/section}</td></tr>
<tr><td class="left">Ανάληψη Κλήσεων</td>
<td class="right">
{section name=i loop=$groups}
{if $groups[i].callgroup ne '-1'}
	{if $groups[i].is_pickgroup eq '0'}
		<input type="checkbox" name="pickupgroups[]" value="{$groups[i].callgroup}">{$groups[i].group_description}<br/>
	{else}
		<input type="checkbox" name="pickupgroups[]" value="{$groups[i].callgroup}" checked="yes"/>{$groups[i].group_description}<br/>
	{/if}
{/if}
{/section}</td></tr>
<tr><td class="left">Πρόσβαση κλήσεων</td>
<td class="right"><SELECT name="extension_context"> 
{section name=i loop=$contexts}
{html_options values=$contexts[i].context_id output=$contexts[i].context_description selected="$extension_context"}
{/section}</td></tr>
<tr><td class="left">Τύπος Συσκευής</td>
<td class="right"><SELECT id="device" name="device">
{section name=i loop=$data}
{html_options values=$data[i].model_id output=$data[i].device selected="$device"}
{/section}</td></tr>
<tr id="mac-address"><td class="left">Διεύθυνση MAC</td>
<td class="right"><input type="text" name="device_mac" value="{$device_mac}" /><br></td></tr>
<tr><td class="left">Ηχογράφηση κλήσεων</td>
{if $call_recording eq 't'}
<td class="right"><input type="radio" name="call_recording" value="t" checked="yes"/>Ναί<input type="radio" name="call_recording" value="f"/>Όχι</td></tr>
{else}
<td class="right"><input type="radio" name="call_recording" value="t"/>Ναί<input type="radio" name="call_recording" value="f" checked="yes"/>Όχι</td></tr>
{/if}
<tr><td class="left">Αναμονή κλήσεων</td>
{if $cw eq 't'}
<td class="right"><input type="radio" name="cw" value="t" checked="yes"/>Ναί<input type="radio" name="cw" value="f"/>Όχι</td></tr>
{else}
<td class="right"><input type="radio" name="cw" value="t"/>Ναί<input type="radio" name="cw" value="f" checked="yes"/>Όχι</td></tr>
{/if}
<tr><td class="left">Δημιουργία αρχείων provisioning</td>
{if $gen_config eq 't'}
<td class="right"><input type="radio" name="gen_config" value="t" checked="yes"/>Ναί<input type="radio" name="gen_config" value="f"/>Όχι</td></tr>
{else}
<td class="right"><input type="radio" name="gen_config" value="t"/>Ναί<input type="radio" name="gen_config" value="f" checked="yes"/>Όχι</td></tr>
{/if}
{if $selected eq 'edit'}
<input type="Hidden" name="id" value="{$user_id}">
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Αλλαγή" />
<input type="submit" name="delete" value="Διαγραφή" class="go_red" onclick="if (confirm('Θέλετε να διαγράψετε το εσωτερικό {$data[i].extension};')) return true; else return false;"/></td></tr>
{else}
<tr><td colspan=2 align="center"><input type="submit" class="go" value="Προσθήκη" /></td></tr>
{/if}
</table>
</form>
</div>
