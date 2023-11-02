<h2>Trang customer</h2>
<form action="{{ route('customer.logout') }}" method="post">
    @csrf
    <button type="submit">Đăng xuất</button>
</form>
