<ul id="maintab">{section name=i loop=$pages}<li {if $pages[i].is_selected eq '1'} class="selected"{/if}>
<a href="{$pages[i].page}"><img width="16" height="16" align="Texttop" border="0" src="images/{$pages[i].image}">{$pages[i].name}
</a></li>
{/section}

</ul>
<div id="tabcontent" class="clearfix"><ul>
{if $selected eq 'list'}
<li class="selected"><a href="cdr.php?action=start">Έγγραφες</a></li>
{else}
<li><a href="cdr.php?action=start">Έγγραφες</a></li>
{/if}
{if $selected eq 'stats'}
<li class="selected"><a href="cdr.php?action=stats">Στατιστικά Χρήσης</a></li>
{else}
<li><a href="cdr.php?action=stats">Στατιστικά Χρήσης</a></li>
{/if}
</ul>
</div>
</div>
<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="inc/libs/jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
  <script type="text/javascript" src="inc/libs/jscalendar/calendar.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/lang/calendar-el.js"></script>
  <script type="text/javascript" src="inc/libs/jscalendar/calendar-setup.js"></script>

<div id="mainContent">
   <table border=0 width=100%><tr><td width=1% valign="top">
      <div class="contentbox">
     <table class="cdrmenu" border=0>
	<tr><td class="hed" colspan=3 align=left>Χρονική Περίοδος</tr></td>
        <form name=search method = "POST" action = "stats.php">
	<tr><td align=left>Από: </td><td><input type="text" name="sdate" id="s_date" size=9 readonly="1" value="{$sdate}"/></td><td><img src="inc/libs/jscalendar/img.gif" id="s_date_trigger" style="cursor: pointer; border: 0px solid red;" title="Επιλογή Αρχικής Ημερομηνίας" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td> </tr>
	{literal}
	<script type="text/javascript">
    	Calendar.setup({
        inputField     :    "s_date",     
        ifFormat       :    "%d-%m-%Y",      
        button         :    "s_date_trigger",  
        align          :    "Bl",           
        singleClick    :    true,
        firstDay       :    1,
        weekNumbers    :    false});
	calendar.setDate(new Date());
       </script>
	{/literal}
	<tr><td align=left >Έως:</td><td> <input type="text" name="edate" id="e_date" size=9 readonly="1" value="{$edate}"/></td><td><img src="inc/libs/jscalendar/img.gif" id="e_date_trigger" style="cursor: pointer; border: 0px solid red;" title="Επιλογή Τελικής Ημερομηνίας" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td> </tr>
	{literal}
	<script type="text/javascript">
    	Calendar.setup({
        inputField     :    "e_date",     
        ifFormat       :    "%d-%m-%Y",      
        button         :    "e_date_trigger",  
        align          :    "Bl",           
        singleClick    :    true,
        firstDay       :    1,
        weekNumbers    :    false});
       </script>
	{/literal}
      <tr><td align=center colspan=3><input class="go" type="submit" value="Εκτέλεση" title="Πατήστε για εκτέλεση" border="0" /> </td> </tr>
        </form>
      </tr>
     </table>
	</div>
   <td width=99%  valign="top">
	 {if $display > 0}
	 {php}
	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-out.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 {/php}
	</br>
	 {php}
	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-ext-out.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 {/php}
	</br>
	 {php}
	 $url = "http://" . $_SERVER["SERVER_ADDR"] . "/stats-chart-ext-in.php?do&sdate=" . $_SESSION['sdate']. "&edate=" .$_SESSION['edate'];
	 include_once 'inc/php-ofc-library/open_flash_chart_object.php';
	 open_flash_chart_object( 800, 250, "$url", false );
	 {/php}
	 {/if}
    </table>
	</td</tr></table>
</div>

  </td>
  </tr>
  </table>
<br/>
</div>


