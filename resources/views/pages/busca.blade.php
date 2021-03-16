@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'O maior portal de profissionais de veículos do Brasil')

@section('content')
    <section class="section-content py-12">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12">
					<h1>
						Encontramos 190 <strong>"Mecânicos"</strong> próximo a você
					</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-4 result-left navbar-expand-lg mb-4">
					<h2 class="mt-3">Refinar Busca</h2>
					<h3 class="mt-3">Categorias</h3>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="flexCheckMecanico">
						<label class="form-check-label" for="flexCheckMecanico">
							Mecânico
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="flexCheckEletrico" checked>
						<label class="form-check-label" for="flexCheckEletrico">
							Auto elétrico
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="flexCheckFunilaria">
						<label class="form-check-label" for="flexCheckFunilaria">
							Funilária
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="flexCheckVidracaria">
						<label class="form-check-label" for="flexCheckVidracaria">
							Vidraçaria
						</label>
					</div>
					<h3 class="mt-3">Serviços</h3>
					<select class="form-select mb-4" aria-label="Default select example">
						<option selected>Selecione um serviço</option>
						<option value="1">Troca de óleo</option>
						<option value="2">Revisão</option>
						<option value="3">Alinhamento</option>
					</select>
					<div class="row">
						<div class="col-12 mb-4">
							<h3 class="mt-3">Filtro por raio</h3>
							<b>1km</b> 
								<input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="100"/>
						</div>
					</div>
					<div class="d-grid gap-1">
						<button class="btn btn-filter" type="button">Filtrar</button>
					</div>
				</div>
				<div class="col-12 col-sm-8 ">
					<div class="row box-especialista mb-4">
						<div class="col-12 col-sm-4">
							<a href="{{ url('/') }}/especialista/mecanico/mecanica-da-marcia">
								<img class="img-fluid" src="{{ asset('img/avatar.png') }}" alt="Mecânica da Marcia" />
							</a>
						</div>
						<div class="col-12 col-sm-8">
							<h2>
								Mecânica da Marcia
							</h2>
							<div class="list-start">
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star"></i>
							</div>
							<strong>
								Aberto das 06 às 18 horas
							</strong>
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
					
					<div class="row box-especialista mb-4">
						<div class="col-12 col-sm-4">
							<a href="{{ url('/') }}/especialista/mecanico/mecanica-da-marcia">
								<img class="img-fluid" src="{{ asset('img/avatar.png') }}" alt="Mecânica da Marcia" />
							</a>
						</div>
						<div class="col-12 col-sm-8">
							<h2>
								Mecânica da Marcia
							</h2>
							<div class="list-start">
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star"></i>
							</div>
							<strong>
								Aberto das 06 às 18 horas
							</strong>
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
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
								<i class="bi bi-circle-fill yellow" data-bs-toggle="tooltip" title="Entre 5km até 10km de distância"></i>
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
							</div>
						</div>
					</div>
					<div class="row box-especialista mb-4">
						<div class="col-12 col-sm-4">
							<a href="{{ url('/') }}/especialista/mecanico/mecanica-da-marcia">
								<img class="img-fluid" src="{{ asset('img/avatar.png') }}" alt="Mecânica da Marcia" />
							</a>
						</div>
						<div class="col-12 col-sm-8">
							<h2>
								Mecânica da Marcia
							</h2>
							<div class="list-start">
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star"></i>
							</div>
							<strong>
								Aberto das 06 às 18 horas
							</strong>
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
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
								<i class="bi bi-circle" data-bs-toggle="tooltip"></i>
								<i class="bi bi-circle-fill red" data-bs-toggle="tooltip" title="Mais de 10km de distância"></i>
							</div>
						</div>
					</div>
					<div class="row box-pagination mb-4">
						<div class="col-12 col-sm-6">
							<div class="d-grid gap-1">
								<button class="btn" type="button">Carregar mais</button>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="d-grid gap-1">
								<button class="btn" type="button">Refinar busca</button>
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
			 	autoplay:true,
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
			 			items:4,
			 			nav:false,
			 			dots:true,
			 		}
			 	}
			});
		});
	</script>
@endsection