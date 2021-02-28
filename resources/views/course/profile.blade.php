@extends('layouts.main')

@push('scripts')
<!-- JQuery -->
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
@endpush

@section('content')
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-3">
				<!-- /.col -->
				<!-- Widget: user widget style 1 -->
				<div class="widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-success black">
						<h3 class="widget-user-username">{{$course->title}}</h3>
						<h5 class="widget-user-desc">Course since {{ $course->created_at->diffForHumans() }}</h5>
						<div class="widget-user-image">
							<img class="img-circle elevation-2" src="{{ $course->photoUrl }}" alt="User Avatar">
							</div>
						</div>
						<div class="widget-user-stats">
							<div class="row">
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">3,200</h5>
										<span class="description-text">SALES</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">13,000</h5>
										<span class="description-text">FOLLOWERS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">35</h5>
										<span class="description-text">PRODUCTS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.widget-user-stats -->
					</div>
					<!-- /.widget-user -->
				</div>
				<!-- tab -->
				<div class="col-md-12">
					<div class="description-block">
						<ul class="nav nav-tabs mb-5">
							<li class="nav-item">
								<a class="nav-link active show" href="#activity" data-toggle="tab">Activity</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#profile" data-toggle="tab">Profile</a>
							</li>
						</ul>
						<div class="tab-content">
							<!-- Activity Tab -->
							<div class="tab-pane active show" id="activity">
								<h3 class="text-center my-5">Display User Activity</h3>
							</div>
							<!-- Setting Tab -->
							<div class="tab-pane" id="profile">
								<form class="form-horizontal">
									<div class="form-group">
										<label for="inputName" class="col-sm-2 control-label">Title</label>
										<div class="col-sm-12"> {{ $course->title }} </div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-2 control-label">Description</label>
										<div class="col-sm-12"> {{ $course->description }} </div>
									</div>
									<div class="form-group">
										<label for="inputExperience" class="col-sm-2 control-label">Attendance Type</label>
										<div class="col-sm-12"> {{ $course->attendance_type }} </div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.nav-tabs-custom -->
				</div>
				<!-- end tabs -->
			</div>
		</div>
	</section>
	<style>
    .profile {
        padding-bottom: 100px;
    }
.widget-user-header {
	background-position: center center;
	background-size: cover;
    height: 250px !important;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.widget-user-username {
    margin-top: 30px;
}

.widget-user-desc {
    position: relative;
    top: -5px;
}

.widget-user-header h3,
.widget-user-header h5 {
    color: #fff;
    margin-bottom: 0;
}

.widget-user-header h5 {
    font-weight: normal;
}

.widget-user-image {
    margin-top: 10px;
}
.widget-user-image img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    padding: 5px;
    background-color: #fff;
}
.widget-user-stats {
    margin-top: 20px;
}
</style>
@endsection