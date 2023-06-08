<style>
    .plan:hover {
        filter: drop-shadow(2px 4px 6px black);
        cursor: pointer;
    }
</style>
<div class="row g-0" style="display:flex; justify-content:center; align-items:center;">
    <div class="col">
        <img class="img-fluid" src="/images/micro_plan_options.jpg" alt="">
    </div>
    <div class="col">
        <a href="/signup?plan=micro&micro=1<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/micro1.jpg" alt="">
        </a>
    </div>
    <div class="col">
        <a href="/signup?plan=micro&micro=2<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/micro2.jpg" alt="">
        </a>
    </div>
    <div class="col">
        <a href="/signup?plan=micro&micro=3<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/micro3.jpg" alt="">
        </a>
    </div>
    <div class="col">
        <a href="/signup?plan=micro&micro=4<?php echo isset($_GET['refer_id']) ? '&refer_id=' . $_GET['refer_id'] : ''; ?>">
            <img class="img-fluid plan" src="/images/micro4.jpg" alt="">
        </a>
    </div>
</div>