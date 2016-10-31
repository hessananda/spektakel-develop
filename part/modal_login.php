
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times-circle-o" aria-hidden="true"></span>
					</button>
				</div>
                <div id="div-forms" class="login-content">
                    <form id="login-form" action="part/cek_member.php?status=registered" method="post">
						<div class="modal-title margin-10 text-center">
							<h4>Masuk</h4>atau <a href="javascript:void(0)" id="login_register_btn">Daftar</a>
						</div>
		                <div class="modal-body">
				    		<input id="login_username" name="email" class="form-control" type="text" placeholder="Email" required />
				    		<input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required />
        		    	</div>
				        <div class="modal-footer">
                            <div><button type="submit" class="btn btn-block btn-orange btn-spek-login">Masuk</button></div>
				    	    <div class="pull-left">
								<div class="checkbox"><label><input name="rememberme" type="checkbox" value="1"> Ingat saya</label></div>
                            </div>
							<div class="pull-right" style="margin-top:10px;">
								<a href="javascript:void(0)" id="login_lost_btn">Lupa Password?</a>
                            </div>
				        </div>
                    </form>
                    <form id="lost-form" action="part/cek_member.php?status=forget" method="post" class="margin-10" style="display:none;">
						<div class="modal-title margin-10 text-center">
							<h4>Lupa Password</h4>Masukan email pemulihanmu</a>
						</div>
    	    		    <div class="modal-body">
		    				<input id="lost_email" class="form-control" type="text" placeholder="Email" name="email" required />
            			</div>
		    		    <div class="modal-footer">
                            <div><button type="submit" class="btn btn-block btn-orange btn-spek-login">Kirim</button></div>
                            <div class="pull-left">
                                <a href="javascript:void(0)" id="lost_login_btn">Masuk</a>
                            </div>
							<div class="pull-right">
								<a href="javascript:void(0)" id="lost_register_btn">Daftar</a>
                            </div>
		    		    </div>
                    </form>
                    <form id="register-form" class="margin-10" style="display:none;" action="part/cek_member.php?status=new" method="post">
						<div class="modal-title margin-10 text-center">
							<h4>Mendaftar</h4>Sudah punya akun? <a href="javascript:void(0)" id="register_login_btn">Masuk</a>
						</div>
            		    <div class="modal-body">
		    				<input id="register_username" name="fullname" class="form-control" type="text" placeholder="Full Name" required />
                            <input id="register_email" name="email" class="form-control" type="text" placeholder="Email" required />
                            <input id="register_password" name="password" class="form-control" type="password" placeholder="Password" required />
            			</div>
		    		    <div class="modal-footer">
                            <div><button type="submit" class="btn btn-block btn-orange btn-spek-login">Daftar</button></div>
							<div class="margin-10">Dengan mendaftar, saya menyetujui <a target="_blank" href="term.php?#kebijakankami">terms of services</a>, <a target="_blank" href="term.php?#dataanda">privacy policy</a> dan <a target="_blank" href="term.php?#cookies">cookie policy</a>.</div>
		    		    </div>
                    </form>
                </div>
			</div>
		</div>
	</div>