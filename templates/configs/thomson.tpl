{section name=i loop=$data}
[sys]
config_sn=200402190005

[sip]
RegisterServerMP1=192.168.1.200
ProxyServerMP1=192.168.1.200
ServiceDomainMP1=192.168.1.200
TEL1Number={$data[i].extension}
DisplayName1={$data[i].extension}
regid1={$data[i].extension}
regpwd1={$data[i].password}

{/section}
