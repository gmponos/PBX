function jCallBack() {
    // Callback functions for events received by fop2server
    function reload(nro,data,slot) {
        debug("reload inside jCallBack");
    }

    function link(nro,data,slot) {
        debug("received link command from server with "+data+", button number"+nro+" in slot "+slot);
    }

    this.reload  = reload;
    this.link    = link;

}

function jCustomAction() {

    // Actions to execute for custom toolbar buttons, element id 
    // should be custom_XXX where XXX is the method to call.
    // Example: id=custom_test

    function test(target) {
        debug("Custom command test on target "+target);
    }

    function conferencecall(target) {
        debug("Custom command conferencecall on target " + target + " my position " + myposition);
        if (myposition > 0) {
            var boton = $('boton' + myposition);
            var number_to_dial;
            // Look for typed number in the dial textbox field
            if ($('dialtext').value.indexOf(lang.dial) >= 0) {
                // Placeholder text, we have to remove it
                var largo = lang.dial.length;
                number_to_dial = $('dialtext').value.substr(largo);
            } else {
                number_to_dial = $('dialtext').value;
            }
            // If the dialbox is empty, check if we have a target selected
            // and use the target extension number
            if (number_to_dial == "") {
                if (target > 0) {
                    number_to_dial = botonitos[target]['EXTENSION'];
                }
            }
            if (number_to_dial == "") {
                debug("We do not have a target number to dial, exit");
                return;
            }
            debug(number_to_dial);
            if (boton.hasClassName('busy')) {
                if ($('securitycode').value !== "") {
                    var pass = $('securitycode').value + lastkey;
                    var hash = hex_md5(pass);
                    queuedcommand = "<msg data=\"" + myposition + "|customconference|" + number_to_dial + "|" + hash + "\" />";
                    sendcommand();
                }
            } else {
                debug("you are not on a call, we only send this command when we are busy");
            }
        }
    }

    this.conferencecall = conferencecall;
    this.test  = test;

}

mycallback = new jCallBack();
mycustom   = new jCustomAction();
