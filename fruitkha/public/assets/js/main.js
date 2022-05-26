window.onload = () =>{

    if ($('#admin-news').length) {
        getNews()
    }

    function ajaxFunction(url, method, fun, data = {}) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            success: fun,
            error: function (xhr) {
                console.log(xhr)
            }
        })
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $("#search").submit(function (event) {
    //     console.log(123)
    //     event.preventDefault()
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //
    //     console.log($("#searchInput").val().length)
    //     console.log(_token)
    //
    //     if ($("#searchInput").val().length){
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         ajaxFunction('/proba', 'post', function (data) {
    //             printUsers(data);
    //         }, {
    //             'value': $("#searchInput").val(),
    //             'token': "{{ csrf_token() }}"
    //         })
    //     }
    // })

    //ADMIN NEWS CODE
    function getNews(){
        //console.log(111111)
    }

    $("[name='newsStatus']").change(function() {
        console.log((this).value)
        ajaxFunction("/admin/news", "post", function (result){
            $(".news-status-message").html(result.message)
            if (result.success){
                $(".news-status-message").addClass('text-success');
            }
            else{
                $(".news-status-message").addClass('text-danger');
            }
            //window.location.reload();
        }, data = {
            'id_news' : (this).value,
            'token': "{{ csrf_token() }}"
        })
    });



    //REVIEW CODE
    $("[name='reviewStatus']").change(function() {
        ajaxFunction("/admin/reviews", "post", function (result){

            $(".review-status-message").html(result.message)
            if (result.success){
                $(".review-status-message").addClass('text-success');
            }
            else{
                $(".review-status-message").addClass('text-danger');
            }
        }, data = {
            'id_review' : (this).value,
            'token': "{{ csrf_token() }}"
        })
    });

    // COMMENT CODE
    $("#post-comment-form, #reply-comment-form").submit(function (event) {

        event.preventDefault()
        // AKO JE REPLY COMM
        if($("#reply-comment-hidden").val() != ""){
            if ($("#reply-comment-comment").val().length > 2){
                sendRequest($("#reply-comment-comment").val(), $("#reply-comment-news").val(), $("#reply-comment-hidden").val())
            }
            else{
                $("#reply-comment-error").html("Comment must have at least 3 characters.")
                event.preventDefault()
            }
        }
        // AKO JE COMM
        else{
            if ($("#post-comment-comment").val().length > 2){
                sendRequest($("#post-comment-comment").val(), $("#post-comment-news").val())
            }
            else{
                $("#post-comment-error").html("Comment must have at least 3 characters.")
                event.preventDefault()
            }
        }

        function sendRequest(comment, id_news, id_reply = null){
            ajaxFunction("/comment", "post", function (result){
                alert(result.message);
                window.location.reload();
            }, data = {
                'comment' : comment,
                'id_news' : id_news,
                'id_reply' : id_reply,
                'token': "{{ csrf_token() }}"
            })
        }
    });

    //USER SEARCH
    $("#searchNews-form").submit(function (event) {
        event.preventDefault();
        $("#searchNews-error").html('')

        console.log($("#keywordsNews").val())
        if ($("#keywordsNews").val().length < 2) {
            $("#searchNews-error").html('Type <code>minimum 3</code> characters .')
        }
        else{
            ajaxFunction("/news", "get", function (result){

                console.log(result)
                // if (result.success){
                //     console.log(result.users)
                //     let html = "<tr>";
                //     for (let u of result.users) {
                //         let a = "{{URL::to('restaurants/20')}}"
                //         console.log(window.location.href + "/" + u.id_user)
                //         html += `
                //             <td class="py-1">
                //                 <img src="${flagsUrl + '/' + u.avatar}" alt="Avatar User image" />
                //             </td>
                //             <td>${u.first_name +' '+ u.last_name}</td>
                //             <td>${u.email}</td>
                //             <td>${u.name}</td>`
                //         if (u.name == 'Admin'){
                //             html += '<td>Admin account<td>'
                //         }
                //         else{
                //             html += `<td><form action="${window.location.href + "/" + u.id_user}" method="POST" id="activate-user-form">`
                //             if (u.active) {
                //                 html +=`<button type="submit" class="btn btn-inverse-danger btn-fw">Deactivate</button>`
                //             }
                //             else{
                //                 html +=`<button type="submit" className="btn btn-inverse-success btn-fw">Activate</button>`
                //             }
                //             html +=`</form></td>`
                //         }
                //         if (u.name == 'Admin'){
                //             html += '<td>Admin account<td>'
                //         }
                //         else{
                //             html += `<td><form action="${window.location.href + "/" + u.id_user + "/comment"}" method="POST">`
                //             if (u.active) {
                //                 html +=`<button type="submit" class="btn btn-inverse-danger btn-fw">Deactivate</button>`
                //             }
                //             else{
                //                 html +=`<button type="submit" className="btn btn-inverse-success btn-fw">Activate</button>`
                //             }
                //             html +=`</form></td></tr>`
                //         }
                //     }
                //     $("#tbody-users-admin").html(html)
                // }
                // else{
                //     alert(result.message);
                // }
            }, data = {
                'keyword' : $("#keywordsUser").val(),
                // 'token': "{{ csrf_token() }}"
            })
        }

    });


    //console.log(token)
    // $("#activate-user-form").submit(function (event) {
    //     // event.preventDefault();
    //
    //     console.log($("#user-id-activate").data('id'))
    //     ajaxFunction("/admin/users/", "post", function (result){
    //         //alert(result.message);
    //         //window.location.reload();
    //         console.log(result)
    //     }, data = {
    //         'id' : $("#user-id-activate").data('id'),
    //         'token': "{{ csrf_token() }}"
    //     })
    // });


    //  LOGIN CODE
    var validationError = false;
    $("#login-form").submit(function (event) {
        resetFormMessages();
        validationError = false;

        if ($("#email").val().length < 3) {
            formErrorMessage("Email is invalid.", $("#email"));
        }
        if ($("#password").val().length < 8) {
            formErrorMessage("Password is invalid.", $("#password"));
        }
        if (validationError) {
            event.preventDefault();
        }
    });

    //  REGISTER CODE
    $("#register-form").submit(function (event) {
        resetFormMessages();
        validationError = false;

        let firstName = $("#firstName").val();
        let lastName = $("#lastName").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let confPassword = $("#confirm-password").val();

        regexValidate(firstName, regexName, $("#firstName"));
        regexValidate(lastName, regexName, $("#lastName"));
        regexValidate(email, regexEmail, $("#email"));
        regexValidate(password, regexPassword, $("#password"), true);

        if(!confPassword.length){
            formErrorMessage("Field is required.", $("#confirm-password"));
        }
        else{
            if (password !== confPassword) {
                formErrorMessage("Passwords don't match.", $("#confirm-password"))
            }
        }

        if (validationError) {
            event.preventDefault();
        }
    });

    //  REGULAR EXPRESSION
    let regexName = /^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15})?$/;
    let regexEmail = /^[a-z]((\.|-|_)?[a-z0-9]){2,}@[a-z]((\.|-|_)?[a-z0-9]+){2,}\.[a-z]{2,6}$/i;
    let regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let regexFullName = /^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}){0,2}$/;
    let regexAddress = /^[\w\.]+(,?\s[\w\.]+){2,8}$/;

    //  LOGIN AND REGISTER FUNCTIONS
    function regexValidate(string, regex, htmlElement, pass = false) {
        if (string == "") {
            return formErrorMessage("Field is required.", htmlElement);
        }
        else if (!regex.test(string)) {
            if(pass){
                return formErrorMessage("Enter a combination of at least 8 characters, at least one uppercase , one lowercase and one digit.", htmlElement);
            }
            return formErrorMessage("Field is invalid.", htmlElement);
        }
    }

    function textboxValidate(string, htmlElement) {
        if (string == "") {
            return formErrorMessage("Polje Teksta poruke je obavezno.", htmlElement);
        }
        if (string.length < 15) {
            return formErrorMessage("Tekst je prekratak za poruku.", htmlElement);
        }
    }

    function resetFormMessages() {
        validationError = false;
        $(".form-error").remove();
        $(".form-success").remove();
    }

    function formErrorMessage(message, element) {
        validationError = true;
        $(`<p class="form-error small alert alert-danger my-1">${message}</p>`).insertAfter($(element));
    }

    //CONTACT MESSAGE VALIDATION
    $("#contact-form").submit(function (event) {
        resetFormMessages();
        validationError = false;


        let fullName = $("#name").val();
        let email = $("#email").val();
        let text = $("#text").val();

        regexValidate(fullName, regexFullName, $("#name"));
        regexValidate(email, regexEmail, $("#email"));
        textboxValidate(text, $("#text"));

        if (validationError) {
            event.preventDefault();
        }
        //event.preventDefault();
    });





//    BOOTSTRAP JS
    $('#replyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var user = button.data('user') // Extract info from data-* attributes
        var comment = button.data('comment')
        var hidden = button.data('hidden')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Replay to ' + user)
        $('.replyToThis').html(comment)
        $('.hidden-input').val(hidden)
    })
}
