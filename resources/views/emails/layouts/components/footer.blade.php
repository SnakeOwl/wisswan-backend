<div style="margin-top: 36px;display:grid; gap: 8px;">
    <div style="text-align: center;">
        С уважением администрация <a href="https://wissen-wandel.online/about">{{ env('APP_NAME') }}</a>.
        <img alt="Логотип {{ env('APP_NAME') }}" height="20" width="20" src={{  imageToBase64(public_path("/images/logo.png")) }}>
    </div>

    <div>
        Если у вас есть вопросы по сайту напишите в <a href="https://wissen-wandel.online/help">службу поддержки</a>.
    </div>
</div>