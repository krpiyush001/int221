<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
       
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                            <img src=<?php echo e(Voyager::image( $item->associatedModel->main_image )); ?>  alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    <?php echo e($item->name); ?>

                                </a>
                                <span class="header-cart-item-info">
                                    <?php echo e($item->quantity); ?> x  ₹<?php echo e($item->price); ?>

                                </span>
                                <a href="<?php echo e(route('cart.destroy',$item->id)); ?>"><p style="color: red">Remove</p></a>
                            </div>
                        </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: ₹ <?php echo e(\Cart::getTotal()); ?>

                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="/cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>
                    <?php if(count(\Cart::getContent()) > 0): ?>
                <a href="<?php echo e(route('checkout.index')); ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                    <?php else: ?>
                        
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\kundanswear-master\resources\views/inc/cart.blade.php ENDPATH**/ ?>