let showAlertToast = function (fechar = null) {
    let targetTM1 = document.getElementById('toastMessage-Info');
    let optionsTM = {
        transition: 'transition-opacity',
        duration: 1000,
        timing: 'ease-out',
    };

    let dismiss = new Dismiss(targetTM1, null, optionsTM);

    setTimeout(function() {
        dismiss.hide();
    }, 5000);
}
showAlertToast();
