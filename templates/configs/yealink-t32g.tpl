{section name=i loop=$data}
[ cfg:/phone/config/voip/sipAccount0.cfg,account=1;reboot=1 ]
account.Enable = 1
account.Label = {$data[i].extension}
account.DisplayName = {$data[i].extension}
account.UserName = {$data[i].extension}
account.AuthName = {$data[i].extension}
account.password = {$data[i].password}
account.SIPServerHost = 10.10.2.1
account.SIPServerPort = 5060
account.SIPListenPort = 5060
account.Expire = 3600
account.UseOutboundProxy = 0
account.OutboundHost =
account.OutboundPort = 5060
account.EnableSTUN = 0
audio0.enable = 1
audio0.PayloadType = PCMA
audio0.priority = 1
audio0.rtpmap = 0
{/section}
