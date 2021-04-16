<?php $__env->startSection('content'); ?>
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Track Order
		</h2>
    </section>
    
    <section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<?php if($order == null): ?>
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="<?php echo e(route('trackorder.show')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Track Your Order
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="order_token_id" placeholder="Your Order Token Id" required>
							<img class="how-pos4 pointer-none" src="/images/icons/token.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address" required>
							<img class="how-pos4 pointer-none" src="/images/icons/icon-email.png" alt="ICON">
						</div>
						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>
				<?php else: ?>
				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Order Status Details
                    </h4>
					<div class="flex-w w-full p-b-42">

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Order Status
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<?php echo e($order->status); ?>

							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Order Details
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<table style="width:100%">
									<tr>
									  <th>Product</th>
									  <th>Quantity</th>
									  <th>Size</th>
									</tr>
								<?php $__currentLoopData = json_decode($order->product_details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><p class="stext-115 cl6 size-213 p-t-18"><?php echo e($item->slug); ?></p></td>
										<td><p class="stext-115 cl6 size-213 p-t-18"><?php echo e($item->quantity); ?></p></td>
										<td><p class="stext-115 cl6 size-213 p-t-18"><?php echo e($item->size); ?></p></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</table>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Message from Vendor
							</span>

							<p class="stext-115 cl1 size-313 p-t-18">
								<?php if($order->order_status == ''): ?>
									Your order has been received. We will put the message soon.
								<?php else: ?>
									<?php echo e($order->order_status); ?>

								<?php endif; ?>
								
							</p>
						</div>
					</div>
				</div>
				<?php endif; ?>
				

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Any Query? Contact Us!
                    </h4>
					<div class="flex-w w-full p-b-42">
                        
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-400 p-t-18">
								Address :plot no :189 park view Appartment, BSP Colony, Moti Nagar , Eraggada, Hyderabad
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-400 p-t-18">
								+91 -9949270529 or +91 -9505854124
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								kundans9949@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kundanswear-master\resources\views/pages/trackorder.blade.php ENDPATH**/ ?>