@if(env('ZOHO_LIVECHAT_URL'))
<script>
    window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}
</script>
<script id="zsiqscript" src="{{env('ZOHO_LIVECHAT_URL')}}" defer></script>
@endif

@if(env('FRESH_CHAT_URL'))
<script src="{{env('FRESH_CHAT_URL')}}" defer></script>
@endif
