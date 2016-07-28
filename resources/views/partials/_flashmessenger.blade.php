				@if(Session::has('flash_message'))
		            <div class="alert alert-success">
		                {{ Session::get('flash_message') }}
		            </div>
		        @endif

		        <script>
				$('div.alert-success').delay(3000).slideUp(300);
		        </script>