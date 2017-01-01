<ul id="maintab">
{section name=i loop=$pages}
<li {if $pages[i].is_selected eq '1'} class="selected" {/if}><a href="{$pages[i].page}"><img width="16" height="16" align="Texttop" border="0" src="images/{$pages[i].image}">{$pages[i].name}</a></li>
{/section}
</ul>
<div id="tabcontent" class="clearfix"><ul>
{if $selected eq 'extensions_list'}
<li class="selected"><a href="extensions.php">Εσωτερικά</a></li>
{else}
<li><a href="extensions.php">Εσωτερικά</a></li>
{/if}
{if $selected eq 'group_list'}
<li class="selected"><a href="groups.php">Ομάδες κλήσεων</a></li>
{else}
<li><a href="groups.php">Ομάδες κλήσεων</a></li>
{/if}
{if $selected eq 'did_list'}
<li class="selected"><a href="did.php">Διεπιλογικοί Αριθμοί</a></li>
{else}
<li><a href="did.php">Διεπιλογικοί Αριθμοί</a></li>
{/if}
</ul>
</div>
</div>
