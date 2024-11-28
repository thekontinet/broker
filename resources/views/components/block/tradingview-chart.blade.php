@props(['asset'])
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget rounded-lg overflow-hidden"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
        {
            "autosize": true,
            "symbol": "{{$asset->getTradeSymbol()}}",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "dark",
            "backgroundColor": "rgb(23, 23, 23)",
            "style": "1",
            "locale": "en",
            "hide_top_toolbar": false,
            "hide_legend": true,
            "allow_symbol_change": false,
            "calendar": false,
            "support_host": "https://www.tradingview.com"
        }
    </script>
</div>
<!-- TradingView Widget END -->
