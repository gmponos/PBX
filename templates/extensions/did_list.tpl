{if $selected eq 'did_list'}
<div id="mainContent">

{if $info ne ''}
<div id="info" class="info">
{$info}
</div>
{/if}
      <table class="kold" style="width: 600px;">
       <tr>
        <td class="hed">Κεφαλικός αριθμός</td>
        <td class="hed">Διεπιλογικό Νούμερο</td>
        <td class="hed">Δρομολόγηση</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
      </tr>
{section name=i loop=$data}
        <tr class="{cycle values="odd,even"}">
            <td align=center>{$data[i].trunk}</td>
            <td align=center>{$data[i].did_number}</td>
	    {if $data[i].type eq 'extension'}
            <td align=center>Εσωτερικό: {$data[i].type_data}</td>
	    {/if}
		{if $data[i].type eq 'group'}		
            <td align=center>Ομάδα κλήσεων: {$data[i].type_data}</td>
		{/if}
	    {if $data[i].type eq 'fax'}		
            <td align=center>{$data[i].type_data}</td>
		{/if}
		{if $data[i].type eq ''}		
            <td align=center>&nbsp</td>
		{/if}
	    {if $data[i].type ne 'context'}
            <td align=center>
            <form id="within_table" name=edit_{$data[i].trunk}_{$data[i].did_number} method="POST" action="did_edit.php">
            <input type="Hidden" name="trunk" value="{$data[i].trunk}">
            <input type="Hidden" name="did_number" value="{$data[i].did_number}">
            <input type="Hidden" name="type" value="{$data[i].type}">
            <input type="Hidden" name="type_data" value="{$data[i].type_data}">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
 	    <td align=center>
            <form id="within_table" name=del_e_{$data[i].trunk}_{$data[i].did_number} method="POST" action="did.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε τη δρομολόγηση του διεπιλογικού;')) return true; else return false;">
            <input type="Hidden" name="trunk" value="{$data[i].trunk}">
            <input type="Hidden" name="did" value="{$data[i].did_number}">
            <input type="image" src='images/del-16.png' title="Πατήστε για διαγραφή" /></form></td>
            </form>
            </td>
	    {else}
	    <td>&nbsp;</td>
            <td>&nbsp;</td>
	    {/if}
        </tr>
{/section}
    </table>
</div>

{/if}
  </td>
  </tr>
  </table>
<br/>
</div>
