FROMADDR=faxserver@evima.gr
FILETYPE=pdf

case "$CALLID4" in

{section name=i loop=$faxdata}
{$faxdata[i].did_number}{literal}){/literal} SENDTO={$faxdata[i].email};;
{/section}

esac
