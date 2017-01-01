{section name=i loop=$data}
[ account ]
path = /config/voip/sipAccount0.cfg
Enable = 1
Label = {$data[i].extension}
DisplayName = {$data[i].extension}
AuthName = {$data[i].extension}
UserName = {$data[i].extension}
password = {$data[i].password}
SIPServerHost = 10.10.2.1
SubsribeMWI = 0

[ DTMF ]
path = /config/voip/sipAccount0.cfg
DTMFInbandTransfer = 2

[ Message ]
path = /config/Features/Message.cfg
VoiceNumber0 = *98

[ memory12 ]
path = /config/vpPhone/vpPhone.ini
Line = 0
Value =
type =
PickupValue =
DKtype =
Label =

[ memory13 ]
path = /config/vpPhone/vpPhone.ini
Line = 0
Value =
type =
PickupValue =
DKtype =
Label =

[ memory14 ]
path = /config/vpPhone/vpPhone.ini
Line = 0
Value =
type =
PickupValue =
DKtype =
Label =

[ memory15 ]
path = /config/vpPhone/vpPhone.ini
Line =
Value =
type =
PickupValue =
DKtype =
Label =

[ memory16 ]
path = /config/vpPhone/vpPhone.ini
Line =
Value =
type =
PickupValue =
DKtype =
Label =

[ DialNow ]
path = /tmp/dialnow.xml
1 = 7x
2 = [2,8,6]xxxxxxxxx
3 = 5xxx

{/section}
