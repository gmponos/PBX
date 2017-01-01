{section name=i loop=$data}
exten => {$data[i].extension},hint,SIP/{$data[i].extension}
exten => _{$data[i].extension},1,Macro(dialLocalExtension,{$data[i].extension})

{/section}
