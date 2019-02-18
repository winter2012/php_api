$(function () {
    $("#register").click(function () {
        var username = $("#username").val();
        var nickname = $("#nickname").val();
        var password = $("#password").val();
        if(username === ""){
            $("#message").show().html("请输入用户名").css("color","red");
            return false;
        }
        if(nickname === ""){
            $("#message").show().html("请输入昵称").css("color","red");
            return false;
        }
        if(password === ""){
            $("#message").show().html("请输入密码").css("color","red");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "controller/register.php",
            beforeSend : hideMessage(),
            data: {
                username: username,
                nickname: nickname,
                password: password
            },success:function (res) {
                $("#message").show().html("返回信息:"+res).css("color","red");
            }
        });
    });
});
function hideMessage() {
    $("#message").hide();
}