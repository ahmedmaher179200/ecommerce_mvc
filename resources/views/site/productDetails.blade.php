@extends('layouts.site')

@section('title', 'product details')


@section('content')
<!-- Modal1 -->
	


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{url('/')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="{{url('shop')}}" class="stext-109 cl8 hov-cl1 trans-04">
				{{$product->Sub_category->name}}
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{$product->Sub_category->Main_categories->name}}
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								@foreach ($product->images as $image)
									<div class="item-slick3" data-thumb="{{url('public/uploads/products/' . $image->image)}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{url('public/uploads/products/' . $image->image)}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{url('public/uploads/products/' . $image->image)}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$product->name}}
						</h4>

						<span class="mtext-106 cl2">
							${{$product->getPriceAfterDiscound()}}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{$product->describe}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2 size" name="size">
											<option value="">Choose an option</option>
											@if ($product->sizes != NULL)
												@foreach ($product->sizes as $size)
													<option value="{{$size}}">Size {{$size}}</option>
												@endforeach
											@endif
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2 color" name="color">
											<option value="">Choose an option</option>
											@if ($product->colors != NULL)
												@foreach ($product->colors as $color)
													<option value="{{$color}}">{{$color}}</option>
												@endforeach
											@endif
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product quantity" type="number" name="num-product" max="5" value="1">
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail add-to-cart" data-product_id="{{$product->id}}">
										Add to cart
									</button>
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								@if (Auth::guard('web')->check())
									<?php 
										$love  =  App\Models\Love::where('product_id', $product->id)
														->where('user_id', auth('web')->user()->id)
														->first();
									?>

									<div class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail {{'ajax_love' . $product->id}} ajax_love @if (!empty($love)) active @endif" data-product_id="{{$product->id}}">
										<i class="zmdi zmdi-favorite"></i>
									</div>
								@else
									<a href="{{url('login')}}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								@endif
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#reviews" role="tab">Reviews (<span class="reviews_count">{{$reviews_count}}</span>)</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{$product->describe}}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade show active" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm reviews_box">
										<div class="reviews">
											<!-- Review -->
											@foreach ($reviews as $review)
												<div class="flex-w flex-t p-b-68">
													<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
														<img src="{{url('public/uploads/users/' . $review->User->getImage())}}" alt="AVATAR">
													</div>

													<div class="size-207">
														<div class="flex-w flex-sb-m p-b-17">
															<span class="mtext-107 cl2 p-r-20">
																{{$review->User->name}}
															</span>

															<span class="fs-18 cl11">
																<?php 
																	//star
																	for($i = 0; $i < $review->rating; $i++){
																		?>
																			<i class="zmdi zmdi-star"></i>
																		<?php
																	}
																	//none star
																	for($i = 0; $i < 5 - $review->rating; $i++){
																		?>
																			<i class="zmdi zmdi-star-outline"></i>
																		<?php
																	}
																?>
															</span>
														</div>

														<p class="stext-102 cl6">
															{{$review->content}}
														</p>
													</div>
												</div>
											@endforeach
										</div>
										{{$reviews->links()}}
										
										<!-- Add review -->
										@if (Auth::guard('web')->check())
											<form class="w-full">
												<div class="flex-w flex-m p-t-50 p-b-23">
													<span class="stext-102 cl3 m-r-16">
														Your Rating
													</span>

													<span class="wrap-rating fs-18 cl11 pointer">
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<input class="dis-none rating" type="number" name="rating">
													</span>
												</div>	

												<div class="row p-b-25">
													<div class="col-12 p-b-5">
														<label class="stext-102 cl3" for="review">Your review</label>
														<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10 content" id="review" name="content"></textarea>
													</div>
												</div>
												
												<div class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10 ajax_addReview" style="cursor: pointer;" data-product_id="{{$product->id}}">
													add
												</div>
											</form>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach ($related_products as $related_product)
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="{{url('public/uploads/products/' . $product->images[0]->image)}}" alt="IMG-PRODUCT">
	
									<a href="{{url('productDetails/' . $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"target="_blank">
										Quick View
									</a>
								</div>
	
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{url('productDetails/' . $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											{{$product->name}}
										</a>
	
										<span class="stext-105 cl3">
											{{$product->getPriceAfterDiscound()}}
										</span>
									</div>
	
									<div class="block2-txt-child2 flex-r p-t-3">
										@if (Auth::guard('web')->check())
											<?php 
												$love  =  App\Models\Love::where('product_id', $product->id)
																			->where('user_id', auth('web')->user()->id)
																			->first();
											?>

											<div class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail {{'ajax_love' . $product->id}} ajax_love @if (!empty($love)) active @endif" data-product_id="{{$product->id}}">
												<i class="zmdi zmdi-favorite"></i>
											</div>
										@else
											<a href="{{url('login')}}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail">
												<i class="zmdi zmdi-favorite"></i>
											</a>
										@endif
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

@endsection

