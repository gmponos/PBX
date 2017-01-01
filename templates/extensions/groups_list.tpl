{if $selected eq 'groups_list'}
<div id="mainContent">

<h2  class='title'><a href="groups_add.php" >Προσθήκη νέας ομάδας </a></h2>

{if $info ne ''}
<div id="info" class="info">
{$info}
</div>
{/if}

      <table class="kold">
       <tr>
        <td class="hed">Αριθμός</td>
        <td class="hed">Όνομα</td>
		<td class="hed">Ηχογράφηση</td>
        <td class="hed">Μέλη</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
      </tr>
{section name=i loop=$data}
        <tr class="{cycle values="odd,even"}">
            <td align=center>{$data[i].group_number}</td>
            <td align=center>{$data[i].group_name}</td>
            {if {$data[i].call_recording} eq 't'}
			<td align=center>ΝΑΙ</td>
            {else}
			<td align=center>OXI</td>
            {/if}
			<td align=center>{section name=y loop=$data[i].members} {$data[i].members[y].{$data[i].group_number}}{/section}</td>
            <td align=center>
            <form id="within_table" name=edit_{$data[i].group_number} method="POST" action="groups_edit.php">
            <input type="Hidden" name="group_number" value="{$data[i].group_number}">
            <input type="Hidden" name="group_name" value="{$data[i].group_name}">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
            <td align=center>
	    <form id="within_table" name=del_{$data[i].group_number} method="POST" action="groups.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε την ομάδα;')) return true; else return false;">
            <input type="Hidden" name="group" value="{$data[i].group_number}">
            <input type="image" src='images/del-16.png' title="Πατήστε για διαγραφή" /></form></td>
	    </form>
            </td>
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
