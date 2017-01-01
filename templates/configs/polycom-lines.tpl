{section name=i loop=$data}
<?xml version=.1.0. encoding=.UTF-8. standalone=.yes.?>
<reginfo>
<reg
reg.1.displayName="{$data[i].extension}"
reg.1.address="{$data[i].extension}"
reg.1.label="{$data[i].extension}"
reg.1.auth.userId="{$data[i].extension}"
reg.1.auth.password="{$data[i].password}"
reg.1.lineKeys="2"
/>
</reginfo>
{/section}
