
@php( $dancefloor_options = get_option('dancefloor_settings') )
@php( $bank_details = $dancefloor_options['bank_details'] )

<article @php(post_class())>
	<br>
	<header>
		<h1 class="entry-title">{{ get_post_meta($post->ID,'course_title',true) }}</h1>
	</header>
	<br>
	<div class="entry-content">

		{{--  Alert Message --}}
		@if (get_post_meta($post->ID,'course_attention_message', true))
			<div class="ui green message">
				{{ get_post_meta($post->ID,'course_attention_message', true) }}
			</div>
		@endif

		{{--  Table & Content section --}}
		<div class="row">
			<div class="col-md-4">
				<table class="table f6">
					<tr>
						<td width="43%"><strong>Niveau <i lang="en" class="text-muted">(Level)</i> :</strong></td>
						<td width="57%">
							{{ get_post_meta($post->ID,'course_level', true) }}
							@if (get_post_meta($post->ID,'course_level_number', true))
								({{ get_post_meta($post->ID,'course_level_number', true) }})
							@endif
						</td>
					</tr>
					<tr>
						<td><strong>Jour <i class="text-muted" lang="en">(Day)</i> : </strong></td>
						<td>{{ _e(get_post_meta($post->ID,'course_day', true),'sage') }}</td>
					</tr>
					<tr>
						<td><strong>Heure <i class="text-muted" lang="en">(Time)</i> :</strong></td>
						<td>{{ get_post_meta($post->ID,'course_start_time', true) . ' - ' . get_post_meta($post->ID,'course_end_time', true) }}</td>
					</tr>
					<tr>
						<td><strong>Période <i class="text-muted" lang="en">(Period)</i> :</strong></td>
						<td>{{ get_post_meta($post->ID,'course_start_date', true) . ' - ' . get_post_meta($post->ID,'course_end_date', true) }}</td>
					</tr>
					@if (get_post_meta($post->ID,'course_required_level',true))
						<tr>
							<td><strong>{{ _e('Level required','sage') }}</strong>: </td>
							<td>{{ get_post_meta($post->ID,'course_required_level',true) }}</td>
						</tr>
					@endif
					<tr>
						<td><strong>Prof <i class="text-muted" lang="en">(Teacher)</i> :</strong></td>
						<td>
							<?php if (get_post_meta($post->ID,'course_teacher', true)): ?>
								<?= get_post_meta($post->ID,'course_teacher', true); ?>
							<?php else: ?>
								<?php _e('Not available','sage'); ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<a class="f6 link grow no-underline br-pill ph3 pv2 mb2 dib white bg-dark-red hover-white w-100 text-center" href="#inscription">
								<i class="edit icon"></i> Inscription <i lang="en">(Registration)</i>
							</a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-8">
				@php(the_content())
				<br>
				@if (!get_post_meta($post->ID,'course_holidays')[0] == '' )
					<div class="ui big label">
						<i class="fa fa-calendar"></i> {{ _e('Holidays (there won\'t be courses during this dates)') }}
					</div>
					<br>
					<br>
					<ul>
						@foreach (get_post_meta($post->ID,'course_holidays') as $key)
							<li>{{ $key }}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>

		{{--  Classroom section --}}
		<hr>

		<h3>Salle de cours <i class="text-muted" lang="en">(Classroom)</i></h3>
		@php
		$classroom = get_posts([
			'post_type'         => 'classroom',
			'posts_per_page'    => -1,
			'post_belongs'      => $post->ID,
			'post_status'       => 'publish',
			'suppress_filters'  => false // This must be set to false
		]);
		@endphp

		@foreach ($classroom as $salle)
			<div class="row course-place">
				<div class="col-md-4">
					<table class="table table-responsive table-classroom" style="border-top:0; border-color:red;">
						<tr>
							<td width="5%"><i class="fa fa-home" aria-hidden="true"></i></td>
							<td width="95%">
								<strong>{{ $salle->post_title }}</strong> ({{ get_post_meta($salle->ID,'classroom_quartier',true) }})<br>
								<?= get_post_meta($salle->ID,'classroom_address',true); ?><br>
								<?= get_post_meta($salle->ID,'classroom_postal_code',true) . ', ' . get_post_meta($salle->ID,'classroom_ville',true);; ?><br>
								<a href="<?= get_post_meta($salle->ID,'classroom_google_map_link',true); ?>" target="_blank">
									<?php _e('Open on Google maps','sage'); ?>
								</a>
							</td>
						</tr>
					</table>
					<div class="ui big red label">
						<i class="circle warning icon"></i> {{ _e('Attention: street shoes not allowed','sage') }}
					</div>
				</div>
				<div class="col-md-8 map">
					@php
					echo get_post_meta($salle->ID,'classroom_google_map',true)
					@endphp
				</div>
			</div>
		@endforeach
	</div>
	<br>
	<br>
	@if (is_user_logged_in())
		<section class="cours-videos">
			<div class="ui divider"></div>
			<h3>{{ _e('Videos', 'sage') }}</h3>
			@php($videos = get_post_meta($post->ID,'course_videos'))
			<div class="row">
				@foreach ($videos as $v)
					<div class="col">
						@php( $youtube_link = 'http://www.youtube.com/embed/' . $v . '?rel=0&modestbranding=1' )
						<iframe width="100%" height="210" src="{{ $youtube_link}}" frameborder="0" allowfullscreen></iframe>
					</div>
				@endforeach
			</div>
		</section>
	@endif
	<br>
	<br>
	<br>




	{{-- Enrolled members sections --}}
	<?php if (is_user_logged_in()): ?>
		<section class="enrolled-members">
			hr
			<h3>{{ _e('Enrolled members', 'sage') }}</h3>
			<? $enrolls = get_post_meta($post->ID,'enroll_group'); ?>
			<table class="table table-hover">
				@for ($i = 0; $i < count($enrolls[0]) ; $i++)
					<tr>
						<td>
							<?php $user_info = get_userdata($enrolls[0][$i]['members']); ?>
							<?= $user_info->first_name . ' ' . $user_info->last_name;?><br>
						</td>
						<td>
							@if ($enrolls[0][$i]['member_cours_payment'] == 'paid')
								<div class="ui green big label">
									{{ $enrolls[0][$i]['member_cours_payment'] }}
								</div>
							@else
								<div class="ui red big label">
									{{ _e('Not paid', 'sage') }}
								</div>
							@endif
						</td>
					</tr>
				@endfor
			</table>
		</section>
		<br>
		<br>
		<br>
	<?php endif; ?>

	@php( $theme_options = get_option('dancefloor_settings') )

	<h1>video tests</h1>
		<video src="https://www.facebook.com/laurent.brulhart.9/videos/1696696157030220/" autoplay poster="posterimage.jpg">

	<section id="inscription">
		<div class="ui divider"></div>
		<h3>{{ _e('Registration', 'sage') }}</h3>
		<div class="ui form">
			@php( $page = get_page_by_title( 'Formulaire' ) )
			@php( $content = apply_filters('the_content', $page->post_content) )
			@php
			echo $content;
			@endphp
		</div>
		<br>

		@if ($bank_details)
			<a href="{{ esc_url($bank_details) }}" class="ui red huge button"><i class="credit card alternative icon"></i> {{ _e('Bank details','sage') }}</a>
		@endif

	</section>



	</video>

	<footer>
		@php( wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) )
	</footer>
	@php(comments_template('/partials/comments.blade.php'))
</article>
