<ul id="maintab">
{section name=i loop=$pages}
<li {if $pages[i].is_selected eq '1'} class="selected" {/if}><a href="{$pages[i].page}"><img width="16" height="16" align="Texttop" border="0" src="images/{$pages[i].image}">{$pages[i].name}</a></li>
{/section}
</ul>
<div id="tabcontent" class="clearfix"><ul>
{if $selected eq 'moh'}
<li class="selected"><a href="settings.php?action=moh">Μουσική Αναμονής</a></li>
{else}
<li><a href="settings.php?action=moh">Μουσική Αναμονής</a></li>
{/if}
{if $selected eq 'various'}
<li class="selected"><a href="settings.php?action=various">Διάφορα</a></li>
{else}
<li><a href="settings.php?action=various">Διάφορα</a></li>
{/if}
</ul>
</div>
</div>

<div id="mainContent">
{if $selected eq 'moh'}
<form enctype="multipart/form-data" action="moh_upload.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
    Επιλέξτε αρχείο μουσικής: <input name="uploaded_file" type="file" />
    <input type="submit" value="Αποστολή" />
</form>
{section name=i loop=$data}
{$data[i]}
{/section}
{/if}
</div>
