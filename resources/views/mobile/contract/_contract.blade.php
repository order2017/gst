<p>
	 @if(request('type_id')=="3" || request('type_id')=="4" || request('type_id')=="8")
	    <a href="{{ url('/shop-contract-one?type_id='.request('type_id')) }}" class="weui_btn weui_btn_primary">网络代理签约</a>
	    @else
	    <a href="{{ url('/shop-contract-two?type_id='.request('type_id')) }}" class="weui_btn weui_btn_primary">网络代理签约</a>
	@endif
</p>