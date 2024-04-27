	<div class="subscribe-container">
		<span class="subscribe-header">
			Subscribe to mailing list
		</span>
		<div class="subscribe-form-container">
			<form action="/mailing-list" method="POST">
				@csrf
                <input type="email" name="email" class="input-form" placeholder="Email">
                <button type="submit" class="submit-form"> Subscribe <i class="far fa-paper-plane"></i></button>
            </form>
		</div>
		
		@if(session('message'))
			<span class="subscribe-success">{{session('message')}}</span>
		@endif
	</div>
	<link rel="stylesheet" href={{asset("css/inc/_subscribe.css") }}>