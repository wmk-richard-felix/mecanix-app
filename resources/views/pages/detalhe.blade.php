@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'O maior portal de profissionais de veículos do Brasil')

@section('content')
    <section class="section-content page-detail py-12">
		<section class="banner-detail mb-5">   
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 owl-carousel">
                        @for($i = 0; $i < count((array)$banners); $i++)
                            <div>
                                <img src="{{url('/')}}/img/{{ $banners[$i]->image }}"  class="d-block w-100" alt="...">    
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="row box-especialista mb-4">
						<div class="col-12 col-sm-3">
							<a href="{{ url('/') }}/especialista/mecanico/mecanica-da-marcia">
								<img class="img-fluid" src="{{ asset('img/avatar.png') }}" alt="Mecânica da Marcia" />
							</a>
						</div>
						<div class="col-12 col-sm-9">
							<h1 class="mb-3">
								Mecânica da Marcia
							</h1>
							<div class="list-start mb-3">
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star"></i>
							</div>
                             <address class="mb-4">
                                <i class="bi bi-telephone"></i> 99 99999 9999<br>
                                <i class="bi bi-map"></i> Av. Américo Figueiredo, 2500, Sorocaba-SP
                            </address> 
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet a ex eu porta. Suspendisse sollicitudin mauris porttitor felis elementum ullamcorper. Phasellus porta congue metus eget mattis. Donec gravida ullamcorper neque, maximus bibendum est viverra at. Donec bibendum blandit nibh nec hendrerit. Nam convallis ligula varius erat tincidunt, non varius elit tempor. Nunc gravida ornare suscipit. Fusce varius ac leo at dapibus. Curabitur pellentesque elementum sapien, a pulvinar dolor. Vivamus vulputate vulputate ullamcorper. Quisque vel turpis orci.
                            </p>
                            <p>
                                Donec tempus lacus sit amet turpis commodo, eu rutrum urna tristique. In sagittis enim vel sapien luctus luctus. Nullam molestie mattis convallis. Cras at turpis iaculis, sagittis felis quis, convallis ligula. Cras orci neque, sodales in dui id, ornare eleifend nulla. Vestibulum semper massa turpis, in imperdiet risus feugiat at. Praesent euismod odio sit amet erat faucibus, id ultrices dui maximus. Proin elementum neque sit amet lectus ultrices, at condimentum magna consectetur. Aenean vitae nulla at dolor placerat pulvinar. Vestibulum sit amet tortor id felis sollicitudin convallis. Suspendisse ut pretium tellus. Nullam a malesuada elit, id luctus dui. Nam pellentesque ex sit amet tortor viverra consequat.
                            </p>
							<strong class="mb-4">
								Aberto das 06 às 18 horas
							</strong>
                            <h2 class="mb-3">
                                Serviços
                            </h2>
							<ul>
								<li>
									Troca de Óleo 
								</li>
								<li>
									Revisão  
								</li>
								<li>
									Alinhamento  
								</li>
								<li>
									Balanceamento   
								</li>							
							</ul>
							<div class="list-proximity">
								<span>proximidade</span>
								<i class="bi bi-circle-fill green" data-bs-toggle="tooltip" title="Menos de 5km de distância"></i>
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
							</div>
						</div>
					</div>
                    
				</div>
			</div>
		</div>
    </section>

	
@endsection

@section('script')

	<script type="text/javascript">
		$(document).ready(function(){
			$("#ex1").slider({formatter: function(value) {
				return `Raio de ${value} km`;
			}});
			
			$(".owl-carousel").owlCarousel({
			 	loop:true,
			 	margin:0,
			 	responsiveClass:true,
			 	dots:true,
			 	nav:true,
			 	autoplay:false,
			 	autoplayTimeout:5000,
			 	// autoplayHoverPause:true,
			 	// URLhashListener:true,
			 	// startPosition: 'URLHash',
			 	navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			 	smartSpeed: 1000,
			 	responsive:{
			 		0:{
			 			items:1,
			 			nav:true,
			 			dots:false,
			 		},
			 		600:{
			 			items:3,
			 			nav:true,
			 			dots:true,
			 		},
			 		1000:{
			 			items:3,
			 			nav:false,
			 			dots:true,
			 		}
			 	}
			});
		});
	</script>
@endsection