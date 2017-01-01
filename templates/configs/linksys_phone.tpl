<flat-profile>
{section name=i loop=$data}
  <Display_Name_{$data[i].line}_                  ua="na"> {$data[i].extension}
  </Display_Name_{$data[i].line}_>

  <User_ID_{$data[i].line}_                       ua="na"> {$data[i].extension}
  </User_ID_{$data[i].line}_>

  <Password_{$data[i].line}_                      ua="na"> {$data[i].password}
  </Password_{$data[i].line}_>

  <Use_Auth_ID_{$data[i].line}_                   ua="na"> No
  </Use_Auth_ID_{$data[i].line}_>

  <Auth_ID_{$data[i].line}_                       ua="na">
  </Auth_ID_{$data[i].line}_>
{/section}
</flat-profile>
