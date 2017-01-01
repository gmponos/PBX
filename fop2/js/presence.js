var presence = new Object();
presence['']               = '';
presence['Do not Disturb'] = '#FF8A8A';
presence['Out to lunch']   = '#57BCD9';
presence['Break']          = '#6094DB';
presence['Meeting']        = '#CDD11B';

var availLang = new Object();
availLang['cr']='Hrvatski';
availLang['de']='Deutsch';
availLang['el']='Ελληνικά';
availLang['en']='English';
availLang['es']='Español';
availLang['fr_FR']='Francais';
availLang['it']='Italiano';
availLang['hu']='Magyar';
availLang['pl']='Polski';
availLang['pt_BR']='Português';
availLang['ru']='Русский';
availLang['se']='Svenska';
availLang['zh']='简体中文'; 

var showLines          = 2;
var notifyDuration     = 6;
var warnClose          = true;
var warnHangup         = true;
var dynamicLineDisplay = false;
var soundChat          = true;
var soundQueue         = true;
var soundRing          = true;
var displayQueue       = 'max'; // max or min
var pdateFormat        = 'ddd, HH:MM';
var disableVoicemail   = false; 
var language           = "en";
var voicemailFormat    = "wav";
var phonebookWidth     = 960;
var phonebookHeight    = 580;
var dialsuggestWidth   = 200;
var noExtenInLabel     = false;
var disableWebSocket   = false;

var lang = new Object();
var langfile = "js/lang_"+language+".js";
document.write('<script type="text/javascript" src="'+langfile+'"><\/script>');

