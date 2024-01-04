<form method="POST" action="{{route('image-to-video.get-video')}}">
    @csrf
    <label for="token">Токен доступа</label><br>
    <input type="text" id="token" name="token"><br>
    <label for="id">ID</label><br>
    <input type="text" id="id" name="id"><br>
    <button type="submit">Получить видео</button>
</form>
