<!-- <div class="alert alert-{{$type}}"> -->
<!--    {{ $message }} -->
<!--    <button type="button" class="btn-close" data-bs-dismiss="alert" alert-label="Close"></button> -->
<!-- </div> -->


<div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
		{{ $message }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>