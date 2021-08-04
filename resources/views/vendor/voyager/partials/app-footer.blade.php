<footer class="app-footer">
    <div class="site-footer-right">
        @if (rand(1,100) == 100)
       
		© {{date('Y')}} Copyright: {{is_null(setting('site.title'))?'': setting('site.title')}}
		
		@else
			
		© {{date('Y')}} Copyright: {{is_null(setting('site.title'))?'': setting('site.title')}}
		
		@endif
			
    </div>
</footer>
