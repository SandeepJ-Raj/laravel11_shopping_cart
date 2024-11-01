<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<!-- <h3>Featured Product</h3> -->
										<h2>Products</h2>
										<a href="{{ route('newproduct'); }}">
											<button class="fas fa-plus"> New Product</button>
										</a>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
						@foreach($products as $product)
							<div class="col-md-6 col-lg-4 col-xl-3">
									<div id="{{'product-'.$product['id']}}" class="single-product">
										<img src="{{$product['image']}}" class="prod-img" />
											<div class="part-1">
													<ul>
														<!-- <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														<li><a href="#"><i class="fas fa-plus"></i></a></li> -->
														<li><a href="#"><i class="fas fa-expand"></i></a></li>
													</ul>
											</div>
											<div class="part-2">
													<h3 class="product-title">{{$product['title']}}</h3>
													<!-- <h4 class="product-old-price">{{$product['price']}}</h4> -->
													<h4 class="product-price">{{'$'.$product['price']}}</h4>
											</div>
									</div>
							</div>
						@endforeach
						<!-- Single Product -->
						
				</div>
		</div>
</section>