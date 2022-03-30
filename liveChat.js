 $(function () {
    setInterval(function () {
        $.ajax({
            type: "post",
            url: "sendRequest.php",
            success: function (data) {
                $(".main").html(data);
                //do something with response data
            }
        });
    }, 2000);

    $(".submit_txt_db").on("click", function () {
        let message = $("#message").val();
        console.log(message);
        const colors = ["lightyellow", "lightseagreen", "lightsalmon", "lightcoral", "lightcyan", "lightgreen", "lightblue"];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];

        $.ajax({
            type: "post",
            url: "insertMessage.php",
            data: {
                "message": message
            },
            success: function () {
                $(".submit_txt_db").css("background-color", randomColor);
                $("#message").val("");
            }
        });
    });

     var smiles = {
         "smile" : "(❛ ͜ʖ ͡❛)",
         "laugh" : "( ͡❛ ⏥ ͡❛)",
         "angry" : "(︡* ⏥*︠)",
         "love" : "(ɔ◔‿◔)ɔ ♥",
         "sad" : "( ˘︹˘ )",
         "wink" : "(>‿◠)✌",
         "strong" : "(ง︡'-'︠)ง"
    };

     $(".smile").on("click", function () {
         let smileText = smiles[$(this).attr()];
         $("#message").text(smileText);
     })
})
