<?php
class ZaloLiveChat_OptionPage {
	private $data;
	
	public static function instance(){		
		static $inst = null;
        if ($inst === null) {
            $inst = new ZaloLiveChat_OptionPage();
        }
        return $inst;
	}

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		$default = array(
			'zalo_oa_id' => '', 
			'zalo_hello_message' => 'Rất vui khi được hỗ trợ bạn!',
			'zalo_popup_time' => 0,);
		$this->data = get_option( 'zalo_livechat_setting', $default);
		
		
	} 

	function admin_menu() {
		add_options_page(
			'Zalo Live Chat - Setup',
			'Zalo Live Chat',
			'manage_options',
			'zalo-livechat',
			array(
				$this,
				'settings_page'
			)
		);
	}

	function  settings_page() {
		
		if(isset($_POST["submit"])){			
			
			$this->data['zalo_oa_id'] = isset($_POST["zalo_oa_id"]) ? $_POST["zalo_oa_id"] : '';
			$this->data['zalo_hello_message'] = isset($_POST["zalo_hello_message"]) ? $_POST["zalo_hello_message"] : '';			
			$this->data['zalo_popup_time'] = isset($_POST["zalo_popup_time"]) ? $_POST["zalo_popup_time"] : '';
			
			$this->save_setting();
			echo '<div class="thikshare-notify">Đã cập nhật!</div>';
		}

		
		?>
		<div class="wrap thikshare">
			<h1><?php esc_html_e( 'Cấu Hình Hộp Chat Zalo', 'zalolivechat' ); ?></h1>

			<div class="thikshare-form-wrapper">
				<form method="POST">
					<p>
						<label> <span id="zalo-help-btn" class="dashicons dashicons-editor-help"></span> Zalo Official Account ID 
						</label>
						<input type="text" name="zalo_oa_id" value="<?php echo $this->data['zalo_oa_id']; ?>">
					</p>
					<p>
						<label>Câu chào hộp chat</label>
						<input type="text" name="zalo_hello_message" value="<?php echo $this->data['zalo_hello_message']; ?>">
					</p>
					<p>
						<label>Tự động mở hộp chat</label>
						<select name="zalo_popup_time">
							<?php $time = $this->data['zalo_popup_time']; ?>
							<option <?php echo ($time == '0') ? 'selected': ''; ?> value="0">Không Tự Bung</option>
							<option <?php echo ($time == '1') ? 'selected': ''; ?> value="1">Bung Ngay</option>
							<option <?php echo ($time == '3') ? 'selected': ''; ?> value="3">3 Giây</option>
							<option <?php echo ($time == '5') ? 'selected': ''; ?> value="5">5 Giây</option>
							<option <?php echo ($time == '10') ? 'selected': ''; ?> value="10">10 Giây</option>
							<option <?php echo ($time == '20') ? 'selected': ''; ?> value="20">20 Giây</option>
						</select>
					</p>
					
					<p>
						<input type="submit" class="button action" name="submit" value="Cập Nhật">
					</p>
				</form>

				<div id="help_zalo">
					<p><strong>Bước 1/4</strong>: Tạo và đăng nhập vào tài khoản Zalo Official Account tại: <a target="blank" href="https://oa.zalo.me/manage/oa?option=create">https://oa.zalo.me</a></p>
					<img src="<?php echo plugins_url( 'images/b1 (1).jpg', __FILE__ ); ?>">
					<img src="<?php echo plugins_url( 'images/screenshot-4.jpg', __FILE__ ); ?>">
					<p><strong>Bước 2/4</strong>: Bấm vào Quản Lý --> chọn Thông Tin Tài Khoản</p>
					<img src="<?php echo plugins_url( 'images/b1 (2).jpg', __FILE__ ); ?>">
					<p><strong>Bước 3/4</strong>: Copy Official Account ID và dán vào phần cấu hình</p>
					<img src="<?php echo plugins_url( 'images/b1 (3).jpg', __FILE__ ); ?>">
					<p><strong>Bước 4/4</strong>: Vào mục chat là có thể nhận được tin nhắn - Hoặc nhận tin trên Media Box trên APP</p>
					<img src="<?php echo plugins_url( 'images/screenshot-5.jpg', __FILE__ ); ?>">
					


				</div>
			</div>
		</div>
		<?php
	}

	

	public function get_setting($name){
		return $this->data[$name];
	}

	public function save_setting(){
		update_option( 'zalo_livechat_setting', $this->data );
	}
}