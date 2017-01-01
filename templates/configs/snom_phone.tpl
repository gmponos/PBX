<html>
<pre>
{section name=i loop=$data}
user_name{$data[i].line}!: {$data[i].extension}
user_pass{$data[i].line}!: {$data[i].extension}
user_host{$data[i].line}: 192.168.3.1
user_realname{$data[i].line}: {$data[i].extension}
{/section}
user_srtp1!: off
user_expiry1!: 600
</pre>
</html>
