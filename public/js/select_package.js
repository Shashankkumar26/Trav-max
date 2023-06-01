$(document).ready(function () {
    $(".select_package_id").click(function () {
        var package = $(this).parent().children(".package_information").val();
        package = JSON.parse(package);
        $("#select_package_section").addClass("d-none");
        $("#pick_a_plan_section").removeClass("d-none");
        $("#pick_a_plan_selected_package_name").text(package['name']);
        $("#travnow_price").text(package['total']);
        $("input[name=package_id]").val(package['id']);
    });

    var link = $("#confirm_btn").attr("href");
    var original_link = $("#confirm_btn").attr("href");
    $(".plan_box").click(function () {
        $(".plan_box").each(function () {
            $(this).removeClass("selected");
        })
        $(this).addClass("selected");
        var planName = $(this).attr("id");
        $("input[name=payment_type]").val(planName);
        $("#book_package_btn").prop('disabled', false);
        link = original_link;
        link = link + planName;
        $("#confirm_btn").attr("href", link);
        $("#confirm_btn").removeAttr("disabled");
    })
});
