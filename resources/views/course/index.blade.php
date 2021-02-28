@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="section-block trainers-page">
	<div class="container">
		<div class="section-header">
			<h2>دورات تدريبية</h2>
			<p> دورات التي ستساعد على تحقيق أهدافك!
				<br>عرض ملف الدورة </p>
			<form action="{{ route('course') }}" method="GET" class="faq-search">
				<input type="search" name="q" value="{{ $q }}" class="form-control" placeholder="ابحث عن دورة" />
				<button class="btn" type="submit"><i class="ti-search"></i></button>
			</form>
		</div> @if($courses->count() === 0)
		<div class="alert alert-info"> ليس هناك ما تراه هنا. تحقق مرة أخرى لاحقًا ، ربما؟ </div> @else
		<div class="row"> @foreach($courses as $course)
			<div class="mb-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<a href="{{ route('course.profile', [$course ?? ''->id]) }}">
					<div class="trainer-item">
						<div class="trainer-head">
							<div class="trainer-item-img"> <img src='{{ $course->photoUrl }}' class="img-fluid" alt="IMG" /> </div>
							<div class="trainer-author">
								<h5>{{ $course->title }}</h5> </div>
						</div>
						<div class="trainer-content">
							<p>{{ $course->description }}</p>
						</div>
					</div>
				</a>
			</div> @endforeach </div> @endif </div>
	<div class="pagination-section">
		<div class="container"> {{ $courses->links() }} </div>
	</div>
</section>
<style>
.pagination-section nav {
	display: flex;
	margin: 50px 0 0;
	justify-content: center;
	width: 100%;
}

.trainers-page {
	background: #fbfbfd;
	padding-bottom: 100px;
}

.trainer-item {
	background: #fff;
	box-shadow: 0px 0px 29px 6px rgba(154, 161, 171, 0.18);
	padding: 20px;
	position: relative;
	width: 100%;
	height: 100%;
	margin-bottom: 40px;
}

.trainer-head {
	display: flex;
	align-items: center;
	flex-direction: column;
}

.trainer-head h5 {
	font-size: 18px;
}

.trainer-head h6 {
	font-weight: 400;
	font-size: 13px;
}

.trainer-item-img img {
	height: 120px;
	width: 120px;
	border-radius: 50%;
	box-shadow: 0px 0px 10px 0px rgba(20, 39, 82, 0.1);
	margin-bottom: 20px;
}

.trainer-content p {
	font-size: 13px;
	margin-top: 20px;
}
</style>
@endsection