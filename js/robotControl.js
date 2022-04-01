$(function () {
  $(".robotControl").on("click", function () {
    let request = $(this).text();
    console.log(request);
    $.ajax({
      type: "post",
      url: "./robotControl.php",
      data: {
        "httpRequest": request,
        "ipAddress": "<?= $_SESSION["robotIP"]; ?>"
      },
    });
  })
})
