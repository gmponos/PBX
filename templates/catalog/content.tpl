<ul id="maintab">
{section name=i loop=$pages}
<li {if $pages[i].is_selected eq '1'} class="selected" {/if}><a href="{$pages[i].page}"><img width="16" height="16" align="Texttop" border="0" src="images/{$pages[i].image}">{$pages[i].name}</a></li>
{/section}
</ul>

<div id="tabcontent" class="clearfix"><ul>
{if $selected eq 'list'}
<li class="selected"><a href="catalog.php?action=list&search=">Λίστα</a></li>
{else}
<li><a href="catalog.php?action=list&search=">Λίστα</a></li>
{/if}
{if $selected eq 'add'}
<li class="selected"><a href="catalog.php?action=add">Προσθήκη</a></li>
{else}
<li><a href="catalog.php?action=add">Προσθήκη</a></li>
{/if}
</ul>
</div>
</div>
     {if $selected eq 'list'}
       <div id="mainContent">
 	<center>
      <table width=80%>
      <tr>
	<form name=search method = "GET" action = "catalog.php">
	<input type="Hidden" name="action" value="list">
        <td align=left>Εγγραφές: {$catalogList.first}-{$catalogList.last} από {$total_records}</td>
        <td align=right><input type="text" name="search" value="{$search}" size=40> 
	<input type="Submit" value="Αναζήτηση"> </td>
	</form>
      </tr>
      </table>

      <table class="kold">
       <tr>
        <td class="hed">&nbsp;</td> 
 <!--   <td class="hed">A/A</td>  -->
        <td class="hed" width=20%>Αριθμός</td>
        <td class="hed" width=45%>Όνομα</td>
        <td class="hed">Κλήσεις</td>
        <td class="hed">&nbsp;</td>
      </tr>

    {section name=i loop=$data}
        <tr>
	    <form name=editrec{$data[i].id} method = "POST" action = "catalog.php?action=list&search={$search}">
	    <input type="Hidden" name="id" value="{$data[i].id}">
              {if $data[i].src eq '0'}<td><img src="./images/ote.gif"></td>
              {/if}
              {if $data[i].src eq 'ote'}<td><img src="./images/ote.gif"></td>
              {/if}
              {if $data[i].src eq 'edit'}<td><img src="./images/person.png"></td>
              {/if} 
            <td align=center>{$data[i].phone}</td>
            <td align=center><input type="text" name="name" value="{$data[i].name}" size=45 </td>
            <td align=center>{$data2[i].calls}</td>
    <!--    <td align=center>{$data[i].id}</td> -->
            <td align=center> <input type="Submit" name="edit_rec" value="Αλλαγή"></></a></td>
        </tr>
	    </form>
    {/section}
    </table>
    {if $catalogList.page_total gt '1'}
	</br>
    <!-- {paginate_prev id=$myID class="pagenate"} {paginate_middle id=$myID class="pagenate" prefix=" " suffix="" format="page"} {paginate_next id=$myID class="pagenate"} -->
    Σελίδες: {paginate_middle id=$myID class="pagenate" prefix=" " suffix="" format="page"}
    {/if}

    </center>
    {/if}
     
 {if $selected eq 'add'}
       <div id="mainContent">
	    <form name=add_rec method = "POST" action="catalog.php?action=add">
	    <LABEL for="name">Όνομα: </LABEL>
            <input type="text" name="name" size=45>
	    <LABEL for="number">Αριθμός: </LABEL>
            <input type="text" name="number" size=45> 
            <input type="Submit" name="add_rec" value="Προσθήκη">
	    </form>
 {$validation}</br>
 {/if}

</br>
</div>
