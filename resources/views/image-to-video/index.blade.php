<form method="POST" enctype="multipart/form-data" action="{{route('image-to-video.generate')}}">
    @csrf
    <label for="token">Токен доступа</label><br>
    <input type="text" id="token" name="token"><br>
    <label for="image">Изображение</label><br>
    <input type="file" id="image" name="image">
    <button type="submit">Получить ID</button>
</form>

@if(session()->get('id') !== null)
    <div>
        Ваш ID: {{session()->get('id')}} <br>
        Видео будет доступно в течении пары минут
    </div>
    <a href="{{route('image-to-video.get-video-view')}}">
        <button>
            Получить видео по ID
        </button>
    </a>
@endif

