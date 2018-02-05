<div class="content">
	<div class="links">
		@foreach($pages as $key => $value)		
		<a href="/{{ $value->slug }}">{{ $value->name }}</a>
		@endforeach
	</div>
</div>
<div class="content-languages">
	<div class="links">
		@foreach($languages as $key => $value)
		<?
		if($value->is_primary){
			$slug = "/";
		}else{
			$slug = "/".$value->code;
		}
		?>
		<a href="{{ $slug }}">{{ $value->name }} ({{ $value->code }})</a>
		@endforeach
	</div>
</div>