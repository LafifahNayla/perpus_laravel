<form action="{{ url('/register') }}" method="post">
    @csrf
    <label for="name">Nama:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br>

    <label for="password_confirmation">Konfirmasi Password:</label>
    <input type="password" name="password_confirmation" id="password_confirmation"><br>

    <button type="submit">Daftar</button>
</form>
