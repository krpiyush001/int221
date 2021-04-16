<?php $__env->startSection('head'); ?>
<style>
body {
    background: whitesmoke;
}
.img-error{
width:220px;
height:220px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-md-12 m-4">
            <div class="pull-middle" style="margin-top:10px;">
                <div class="col-md-10 col-md-offset-1 pull-right">
                    <img class="img-error" src="https://bootdey.com/img/Content/fdfadfadsfadoh.png">
                    <div class="p-b-10 mt-5">
                        <h3 class="ltext-103 cl5">
                            Error! The search not Found!
                        </h3>
                    </div>
                    <p>Sorry, an error has occured, Requested page not found!</p>
                    <div class="error-actions">
                        <a href="/">
                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail mt-5">
                            Go to Home
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kundanswear-master\resources\views/pages/errorpage.blade.php ENDPATH**/ ?>