<style>
    .plan:hover {
        filter: drop-shadow(2px 4px 6px black);
        cursor: pointer;
    }
</style>
<div class="row container g-0" style="margin:auto;display:flex; justify-content:center; align-items:center;">
    <div class="col">
        <img class="img-fluid" src="/images/features.jpg" alt="">
    </div>
    <div class="col">
        <a href="/micro_plans<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/micro_plan.jpg" alt="">
        </a>
    </div>
    <div class="col">
        <a href="/signup?plan=macro<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/macro_plan.jpg" alt="">
        </a>
    </div>
    <div class="col">
        <a href="/mega">
            <img class="img-fluid plan" src="/images/mega_plan.jpg" alt="">
        </a>
    </div>
</div>