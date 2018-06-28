$(document).ready(function() {
    
    $("#register-pseudo").bind("input", function() {
       
        var pseudoRegex = /^[A-z0-9_-]{3,16}$/;
        var inputPseudo = $(this).val().match(pseudoRegex);

        if ($(this).val() != "" && inputPseudo != null) {
            $(this).parent().find('input#register-pseudo').removeClass('red');
            $(this).parent().find('input#register-pseudo').addClass('green');

        } else {
            $(this).parent().find('input#register-pseudo').addClass('red'); 
            $(this).parent().find('input#register-pseudo').removeClass('green');            
        }
        validateRegister();
    });

    $("#register-mail").bind("input", function() {
       
        var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 
        var inputMail = $(this).val().match(emailRegex);

        if ($(this).val() != "" && inputMail != null) {
            $(this).parent().find('input#register-mail').removeClass('red');
            $(this).parent().find('input#register-mail').addClass('green');

        } else {
            $(this).parent().find('input#register-mail').addClass('red'); 
            $(this).parent().find('input#register-mail').removeClass('green');            
        }
        validateRegister();
    });

    function validateRegister() {
        if ($("#register-pseudo").hasClass('green') && $("#register-mail").hasClass('green')) {
            $("#register-pseudo").parent().find('.home-register').removeClass('hidden');
            $("#register-mail").parent().find('.home-register').removeClass('hidden');

        } else {
            $("#register-pseudo").parent().find('.home-register').addClass('hidden'); 
            $("#register-mail").parent().find('.home-register').addClass('hidden');            

        }
    };

    $("div.fruits .button").bind("click", function() {
        // alert(this.dataset.fruit)
        
        var eArticleTemp = $('.article.hidden').clone();
        eArticleTemp.removeClass('hidden');
        var eArticle = eArticleTemp.clone();

        var nPrix = this.dataset.prix; 
            nPrix += ' euros';

        eArticle.find('input').attr('name',this.dataset.fruit);
        eArticle.find('input').val(this.dataset.prix);
        eArticle.find('label.list-name').text(this.dataset.fruit);
        eArticle.find('label.list-prix').text(nPrix);

        $("#panier .liste").append(eArticle);

        if ($("#panier .liste .article").length > 1) {
            $("#panier .liste .article").parent().parent().find('button').removeClass('hidden');
        } else {
            $("#panier .liste .article").parent().parent().find('button').addClass('hidden');
        }
    });
    
});