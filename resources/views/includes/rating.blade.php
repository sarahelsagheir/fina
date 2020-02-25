@if(isset($rating))
	@if($rating == 1)
	<div class="btn-group">
		<i class="text-primary fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
	</div>
	@elseif($rating == 2)
	<div class="btn-group">
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
	</div>
	@elseif($rating == 3)
	<div class="btn-group">
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
	</div>

	@elseif($rating == 4)
	<div class="btn-group">
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="fa fa-star"></i>
	</div>
	@else
	<div class="btn-group">
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
		<i class="text-primary fa fa-star"></i>
	</div>
	@endif
@endif