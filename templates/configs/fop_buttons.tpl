{include file='./buttons.cfg.tpl'}

{section name=y loop=$q_data}
[QUEUE/{$q_data[y].group_number}]
type=queue
label={$q_data[y].group_name}

{/section}

{section name=i loop=$data}
[SIP/{$data[i].extension}]
type=extension
extension={$data[i].extension}
{if $data[i].callerid ne ''}
label={$data[i].callerid}
{else}
callerid={$data[i].extension}
{/if}
context={$data[i].context}

{/section}
