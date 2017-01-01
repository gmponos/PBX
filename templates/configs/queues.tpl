{section name=i loop=$q_data}
[{$q_data[i].group_number}]
music=default
strategy=ringall
eventwhencalled=yes
timeout=120
retry=1
wrapuptime=0
maxlen = 0
announce-frequency = 0
announce-holdtime = no
{section name=y loop=$q_data[i].members}member=>SIP/{$q_data[i].members[y].{$q_data[i].group_number}},0
{/section}

{/section}
