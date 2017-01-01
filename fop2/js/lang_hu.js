var lang = new Object();

lang['incoming_call']      = 'Bejövő hívás';
lang['connecting_server']  = 'Kapcsolódás a szerverhez, próbálkozás sorszáma: ';

lang['from_queue']         = "Várakozólistából:";
lang['number']             = "Telefonszám:";
lang['name']               = "Név:";

lang['dial']               = 'Tárcsázz';
lang['transfer_vmail']     = 'Hangpostára';
lang['transfer_external']  = 'Transzfer a mobil';
lang['attendant_transfer'] = 'Operátorhoz';
lang['spy']                = 'Belehallgat';
lang['whisper']            = 'Belehallgat és belesuttog';
lang['pickup']             = "Hívásátvétel";
lang['hangup']             = 'Letesz';
lang['filter']             = 'Szűr';

lang['enter_sec_code']     = 'Bejelentkezés';
lang['exten']              = 'Mellék:';
lang['password']           = 'Jelszó:';

lang['confirm_hangup']     = 'Tényleg megszakít?';
lang['areyousure']         = 'Biztos?';
lang['yes']                = 'Igen';
lang['no']                 = 'Nem';

lang['paused']             = 'Szüneteltetve';
lang['set_information']    = 'Adatbeállítás';
lang['member_of']          = 'Ennek a csoportnak tagja: ';
lang['not_available']      = 'A rendszer pillanatnyilag nem elérhető';
lang['not_connect']        = 'Nem lehet a szerverhez kapcsolódni';
lang['one_moment']         = 'Kérlek várj';
lang['no_results']         = 'Nincs találat';

lang['toggle_lock']        = 'Konferencia lezárás/kinyitás';
lang['toggle_muteall']     = 'Összes felhasználó némítás ki/be';
lang['available']          = 'Elérhető';
lang['phonebook']          = 'Telefonkönyv';
lang['toggle_mute']        = 'Némítás ki/be';
lang['kick']               = 'Felhasználó kirúgása';
lang['record']             = 'Hívásrögzítés';
lang['presence_noti']      = 'Jelenlét értesítés';

lang['queues']             = 'Várakozósor';
lang['extensions']         = 'Mellékek';
lang['trunks']             = 'Fővonalak';
lang['conferences']        = 'Konferenciák';
lang['other']              = 'Egyéb';
lang['enter_state']        = 'Érték megadás';
lang['parkingslots']       = 'Parkolóhelyek';
lang['ringgroups']         = 'Ring Csoport';

lang['enter_reg_code']     = 'Írd be a regisztrációs kódot:';
lang['reg_code']           = 'Regisztrációs kód:';
lang['reg_name']           = 'Regisztráció név:';

lang['remove_member']      = 'Tag eltávolítása';
lang['remove_member_from'] = 'Eltávolítás innen: ';
lang['pause_member']       = 'Tag szüneteltetése';
lang['unpause_member']     = 'Tag szüneteltetés vége';
lang['add_member']         = 'Tag hozzáadása ide: ';
lang['pickup_call']        = 'Hívásátvétel';
lang['email_user']         = 'E-mail küldés';
lang['send_sms']           = 'SMS küldése';
lang['message']            = 'Üzenet:';
lang['sending']            = 'Küldés...';
lang['noResponse']         = 'Nincs válasz.';

lang['chat']               = 'Csevegés';
lang['notlogged']          = 'Felhasználó nincs bejelentkezve. Feljegyzés készítése.';
lang['me']                 = 'Én';
lang['clearchat']          = 'Csevegésablak ürítése';
lang['note']               = 'Feljegyzés';
lang['toggle_sound']       = 'Hang ki/be';
lang['says']               = 'azt mondja, hogy';

lang['agents']             = 'Ügynök:';
lang['calls']              = 'Várakozó hívások:';
lang['call_connected']     = 'Hívás csatlakoztatva ide:';
lang['changeDisplayType']  = 'Kijelzőtípus változtatása';

lang['voicemail']          = 'Hangposta';
lang['vmail_new']          = 'Új';
lang['vmail_old']          = 'Régi';
lang['vmail_work']         = 'Munkahelyi';
lang['vmail_family']       = 'Családi';
lang['vmail_friends']      = 'Barátok';
lang['vmail_number']       = 'Hívószám';
lang['vmail_date']         = 'Dátum';
lang['vmail_callerid']     = 'Hívásazonosító';
lang['vmail_duration']     = 'Eltelt idő';

lang['preferences']        = 'Beállítások';
lang['summary']            = 'Összegzés';
lang['detailed']           = 'Részletes';

lang['inactive_line']      = 'A %d. vonal nem aktív';
lang['inuse']              = '%d vonal van használatban';
lang['vmail_count']        = 'Üzenetek: új %d, régi %d';
lang['logout']             = 'Kijelentkezés';

lang['NOTONLINE']          = 'Felhasználó aktív';
lang['NOWONLINE']          = 'Felhasználó most online';

lang['prefSounds']         = 'Hangok';
lang['prefDisplay']        = 'Kijelző';

lang['labelSoundChat']     = 'Csevegés hangok';
lang['labelSoundQueue']    = 'Várakozólista hangok';
lang['labelSoundRing']     = 'Csörgés hangok';

lang['labelDisplayQueue']          = 'Alap várakozólista-nézet';
lang['labelDisplayDynamicLine']    = 'Dinamikus vonalkijelzés';
lang['labelDisplayNotifyDuration'] = 'Eltelt idő értesítés';
lang['labelDisplayLanguage']       = 'Nyelv';

lang['close']                      = 'Közeli';
lang['recordings']                 = 'Felvételek';
lang['cdrrecords']                 = 'Híváslista';

// Internationalization strings DATE
dateFormat.i18n = {
    dayNames: [
        "V", "H", "K", "Sze", "Cs", "P", "Szo",
        "Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat"
    ],
    monthNames: [
        "Jan", "Feb", "Már", "Ápr", "Máj", "Jún", "Júl", "Aug", "Szep", "Okt", "Nov", "Dec",
        "Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"
    ]
};
