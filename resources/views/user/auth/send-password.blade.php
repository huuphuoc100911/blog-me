Xin chào {{ $data['name'] }} <br><br>
Bạn vừa dăng nhập bằng Email {{ $data['email'] }}<br>
@if ($data['password'])
Mật khẩu mới của bạn là: <b>{{ $data['password'] }}</b><br>
@endif
Nếu nghi ngờ rằng bạn bị mất quyền truy cập vào tài khoản do các thay đổi mà một người khác thực hiện,
thì bạn nên xem lại và bảo vệ tài khoản của mình.<br>
Nếu bạn không nhận ra email này, vui lòng loại bỏ nó.<br>
Văn phòng quản lý {{ config('app.name') }}.
