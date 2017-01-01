{section name=i loop=$did_data}

{if $did_data[i].type eq 'extension'}
exten => _{$did_data[i].did_number},1,Set(CDR(direction)=IN)
exten => _{$did_data[i].did_number},n,Macro(dialDID,{$did_data[i].did_type_data})
exten => _{$did_data[i].did_number},n,hangup

{/if}
{if $did_data[i].type eq 'group'}
exten => _{$did_data[i].did_number},1,Set(CDR(direction)=IN)
exten => _{$did_data[i].did_number},n,queue{literal}({/literal}$did_data[i].did_type_data}{literal}){/literal}
exten => _{$did_data[i].did_number},n,hangup

{/if}
{if $did_data[i].type eq 'fax'}
exten => _{$did_data[i].did_number},1,goto(faxes,{$did_data[i].did_number},1)
exten => _{$did_data[i].did_number},n,hangup

{/if}
{/section}
