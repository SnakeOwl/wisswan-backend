<div style="margin-top: 36px;display:grid; gap: 8px;">
    <div style="">
        С уважением администрация <a href="https://wisswan.tech/about">{{ env('APP_NAME') }}</a>.
        <img alt="Логотип {{ env('APP_NAME') }}" height="20" width="20" src={{  imageToBase64(public_path("/images/logo.png")) }}>
    </div>

    <div>
        Если у вас есть вопросы по сайту напишите в <a href="https://wisswan.tech/help">службу поддержки</a>.
    </div>
</div>