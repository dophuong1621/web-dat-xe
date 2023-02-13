<div style="width: 600px; margin: 0 auto;">
      <div style="text-align: center">
            <h2> Xin chào {{$admin->full_name_id}}</h2>
            <p>Email này để giúp bạn lấy lại mật khẩu tài khoản đã quên</p>
            <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
            <p> Chú ý: Mã xác nhận chỉ có hiệu lực trong 72 giờ </p>
            <p>
                <a href="{{ route('getPass',['admin' => $admin->id, 'token'=> $admin->token]) }}" style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight: bold"> Đặt lại mật khẩu</a>
            </p>
      </div>
</div>