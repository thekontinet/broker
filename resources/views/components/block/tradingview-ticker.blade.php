<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
        {
            "symbols": [
            {
                "proName": "BITSTAMP:BTCUSD",
                "title": "Bitcoin"
            },
            {
                "proName": "BITSTAMP:ETHUSD",
                "title": "Ethereum"
            },
            {
                "description": "Solana",
                "proName": "BINANCE:SOLUSDT"
            },
            {
                "description": "USDT",
                "proName": "CRYPTOCAP:USDT.D"
            },
            {
                "description": "Link",
                "proName": "BINANCE:LINKUSDT"
            },
            {
                "description": "SHIBA",
                "proName": "BINANCE:SHIBUSDT"
            },
            {
                "description": "NEAR",
                "proName": "BINANCE:NEARUSDT"
            }
        ],
            "isTransparent": true,
            "showSymbolLogo": true,
            "largeChartUrl": "{{route('dashboard')}}",
            "colorTheme": "dark",
            "locale": "en"
        }
    </script>
</div>
<!-- TradingView Widget END -->
