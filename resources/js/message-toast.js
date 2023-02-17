if($('div.alert-toast').length)
{
    let showAlertToast = function (fechar = null, duracaoMsg = 5000) {
        let target = $('div.alert-toast');
        let optionsTM = {
            transition: 'transition-opacity',
            duration: 1000,
            timing: 'ease-out',
        };

        var dismiss = new Array();
        for(var i = 0; i < target.length; i++){
            dismiss[i] = new Dismiss(target[i], null, optionsTM);
        }

        setTimeout(function() {
            for(var i = 0; i < dismiss.length; i++){
                dismiss[i].hide();
            }
        }, duracaoMsg);
    }
    showAlertToast(null, 6000);
}
