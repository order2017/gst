<p>
	 @if(request('type_id')=="3" || request('type_id')=="4" || request('type_id')=="8")

		 @if(!empty(session('mobile_user')->user_id))
	    	<a href="{{ url('/shop-contract-one?type_id='.request('type_id')) }}" class="weui_btn weui_btn_primary">网络代理签约</a>
			 @else
			<a href="{{ url('/user-login') }}" class="weui_btn weui_btn_primary">网络代理签约</a>
		@endif

	    @else
		@if(!empty(session('mobile_user')->user_id))
	    	<a href="{{ url('/shop-contract-two?type_id='.request('type_id')) }}" class="weui_btn weui_btn_primary">网络代理签约</a>
		@else
			<a href="{{ url('/user-login') }}" class="weui_btn weui_btn_primary">网络代理签约</a>
		@endif
	@endif
</p>