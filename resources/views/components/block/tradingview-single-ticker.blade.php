@props(['asset'])
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>

    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
        {
            "symbol": "{{$asset->getTradeSymbol()}}",
            "width": "100%",
            "isTransparent": true,
            "colorTheme": "dark",
            "locale": "en",
            "largeChartUrl": "{{route('markets.index', $asset->type)}}"
        }
    </script>
</div>
<!-- TradingView Widget END -->
