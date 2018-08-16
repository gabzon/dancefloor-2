{{--
Template Name: Teachers
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts()) @php(the_post())
        @include('partials.page-header')
        @include('partials.content-page')
    @endwhile

    @php( $profs = get_users( 'role=teacher' ) )
    @php( $indice = 100 )
    @php( $i = 0 )
    {{-- __('Company Dancers','sage') --}}
    
    <h3><?= __('Team','sage') ?></h3>

    <div class="row">
      @foreach ($profs as $user)
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
          <!-- Card -->
          @php( $photos = get_user_meta($user->ID,'photo') )
          @php( $photo = ($photos ? $photos[0] : '') )
          @php( $title = get_user_meta($user->ID,'title', true) )
          @php( display_person($indice, $user->ID, $user->user_email, $photo, $user->first_name, $user->last_name, $title, $user->description) )
          @php( $indice++ )
        </div>
      @endforeach
    </div>
    <br>
    @php( $assistants = get_users( 'role=assistant' ) )
    @php( $indice = 0 )
    <h3>{{ _e('Teachers','sage') }}</h3>
    <div class="row">
        <?php foreach ( $assistants as $user ) :?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <!-- Card -->
            <?php $photos = get_user_meta($user->ID,'photo');?>
            <?php $photo = ($photos ? $photos[0] : ''); ?>
            <?php $title = get_user_meta($user->ID,'title', true); ?>
            <?php display_person($indice, $user->ID, $user->user_email, $photo, $user->first_name, $user->last_name, $title, $user->description); ?>
            <?php $indice++ ?>
          </div>
        <?php endforeach ?>
    </div>
    <br>
    <br>
@endsection
