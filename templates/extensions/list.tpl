{if $selected eq 'extensions_list'}
<div id="mainContent">

<h2  class='title'><a href="extensions_edit.php" >Προσθήκη νέου εσωτερικού </a></h2>

{if $info ne ''}
<div id="info" class="info">
{$info}
</div>
{/if}

      <table class="kold">
       <tr>
        <td class="hed">Εσωτερικό</td>
        <td class="hed">Χρήστης</td>
        <td class="hed">Email</td>
        <td class="hed">Πρόσβαση</td>
        <td class="hed">Τμήμα</td>
        <td class="hed">Τύπος συσκευής</td>
        <td class="hed">Mac Address</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
        <td class="hed" style="width: 20px;">&nbsp;</td>
      </tr>
{section name=i loop=$data}
        <tr class="{cycle values="odd,even"}">
            <td align=center>{$data[i].extension}</td>
            <td align=center>{$data[i].name}</td>
            <td align=center>{$data[i].email}</td>
            <td align=center>{$data[i].context}</td>
            <td align=center>{$data[i].group}</td>
            <td align=center>{$data[i].device}</td>
            <td align=center>{$data[i].mac}</td>
	    {if $data[i].fwd_target eq ''}
            <td align=center>
	    <form id="within_table" name=fwd_{$data[i].extension} method="POST" action="forwardings.php">
            <input type="Hidden" name="extension" value="{$data[i].extension}">
            <input type="Hidden" name="target" value="{$data[i].fwd_target}">
            <input type="Hidden" name="condition" value="{$data[i].fwd_condition}">
            <input type="Hidden" name="timeout" value="{$data[i].fwd_timeout}">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/redirect_off.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
	    {else}
            <td align=center>
            <form id="within_table" name=fwd_{$data[i].extension} method="POST" action="forwardings.php">
            <input type="Hidden" name="extension" value="{$data[i].extension}">
            <input type="Hidden" name="target" value="{$data[i].fwd_target}">
            <input type="Hidden" name="condition" value="{$data[i].fwd_condition}">
            <input type="Hidden" name="timeout" value="{$data[i].fwd_timeout}">
            <input type="Hidden" name="operation" value="edit">
            <input type="image" src='images/redirect_on.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
	    {/if}
            <td align=center>
            <form id="within_table" name=edit_{$data[i].user_id} method="POST" action="extensions_edit.php">
            <input type="Hidden" name="id" value="{$data[i].user_id}">
            <input type="image" src='images/edit-16.png' title="Πατήστε για επεξεργασία" />
            </form>
            </td>
            <td align=center>
	    <form id="within_table" name=del_{$data[i].user_id} method="POST" action="extensions.php?action=delete" onclick="if (confirm('Θέλετε να διαγράψετε το εσωτερικό;')) return true; else return false;">
            <input type="Hidden" name="id" value="{$data[i].user_id}">
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
