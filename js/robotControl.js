$(function () {
    $(".robotControl").on("click", function () {
        let request = $(this).text();
        let ipAddress = $(".robotIPAddress").text();
        console.log(request);
        console.log(ipAddress);
        $.ajax({
            type: "post",
            url: "../robotControl.php",
            data: {
                "httpRequest": request,
                "ipAddress": ipAddress
            },
        });
    })
})
