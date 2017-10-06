{{--
Template Name: Pricing
--}}
<style media="screen">
  a.btn-social, .btn-social { padding-top: 12px; }
</style>
@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
		@include('partials.page-header')
		{{-- @include('partials.content-page') --}}
		<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="f6 nav-link active black hover-gray br-pill" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-expanded="true">Plein tarif <i>(full price)</i></a>
			</li>
			<li class="nav-item">
				<a class="f6  nav-link black hover-gray" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-expanded="true">Etudiant & Chômeur <i>(Student & Unemployed)</i></a>
			</li>
		</ul>

		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				@include('partials.full-price')
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				@include('partials.special-price')
			</div>
		</div>

		<br>
	@endwhile
@endsection
