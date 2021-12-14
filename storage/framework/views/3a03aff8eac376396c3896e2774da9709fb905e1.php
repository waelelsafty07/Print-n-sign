<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('front.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-16">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">Products</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="filter__grid-wrapper u-s-m-t-30">
                                    <div class="row">
										<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
												<div class="product-o product-o--hover-on product-o--radius">
													<div class="product-o__wrap">

														<a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

															<img class="aspect__img <?php echo e($product->id); ?>" src="<?php echo e($product->ProductImage()); ?>" alt=""></a>
														<div class="product-o__action-wrap">
															<ul class="product-o__action-list">


															</ul>
														</div>
													</div>

													<span class="product-o__category">

														<a href="<?php echo e(route('productsDetails',$product->id)); ?>"><?php echo e(\App\Models\Categories::find($product->category_id)->name); ?></a>
													</span>

													<span class="product-o__name">

														<a href="<?php echo e(route('productsDetails',$product->id)); ?>"><?php echo e($product->products_name); ?></a>
													</span>
												
												</div>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>

    <?php echo $__env->make('front.layouts.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/front/products.blade.php ENDPATH**/ ?>