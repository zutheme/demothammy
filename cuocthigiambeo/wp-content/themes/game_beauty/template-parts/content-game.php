<div id="wrapper">

    <form class="frm-register">

        <div class="content-left">

            <div id="logo">

                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_directory');?>/img/logo1.png" alt="Thẩm mỹ viện thiên khuê"></a></h1>

            </div>

            <!---->

            <h2 class="mb"><img src="<?php bloginfo('template_directory');?>/img/chien-dich-thoat-beo.png" alt="Chiến dịch thoát béo"></h2>

            <div class="info">

                <h2>Đăng ký <span>tham gia chương trình</span></h2>

                <p><input type="text" class="fullname" placeholder="Họ tên" required=""></p>

                <p><input type="number" class="phone"  placeholder="Số điện thoại" required="">

                <!-- <p><input type="text" class="txtdate"  placeholder="Ngày sinh"></p> -->

                <div class="form-group">

                    <div class='input-group date' id='myDatepicker2'>

                        <input type='text' name="birthday" value="" placeholder="Ngày sinh (01-12-1970)" class="form-control" />

                        <span class="input-group-addon">

                           <span class="glyphicon glyphicon-calendar"></span>

                        </span>

                    </div>

                     <input class="_birthday" type='hidden' name="_birthday" value="" class="form-control" />

                </div>

                <!-- <p><input type="email" class="email" placeholder="Email"></p> -->

                <p><input type="text" class="address"  placeholder="Địa chỉ"></p>

                <p><input type="text" class="job"  placeholder="Nghề nghiệp"></p>

                <!-- <p><input type="text" class="facebook" placeholder="Địa chỉ Facebook"></p> -->

                <!-- <p><input type="text" class="height_weight"  placeholder="Chỉ số chiều cao, cân nặng"></p> -->

            </div>

            <!---->
            <div class="i1s">

               <h3>Số đo cơ thể</h3>

                <div>

                    <div class="w50s">
                        <div class="form-group">
                          <input type="text" class="height form-control" name="height" placeholder="Chiều cao">
                        </div>
                    </div>

                    <div class="w50s">
                        <div class="form-group">
                          <input type="text" class="weight form-control" name="weight" placeholder="Cân nặng">
                        </div>
                    </div>
                    
                </div> 

            </div>
            
            <!---->

            <div class="i2">

                <h3>Bạn đã từng giảm béo chưa?</h3>

                <div class="w50">

                    <p><input type="radio" name="usedto" value="Đã từng"><span>Đã từng</span></p>

                </div>

                <div class="w50">

                    <p><input type="radio" name="usedto" value="Chưa từng"><span>Chưa từng</span></p>

                </div>

                <p class="visao">Nếu có vì sao bạn lại không sử dụng phương pháp đó nữa ?</p>

                <p><textarea name="txtvisao" id="txtvisao" rows="2" placeholder="...................................................................."></textarea></p>

            </div>

            <!---->

            <div class="thankyou pc">

                <h3>Cảm ơn bạn đã tham gia<span>Hẹn gặp lại bạn tại chương trình</span></h3>

            </div>

            <!---->

        </div>

        <!---->

        <div class="content-right">

            <div class="i3">

                <h2 class="pc"><img src="<?php bloginfo('template_directory');?>/img/chien-dich-thoat-beo.png" alt="Chiến dịch thoát béo"></h2>

                <div class="i3-1">

                    <h4>Câu chuyện thuyết phục ban giám khảo?</h4>

                    <p><textarea name="txtcauchuyen" id="txtcauchuyen" rows="4" placeholder="................................................................................................................................................................................................................................................................"></textarea></p>

                    <h4>Bạn mong muốn điều gì khi tham gia chương trình?</h4>

                    <p><textarea name="txtmongmuon" id="txtmongmuon" rows="3" placeholder="................................................................................................................................................................................................"></textarea></p>

                </div>

                <img src="<?php bloginfo('template_directory');?>/img/img-chien-dich.png" alt="Hình ảnh chiến dịch" class="chiendich">

            </div>

            <!---->

            <div class="i4">

                <h4>Nếu được chọn trở thành gương mặt đại diện, bạn sẵn sàng tham gia liệu trình giảm béo Hiulther Lipase trong khoảng 1-2 tháng chứ ?</h4>

                <div class="w3">

                    <p><input type="radio" name="txtss" value="Sẵn sàng"><span>Sẵn sàng</span></p>

                </div>

                <div class="w3">

                    <p><input type="radio" name="txtss" value="Còn tùy vào nội dung chương trình"><span>Còn tùy vào nội dung chương trình</span></p>

                </div>

                <div class="w3">

                    <p><input type="radio" name="txtss" value="Ý kiến khác"><span>Ý kiến khác</span></p>

                </div>

            </div>

            <!---->

            <div class="i5">

                <p>Hãy gửi kèm 03 hình ảnh cá nhân mới nhất của bạn cho chúng tôi kèm theo bản đăng ký tham gia này</p>

                <div class="w3">

                    <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đứng</a>

                    <input style="display:none" type="file" name="file_name" class="file" id="file1" accept="image/*"/></p>

                    <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>

                    <p><input class="data_url" type="hidden" name="file_canvas1" value=""></p>

                </div>

                <div class="w3">

                    <p><a href="javascript:void(0)" onclick="performClick('file2');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh ngồi</a>

                    <input style="display:none" type="file" name="txtfile2" class="file" id="file2" accept="image/*"/></p>

                    <p><canvas id="my_canvas_id2" width="0px" height="0px"></canvas></p>

                    <p><input class="data_url" type="hidden" name="file_canvas2" value=""></p>

                </div>

                <div class="w3">

                    <p><a href="javascript:void(0)" onclick="performClick('file3');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh vùng bụng</a>

                    <input style="display:none" type="file" name="txtfile3" class="file" id="file3" accept="image/*"/></p>

                    <p><canvas id="my_canvas_id3" width="0px" height="0px"></canvas></p>

                    <p><input class="data_url" type="hidden" name="file_canvas3" value=""></p>

                </div>

            </div>

            <!---->

            <hr>

            <!---->

            <div class="i6">

                <div class="camket">

                    <p><input type="checkbox" name="txtck" id="txtck" checked=""><span>Tôi xin được cam kết</span></p>

                    <ul>

                        <li>Bản thân đáp ứng đủ các điều kiện tham gia chương trình theo quy định của BTC</li>

                        <li>Chịu trách nhiệm về tính chính xác của nội dung trong bản đăng ký nêu trên</li>

                        <li>Nghiêm túc thực hiện quy trình giảm béo và chế độ dinh dưỡng theo chỉ dẫn của BTC</li>

                        <li>Đồng ý để BTC sử dụng hình ảnh và thông tin của tôi cho mục đích quảng bá chiến dịch mà không phải thanh toán bất kỳ khoản thù lao nào.</li>

                    </ul>

                    <p><a href="javascript:void(0);" class="btn btn-default btn-reg-survey">Đăng ký</a></p>

                </div>                

            </div>

        </div>

        <!---->

        <div class="thankyou mb">

            <!-- <h3>Cảm ơn bạn đã tham gia<span>Hẹn gặp lại bạn tại chương trình</span></h3> -->

        </div>

    </form>

    <img src="<?php bloginfo('template_directory');?>/img/img-chuyen-gia.png" alt="Chuyên gia" class="chuyengia">

    </div>