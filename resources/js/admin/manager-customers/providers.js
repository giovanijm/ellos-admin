import vueMask from 'vue-jquery-mask';

export default {
    data () {
      return {
        date: null,
        options: {
          placeholder: '__.____-___',
          // http://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
        }
      }
    },
    components: {
      vueMask
    }
  }

$("button.btn-voltar").on("click", function() {
    $(location).attr('href', route('admin.providers.index'));
});

let showModalExclusao = function (idRegistro, nameRegistro, actionForm) {
    let $targetE2 = document.getElementById('modal-providers');

    $targetE2.addEventListener('close.hs.overlay', (evt) => {
        console.log('Apagar dados');
        $("#formExcluir").attr('action', actionForm);
    });

    $("#lblMemsagemExclusao").html("<b>[" + idRegistro +"] " + nameRegistro + "</b>");

    $("#btnFecharModal").on("click", function() {
        window.HSOverlay.close($targetE2);
    });

    $("#btnRecusarModal").on("click", function() {
        window.HSOverlay.close($targetE2);
    });

    $("#formExcluir").on("submit", function(e){
        window.HSOverlay.close($targetE2);
    });

    window.HSOverlay.open($targetE2);
}

$(".form-exclusao").on("submit", function(e){
    e.preventDefault();
    var campoId = $(this).find('input[name="user_id"]')[0].value;
    var campoName = $(this).find('input[name="user_name"]')[0].value;
    var actionForm = $(this).attr('action');
    showModalExclusao(campoId, campoName, actionForm);
    return false;
});


$('#documentNumber').mask('000.000.000-00', {reverse: true});
$('#postalCode').mask('00.000-000');

let setMaskContact = function (valor) {
    switch(valor) {
        case '1':
        case '4':
        case '6':
            $('#contact').mask('(00) 00000-0000');
          break;
        case '2':
        case '5':
            $('#contact').mask('(00) 0000-0000');
            break;
        default:
            $('#contact').unmask();
      }
}

setMaskContact($('#typeContactId').val());

$('#typeContactId').on("change", function(e){
    setMaskContact(this.value);
});

$("button.btn-contato-excluir").on("click", function() {
    $(location).attr('href', route('admin.providers.contacts.destroy', [this.getAttribute('data-contact-id'), $('#id').val()]));
});

$("#contactName").on("focus", function(e){
    if(!$.trim(this.value))
        if($("#socialName").val())
            $(this).val($("#socialName").val());
        else
            $(this).val($("#fullName").val());
});

$("#socialName").on("focus", function(e){
    if($("#fullName").val() && !this.value)
        $(this).val($("#fullName").val().trim().split(' ')[0])
});

$("#postalCode").on("change", function(e){
    let iconAnt = null;
    let iconLoad = '<i class="fa fa-spinner fa-spin"></i>';
    if(this.value.length == 10){
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "/admin/common/searchpostalcode/"+this.value,
            beforeSend: function(){
                iconAnt = $("#postalCode-icon").html();
                $("#postalCode-icon").html(iconLoad);
            },
            success: function(result){
                $('#address').val(result["data"]["street"]);
                $('#neighborhood').val(result["data"]["neighborhood"]);
                $('#city').val(result["data"]["city"]);
                $('#state').val(result["data"]["state"]);
                $('#addressNumber').focus();
                $("#postalCode-icon").html(iconAnt);
            },
        });
    }
});
