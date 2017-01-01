{section name=i loop=$data}
[{$data[i].extension}]
host=dynamic
type=friend
user={$data[i].extension}
secret={$data[i].password}
restrictcid=no
{if $data[i].callerid ne ''}
callerid="{$data[i].callerid}" <{$data[i].extension}>
{else}
callerid="{$data[i].extension}" <{$data[i].extension}>
{/if}
qualify=no
context={$data[i].context}
disallow=all
allow=alaw
directmedia=no
dtmfmode=auto
{if $data[i].cw eq 't'}
call-limit=20
{else}
call-limit=2
busy-limit=1
{/if}
trustrpid=yes
rpid_update=yes
setvar=OUTBOUND_{$data[i].recording}
{if $data[i].call_group ne '-1'}
callgroup={$data[i].call_group}
{/if}
{if $data[i].pickUpGroup ne ''}
pickupgroup={$data[i].pickUpGroup}
{/if}
accountcode={$data[i].extension}

{/section}
